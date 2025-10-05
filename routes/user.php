<?php
require_once __DIR__ . "/../controllers/UserController.php";

if ($_SERVER['REQUEST_METHOD'] === "GET"){
    $id = $segmentos[2] ?? null;   
    if(isset($id)){
        UserController::buscarPorId($conn, $id);
    }else{
        UserController::listarTodos($conn);
    }
}
elseif ($_SERVER['REQUEST_METHOD'] === "DELETE"){
    $id = $segmentos[2] ?? null;
    
    if(isset($id)){
        UserController::delete($conn, $id);
    }else{
        jsonResponse(['messagem' =>'É necessario passar o ID'], 400);
    }   
}
elseif ($_SERVER['REQUEST_METHOD'] === "POST"){
    $data = json_decode(file_get_contents('php://input'), true);
    UserController::criar($conn, $data);
}
elseif($_SERVER['REQUEST_METHOD'] === "PUT"){
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    UserController::atualizar($conn, $id, $data);
    
}

else{
    jsonResponse([
        'status'=>'erro',
        'menssagem'=>'Metodo nao permitido'
    ], 405);
}

?>