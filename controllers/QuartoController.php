<?php
require_once __DIR__ . "/../models/QuartoModel.php";


class QuartoController{

    public static function criar($conn, $data){
        $result= QuartoModel::criar($conn, $data);
        if($result){
            return jsonResponse(['message' => "Quarto criado com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao criar Quarto"]);
        }
    }

    public static function listarTodos($conn){
        $listarQuartos = QuartoModel::listarTodos($conn);
        return jsonResponse($listarQuartos);
    }

    public static function buscarPorId($conn, $id){
        $BuscarId = QuartoModel::buscarPorId($conn, $id);
        return jsonResponse($BuscarId);
    }

    public static function deletarQuarto($conn, $id){
        $result = QuartoModel::deletarQuarto($conn, $id);
        if($result){
            return jsonResponse(['message' => "Quarto deletado com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao deletar Quarto"], 400);
        }
    }

    public static function atualizarQuarto($conn, $id, $data){
        $result = QuartoModel::atualizarQuarto($conn, $id, $data);
        if($result){
            return jsonResponse(['message' => "Informações do Quarto atualizadas com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao atualizar informações do Quarto"]);
        }
    }
}



?>