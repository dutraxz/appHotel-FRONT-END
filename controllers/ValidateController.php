<?php
require_once __DIR__ . "/../models/ReservaModel.php";


class ValidateController{

    public static function validacao($conn, $data){
        $result= ReservaModel::criar($conn, $data);
        if($result){
            return jsonResponse(['message' => "Reserva criada com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao criar Reserva"]);
        }
    }

    public static function listarPorPedido($conn){
        $listarReservas = ReservaModel::listarTodos($conn);
        return jsonResponse($listarReservas);
    }
}



?>