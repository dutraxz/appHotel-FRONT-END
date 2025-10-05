<?php
#require_once "../config/database.php";
require_once __DIR__ . "/../controllers/authController.php";


if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $opcao = $segmentos[2] ?? null;
    $data = json_decode(file_get_contents('php://input'), true);
    

    if($opcao = "cliente"){ //login Cliente
    authController::loginCliente($conn, $data);
    
}
    elseif($opcao = "funcionario"){ //login Funcionário
    authController::login($conn, $data);
}
//teste
    // elseif ($_SERVER['REQUEST_METHOD'] === "PUT"){
    // validateTokenAPI();
    // jsonResponse(['message']=> "token invalido");

    // $headers = getallheaders();
    // if(!isset($headers["Authorization"]) ){
    // return jsonResponse(['message'=>'verifiqued'], 200);
    // }
    // $token = str_replace("Bearer", "", $headers["Authorization"]);
    // jsonResponse(['message'=>$headers], 200);
}
else{
    jsonResponse([
        'status'=>'erro',
        'message'=>'Método não permitido'
    ], 405);
}
?>