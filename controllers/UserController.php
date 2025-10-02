<?php
require_once __DIR__ . "/../models/UserModel.php";

class UserController{
    public static function criar($conn, $data){
        $result = UserModel::criar($conn, $data);
        if($result){
            return jsonResponse(['message'=>"Usuário criado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao criar"], 400);

        }

    }

    public static function listarTodos($conn){
        $listaUsuarios = UserModel::listarTodos($conn);
        return jsonResponse($listaUsuarios);

    }

    public static function buscarPorId($conn, $id){
        $buscarId = UserModel::buscarPorId($conn, $id);
        return jsonResponse($buscarId);
    }

    public static function delete($conn, $id){
        $result = UserModel::deletar($conn, $id);
        if($result){
            return jsonResponse(['message'=>"Usuário deletado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao deletar"], 400);

        }
    }

    public static function atualizar($conn, $id, $data){
        $result = UserModel::atualizar($conn, $id, $data);
        if($result){
            return jsonResponse(['message'=>"Usuário atualizado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao atualizar"], 400);

        }

    }

}
?>