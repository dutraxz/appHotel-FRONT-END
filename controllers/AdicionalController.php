<?php
class AdicionalController{

    public static function criar($conn, $data){
        $result= AdicionalModel::criar($conn, $data);
        if($result){
            return jsonResponse(['message' => "Adicional criado com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao criar Adicional"], 400);
        }
    }

    public static function listarTodos($conn){
        $listarAdicionais = AdicionalModel::listarTodos($conn);
        return jsonResponse($listarAdicionais);
    }

    public static function buscarPorId($conn, $id){
        $buscarId = AdicionalModel::buscarPorId($conn, $id);
        return jsonResponse($buscarId);
    }

    public static function deletar($conn, $id){
        $result = AdicionalModel::deletar($conn, $id);
        if($result){
            return jsonResponse(['message' => "Adicional deletado com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao deletar Adicional"], 400);
        }
    }

    public static function atualizar($conn, $id, $data){
        $result = AdicionalModel::atualizar($conn, $id, $data);
        if($result){
            return jsonResponse(['message' => "Informações do Adicional atualizadas com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao atualizar informações do Adicional"]);
        }
    }
}



?>