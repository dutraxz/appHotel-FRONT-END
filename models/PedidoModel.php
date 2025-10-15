<?php
require_once "QuartoModel.php";
require_once "ReservaModel.php";

class PedidoModel{
    public static function criar($conn, $data){
        $MYsql = "INSERT INTO pedidos (id_usuario_fk, id_cliente_fk, pagamento) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("iis",
            $data["id_usuario_fk"],
            $data["id_cliente_fk"],
            $data["pagamento"]
         );
        $resultado = $stmt->execute();
        if($resultado){
            return $conn->insert_id;
        }   
        return false;
    }

    public static function listarTodos($conn){
        $MYsql = "SELECT * FROM pedidos";
        $resultado = $conn->query($MYsql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function criarOrdem($conn, $data){
        $id_cliente_fk = $data['id_cliente_fk'];
        $pagamento = $data['pagamento'];
        $id_usuario_fk = isset($data['id_usuario_fk']);

        $reservas = [];
        $reservou = false;

        $conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

        try {
            $pedido_id = self::criar($conn, [
                "id_usuario_fk" => $id_usuario_fk,
                "id_cliente_fk" => $id_cliente_fk,
                "pagamento" => $pagamento
            ]);

            if(!$pedido_id){
                throw new RuntimeException("Erro ao criar o pedido.");
            }

            foreach($data['quartos'] as $quarto){
                $id= $quarto["id"];
                $inicio = $quarto["dataInicio"];
                $fim = $quarto["dataFim"];

                 // Bloqueia o quarto na transação
                if(QuartoModel::bloquearPorId($conn, $id)){
                    $reservas[] = "Quarto {$id} Indisponivel";
                    continue;
                }
                if(!RerservaModel::temConflito($conn, $id, $dataInicio, $dataFim)){
                    $reservas[] = "Quarto {$id} já esta reservado!";
                    continue;
                }

                $ReservaLiberada = ReservaModel::criar($conn, [
                    "id_adicional_fk" => null,
                    "id_quarto_fk" => $id,
                    "id_pedido_fk" => $pedido_id,
                    "dataInicio" => $inicio,
                    "dataFim" => $fim,
                ]);

                $reservou = true;
                $reservas[] = [
                    "reserva_id" => $conn->insert_id,
                    "id_quarto_fk" => $id
                ];

            }
                
            if ($reservou == true){
                $conn->commit();
                return [
                    "id_pedido_fk" => $pedido_id,
                    "reservas" => $reservas,
                    "messagem" => "Reservas criadas com sucesso!!"
                ];
            }else{
                throw new RuntimeException("Pedido nao realizado, nenhum quarto reservado");
            }

        } catch (\Throwable $th) {
            try {
                $conn->rollback();
              } catch (\Throwable $th2) {}
            throw $th;
        }

    }

    public static function buscarPorId($conn, $id){
        $MYsql = "SELECT * FROM pedidos WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function deletar($conn, $id){
        $MYsql = "DELETE FROM pedidos WHERE id = ?";
        $stmt = $conn->prepare($MYsql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public static function atualizar($conn, $id, $data){
         $MYsql = "UPDATE pedidos SET id_usuario_fk = ?, id_cliente_fk = ?, pagamento = ? WHERE id = ? ";
            $stmt = $conn->prepare($MYsql);
            $stmt->bind_param("iisi",
            $data["id_usuario_fk"],
            $data["id_cliente_fk"],
            $data["pagamento"],
            $id
        );
        return $stmt->execute();
    }

}
?>