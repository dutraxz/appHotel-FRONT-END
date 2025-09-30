<?php
require_once __DIR__ . "/../models/UserModel.php";
require_once __DIR__ . "/../helpers/token_jwt.php";
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
            $token = createToken($user);
            return jsonResponse([ "token" => $token ]);

            //Erro no Login
        }else{
            jsonResponse([
                "resposta"=>"Credenciais Estão Invalidas"
            ], 404);
        }
    }
}


?>