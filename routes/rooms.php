<?php

require_once __DIR__ . "/../controllers/QuartoController.php";

if ($_SERVER['REQUEST_METHOD'] === "GET" ){
    $id = $segmentos[2] ?? null;
    //QuartoController::buscarPorId($conn, $id);
    //echo $id;
    //QuartoController::listarTodos($conn);
if(isset($id)){
    QuartoController::buscarPorId($conn, $id);
}else{
    QuartoController::listarTodos($conn);
    }
}

elseif($_SERVER['REQUEST_METHOD'] === "DELETE" ){
    $id = $segmentos[2] ?? null;

if(!isset($id)){
    QuartoController::deletarQuarto($conn, $id);
}else{
    jsonResponse(['message' => 'Id do quarto não encontrado'], 400);
    }
}


else{
    jsonResponse([
        'status'=>'erro',
        'message'=>'Método não permitido'
    ], 405);
}

?>