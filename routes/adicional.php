<?php
require_once __DIR__ . "/../controllers/AdicionalController.php";
 
if ($_SERVER['REQUEST_METHOD'] === "GET"){
     
    $id = $segmentos[2] ?? null;
    
    if(isset($id)){
        AdicionalController::buscarPorId($conn, $id);
    }else{
        AdicionalController::listarTodos($conn);
    }
}
elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
    validateTokenAPI("Infra"); 
    $data = json_decode(file_get_contents('php://input'), true);
    AdicionalController::criar($conn, $data);
}
elseif ($_SERVER['REQUEST_METHOD'] === "DELETE"){
     validateTokenAPI("Infra"); 
    $id = $segmentos[2] ?? null;

    if(isset($id)){
        AdicionalController::deletar($conn, $id);
    }else{
        jsonResponse(['message' =>'É necessario passar o ID'], 400);
    } 
}
elseif($_SERVER['REQUEST_METHOD'] === "PUT"){
     validateTokenAPI("Infra");
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    AdicionalController::atualizar($conn, $id, $data);
    

}
else{
    jsonResponse([
        'status'=>'erro',
        'message'=>'Metodo nao permitido'
    ], 405);
}
?>