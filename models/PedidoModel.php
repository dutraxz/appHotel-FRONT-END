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
                return $connect-> insert_id;
        }   
        return false;

    public static function listarTodos($conn){
        $MYsql = "SELECT * FROM pedidos";
        $result = $conn->query($MYsql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function criarOrdem($conn, $data){
        $id_cliente = $data['id_cliente_fk'];
        $pagamento = $data['pagamento'];
        $id_usuario = isset($data['id_usuario_fk']) ?
        $data['id_usuario_fk'] : null;
        $reservasResumo = [];

        $conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

        try {
            $pedido_id = self::criar($conn, [
                "id_usuario_fk" => $id_usuario,
                "id_cliente_fk" => $id_cliente,
                "pagamento" => $pagamento
            ]);
            if(!$pedido_id){
                throw new RuntimeException("Erro ao criar o pedido.");
            }
            foreach($data['quartos'] as $quarto){
                $idQuarto= $quarto["id"];
                $inicio = $quarto["dataInicio"];
                $fim = $quarto["dataFim"];

                 // Bloqueia o quarto na transação
                if(!QuartoModel::bloquearPorId($conn, $idQuarto)){
                    $reservasResumo[] = [
                        "id_quarto_fk" => $idQuarto,
                        "status" => "indisponivel",
                        "mensagem" => "Quarto inexistente e(ou) indisponível"
                    ];
                    continue;
                }

                // Verifica conflito para o intervalo solicitado
                $sqlConf = "SELECT 1 FROM reservas r WHERE r.id_quarto_fk = ? AND (r.dataFim >= ? AND r.dataInicio <= ?) LIMIT 1";
                $stmt = $connect->prepare($sqlConf);
                $stmt->bind_param("iss", $idQuarto, $inicio, $fim);
                $stmt->execute();
                $temConflito = $stmt->get_result()->num_rows > 0;
                $stmt->close();

                if($temConflito){
                    $reservasResumo[] = [
                        "id_quarto_fk" => $idQuarto,
                        "status" => "conflito",
                        "mensagem" => "Datas em conflito para este quarto"
                    ];
                    continue;
                }

                $ReservaLiberada = ReservaModel::criar($conn, [
                    "id_adicional_fk" => null,
                    "id_quarto_fk" => $idQuarto,
                    "id_pedido_fk" => $pedidoId,
                    "dataInicio" => $inicio,
                    "dataFim" => $fim
                ]);

                $reservasResumo[] = [
                    "id_quarto_fk" => $idQuarto,
                    "status" => $okReserva ? "reservado" : "erro",
                    "mensagem" => $okReserva ? "Reserva criada" : "Falha ao reservar"
                ];
            }

            $conn->commit();
            return [
                "pedido" => $pedidoId,
                "reservas" => $reservasResumo
            ];
        } catch (\Throwable $th) {
            $connect->rollback();
            throw $th;
        }
    }

        } catch (\Throwable $ok) {
            try {
                $connect->rollback();
            } catch (\Throwable $ok) {
                throw $ok;
            }
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