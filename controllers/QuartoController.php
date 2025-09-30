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
        $buscarId = QuartoModel::buscarPorId($conn, $id);
        return jsonResponse($buscarId);
    }

    public static function deletar($conn, $id){
        $result = QuartoModel::deletar($conn, $id);
        if($result){
            return jsonResponse(['message' => "Quarto deletado com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao deletar Quarto"], 400);
        }
    }

    public static function atualizar($conn, $id, $data){
        $result = QuartoModel::atualizar($conn, $id, $data);
        if($result){
            return jsonResponse(['message' => "Informações do Quarto atualizadas com sucesso"]);
        }
        else{
        return jsonResponse(['message' => "Erro ao atualizar informações do Quarto"]);
        }
    }
    public static function validarCntrl($conn, $dataInicio, $dataFim, $quantidadePessoas) {
        $validacaoListaQuartos = QuartoModel::validar($conn, $dataInicio, $dataFim, $quantidadePessoas);
        return jsonResponse($validacaoListaQuartos);
    }
}




?>