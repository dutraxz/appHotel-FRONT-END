<?php
require_once __DIR__ . "/../controllers/ClienteController.php";
 
if ($_SERVER['REQUEST_METHOD'] === "GET"){
    validateTokenAPI("infra");
    $id = $segmentos[2] ?? null;
    if(isset($id)){
        ClienteController::buscarPorId($conn, $id);
    }else{
        ClienteController::listarTodos($conn);
    }
}
elseif ($_SERVER['REQUEST_METHOD'] === "POST"){
    $data = json_decode(file_get_contents('php://input'), true);
    ClienteController::criar($conn, $data);
}
elseif ($_SERVER['REQUEST_METHOD'] === "DELETE"){
    validateTokenAPI("infra");
    $id = $segmentos[2] ?? null;
   
    if(isset($id)){
        ClienteController::deletar($conn, $id);
    }else{
        jsonResponse(['message' =>'É necessario passar o ID'], 400);
    } 
}
elseif($_SERVER['REQUEST_METHOD'] === "PUT"){
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    ClienteController::atualizar($conn, $id, $data);
}
else{
    jsonResponse([
        'status'=>'erro',
        'message'=>'Metodo nao permitido'
    ], 405);
}
?>