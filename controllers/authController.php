<?php
require_once __DIR__ . "/../models/UserModel.php";
require_once "passwordController.php";
    
class authController{
        public static function login($conn, $data){
            $data['$email'] = trim($data['email']);
            $data['$password'] = trim($data['password']);

            //Confirmação se tem algo vazio dentro dos campos de preenchimento
            if ( empty($data['email']) || empty($data['password'])){
                return jsonResponse([
                    "status"=>"Deu ruim malandro",
                    "message"=>"Preencha todos os campos!"
                ], 401);
            }

            //Informações corretas
        $user = UserModel::validateUser($conn, $data['email'], $data['password']);
        if ($user){
            return jsonResponse([
        
                "id"=>$user["id"],
                "nome"=>$user["nome"],
                "email"=>$user["email"],
                "id_perm_fk"=>$user["Cargo"],
            ]);

            //Erro no Login
        }else{
            jsonResponse([
                "resposta"=>"Credenciais Estão Invalidas"
            ], 404);

        }
    }
}


?>