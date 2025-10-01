<?php

#require_once "../config/database.php";
require_once __DIR__ . "/../controllers/authController.php";


if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $opcao = $segments[2] ?? null;
    $data = json_decode(file_get_contents('php://input'), true);
    

    if($opcao = "cliente"){ //login Cliente
    authController::loginCliente($conn, $data);
    
}
elseif($opcao = "funcionario"){ //login Funcionário
    authController::loginFuncionario($conn, $data);
}



}else{
    jsonResponse([
        'status'=>'erro',
        'message'=>'Método não permitido'
    ], 405);
}

?>