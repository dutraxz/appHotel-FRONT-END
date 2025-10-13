<?php
require_once __DIR__ . "/../models/QuartoModel.php";
require_once "ValidatorController.php";


class QuartoController{
     
    public static function criar($conn, $data){
        ValidatorController::validador_data($data, ["nome", "numero", "camaCasal", "camaSolteiro", "preco", "disponivel"]);

        $result = QuartoModel::criar($conn, $data);
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
         if(empty($id)){
            return jsonResponse(['message'=>"Erro, Falta o campo: id"], 400);
        }
        $buscarId = QuartosModel::buscarPorId($conn, $id);
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
    

    public static function buscarDisponiveis($conn, $data){

        ValidatorController::validador_data($data, ["dataInicio", "dataFim", "qtd"]);

        $data["dataInicio"] = ValidatorController::dataHora($data["dataInicio"], 14);
        $data["dataFim"] = ValidatorController::dataHora($data["dataFim"], 12);
        
        $result = QuartoModel::buscarDisponiveis($conn, $data);
        if($result){
            return jsonResponse(['Quartos'=> $result]);    
        }else{
            return jsonResponse(['message'=>"não existe quartos disponiveis"], 400);
        }
    }
}
    // public static function validarQuartos($conn, $data) {
    // if($result) {
    //     return jsonResponse(['Quartos'=> $result]);
    // }else{
    //     return jsonResponse(['message'=> 'não tem quartos disponiveis', 400]);
    // }
    // }
?>