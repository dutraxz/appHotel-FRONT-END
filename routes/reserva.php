<?php
require_once __DIR__ . "/../controllers/ReservaController.php";
 
if ($_SERVER['REQUEST_METHOD'] === "GET"){
    $id = $segmentos[2] ?? null;
    if(isset($id)){
        ReservaController::buscarPorId($conn, $id);
    }else{
        ReservaController::listarTodos($conn);
    }
}
elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
    $opcao = $segments[2] ?? null;
    $data = json_decode(file_get_contents('php://input'), true);
    ReservaController::criar($conn, $data);
}
elseif ($_SERVER['REQUEST_METHOD'] === "DELETE"){
    $id = $segmentos[2] ?? null;
   
    if(isset($id)){
        ReservaController::deletar($conn, $id);
    }else{
        jsonResponse(['message' =>'É necessario passar o ID'], 400);
    } 
}
elseif($_SERVER['REQUEST_METHOD'] === "PUT"){
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    ReservaController::atualizar($conn, $id, $data);
    

}
else{
    jsonResponse([
        'status'=>'erro',
        'message'=>'Metodo nao permitido'
    ], 405);
}
?>