<?php
require_once __DIR__ . "/jwt/jwt_include.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function createToken($user){
    $payload = [
        "iss" => "siteVictor",
        "iat" => time(),
        "exp" => time() + (60 * (60 * 1)),
        "sub" => $user
    ];
    return JWT::encode($payload, SECRET_KEY, "HS256");
}
function validateToken($token){
    try{
        $key = new Key(SECRET_KEY, "HS256");
        $decode = JWT::decode($token, $key);
        $result = json_decode(json_encode($decode->sub), true);
        return $result;

    }catch(Exception $erroDB){
        return false;
    }
    
}
function validateTokenAPI($tipoCargo){
    $headers = getallheaders();
    if(!isset($headers["Authorization"]) ){
        jsonResponse(["messagem" => "Esta faltando o token - token ausente"],401);
        exit;
    }
    $token = str_replace("Bearer ", "", $headers["Authorization"]);

    $user = validateToken($token);

    if(!$user){
        jsonResponse(["messagem" => "O token esta invalido - a conversão não foi realizada com exito!"],401);
        exit;
    }
        if($user['cargo'] != $tipoCargo){
            jsonResponse(["messagem" => "Acesso negado - você não tem permissão para acessar este recurso!"], 401);
            exit;
    }
    return $user;
}
?>