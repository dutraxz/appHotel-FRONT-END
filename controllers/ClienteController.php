<?php
require_once __DIR__ . "/../models/ClienteModel.php";
require_once "passwordController.php";
require_once "DataController.php";


class ClienteController{
    public static function criar($conn, $data){
        $data['senha'] = passwordController::generateHash($data['senha']);
        $result= ClienteModel::criar($conn, $data);
        if($result){
        return jsonResponse(['message' => "Cliente criado com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao criar Cliente"], 400);
        }
    }

    public static function listarTodos($conn){
        $listarClientes = ClienteModel::listarTodos($conn);
        return jsonResponse($listarClientes);
    }

    public static function buscarPorId($conn, $id){
        $buscarId = ClienteModel::buscarPorId($conn, $id);
        return jsonResponse($buscarId);
    }

    public static function deletar($conn, $id){
        $result = ClienteModel::deletar($conn, $id);
        if($result){
            return jsonResponse(['message' => "Cliente deletado com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao deletar Cliente"], 400);
        }
    }

    public static function atualizar($conn, $id, $data){
        $result = ClienteModel::atualizar($conn, $id, $data);
        if($result){
            return jsonResponse(['message' => "Informações do Cliente atualizadas com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao atualizar informações do Cliente"]);
        }
    }
}



?>