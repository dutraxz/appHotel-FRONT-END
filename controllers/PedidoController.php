<?php
require_once __DIR__ . "/../models/PedidoModel.php";

class PedidoController{
    public static function criar($conn, $data){
        $result = PedidoModel::criar($conn, $data);
        if($result){
            return jsonResponse(['message'=>"Pedido criado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao criar"], 400);

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