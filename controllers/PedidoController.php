<?php
require_once __DIR__ . "/../models/PedidoModel.php";
require_once  "ValidatorController.php";

class PedidoController{
    public static function criar($conn, $data){
        $result = PedidoModel::criar($conn, $data);
        if($result){
            return jsonResponse(['message'=>"Pedido criado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao criar"], 400);
        }
    }
    
    public static function criarOrdem($conn, $data){
        $data["id_usuario_fk"] = isset($data['id_usuario_fk']) ? $data['id_usuario_fk']: null;

        ValidatorController::validate_data($data, ["id_cliente_fk", "pagamento", "quartos"]);

        foreach($data['quartos'] as $quarto){
            ValidatorController::validate_data($quarto, ["id", "dataInicio", "dataFim"]);

            // Normaliza horas padrão
            $quarto["dataInicio"] = ValidatorController::dataHora($quarto["dataInicio"], 14);
            $quarto["dataFim"] = ValidatorController::dataHora($quarto["dataFim"], 12);
            //$data['quartos'][$index] = $quarto;
        }
        if (!is_array($data['quartos']) || count($data['quartos']) === 0){
            return jsonResponse(['message'=>"nao existe reservas"], 400);
        }

        try{
            $resultado = PedidoModel::criarOrdem ($conn, $data);
            return jsonResponse(['message' => $resultado]);
        }
        catch(Throwable $erro){
            return jsonResponse(['message' => $erro->getMessage], 500);
        }
    }

    public static function listarTodos($conn){
        $listaPedidos = PedidoModel::listarTodos($conn);
        return jsonResponse($listaPedidos);

    }

    public static function buscarPorId($conn, $id){
        $buscarId = PedidoModel::buscarPorId($conn, $id);
        return jsonResponse($buscarId);
    }

    public static function deletar($conn, $id){
        $result = PedidoModel::deletar($conn, $id);
        if($result){
            return jsonResponse(['message'=>"Pedido deletado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao deletar"], 400);

        }
    }

    public static function atualizar($conn, $id, $data){
        $result = PedidoModel::atualizar($conn, $id, $data);
        if($result){
            return jsonResponse(['message'=>"Pedido atualizado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao atualizar"], 400);
        }
    }
}
?>