<?php

#require_once "../config/database.php";
require_once __DIR__ . "/../controllers/authController.php";


if ($_SERVER['REQUEST_METHOD'] === "GET"){
    $data = json_decode(file_get_contents('php://input'), true);
    authController::login($conn, $data);
}else{
    jsonResponse([
        'status'=>'erro',
        'message'=>'Método não permitido'
    ], 405);
}

?>