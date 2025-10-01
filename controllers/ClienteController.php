<?php
require_once __DIR__ . "/../models/ClienteModel.php";
require_once __DIR__ . "/../helpers/token_jwt.php";
require_once __DIR__ . "/../controllers/authController.php";

require_once "passwordController.php";


class ClienteController{
    public static function criar($conn, $data){

        $login = [
            "email" => $data['email'],
            "senha" => $data['senha'],
        ];


        $data['senha'] = passwordController::generateHash($data['senha']);
        $result= ClienteModel::criar($conn, $data);
        
        if($result){
            authController::loginCliente($conn, $login);
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
        return jsonResponse(['message' => "Erro ao atualizar informações do Cliente"], 400);
        }
    }
    public static function loginCliente($conn, $data) {

      
        $data['email'] = trim($data['email']);
        $data['senha'] = trim($data['senha']);

 
        if (empty($data['email']) || empty($data['senha'])) {
            return jsonResponse([
                "status" => "erro",
                "message" => "Preencha todos os campos!"
            ], 401);
        }
 
        $cliente = ClienteModel::clienteValidation($conn, $data['email'], $data['senha']);
        if ($cliente) {
            $token = createToken($cliente);
            return jsonResponse([ "token" => $token ]);
        } else {
            return jsonResponse([
                "status" => "erro",
                "message" => "Credenciais inválidas!"
            ], 401);
        }
    }

}



?>