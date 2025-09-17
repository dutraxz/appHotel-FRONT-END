<?php
require_once __DIR__ . "/../models/PedidoModel.php";


class PedidoController{

    public static function criar($conn, $data){
        $result= PedidoModel::criar($conn, $data);
        if($result){
            return jsonResponse(['message' => "Pedido criado com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao criar Pedido"]);
        }
    }

    public static function listarTodos($conn){
        $listarPedidos = PedidoModel::listarTodos($conn);
        return jsonResponse($listarPedidos);
    }

    public static function buscarPorId($conn, $id){
        $buscarId = PedidoModel::buscarPorId($conn, $id);
        return jsonResponse($buscarId);
    }


}



?>