<?php
require_once __DIR__ . "/../models/PermissaoModel.php";


class PermissaoController{

    public static function criar($conn, $data){
        $result= PermissaoModel::criar($conn, $data);
        if($result){
            return jsonResponse(['message' => "Permissao criada com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao criar Permissao"]);
        }
    }

    public static function listarTodos($conn){
        $listarPermissaos = PermissaoModel::listarTodos($conn);
        return jsonResponse($listarPermissaos);
    }

    public static function buscarPorId($conn, $id){
        $buscarId = PermissaoModel::buscarPorId($conn, $id);
        return jsonResponse($buscarId);
    }

    public static function deletar($conn, $id){
        $result = PermissaoModel::deletar($conn, $id);
        if($result){
            return jsonResponse(['message' => "Permissao deletada com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao deletar Permissao"], 400);
        }
    }

    public static function atualizar($conn, $id, $data){
        $result = PermissaoModel::atualizar($conn, $id, $data);
        if($result){
            return jsonResponse(['message' => "Informações de Permissao atualizadas com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao atualizar informações de Permissao"]);
        }
    }
}



?>