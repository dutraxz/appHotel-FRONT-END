<?php
require_once __DIR__ . "/../models/ReservaModel.php";

class ReservaController{
    public static function criar($conn, $data){
        validadorController::validate_data($data["id_adicional_fk", "id_quarto_fk", "id_pedido_fk", "dataInicio", "dataFim"]);

        $data["dataInicio"] = validadorController::dataHora(["dataInicio", 14])
        $data["dataFim"] = validadorController::dataHora(["dataFim", 12])

        $result = ReservaModel::criar($conn, $data);
        if($result){
            return jsonResponse(['message'=>"Reserva criada com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao criar"], 400);
        }
    }

    public static function listarTodos($conn){
        $listaReservas = ReservaModel::listarTodos($conn);
        return jsonResponse($listaReservas);
    }
    public static function buscarPorId($conn, $id){
        $buscarId = ReservaModel::buscarPorId($conn, $id);
        return jsonResponse($buscarId);
    }
    public static function deletar($conn, $id){
        $result = ReservaModel::deletar($conn, $id);
        if($result){
            return jsonResponse(['message'=>"Reserva deletada com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao deletar"], 400);
        }
    }
    public static function atualizar($conn, $id, $data){
        $result = ReservaModel::atualizar($conn, $id, $data);
        if($result){
            return jsonResponse(['message'=>"Reserva atualizada com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao atualizar"], 400);
        }
    }

    public static function listarPorPedido($conn, $pedido_id){
        $result = ReservaModel::listarPorPedido($conn, $pedido_id);
        return jsonResponse($result);
    }
}
?>