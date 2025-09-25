<?php
require_once __DIR__ . "/../controllers/PermissaoController.php";
 
if ($_SERVER['REQUEST_METHOD'] === "GET"){
    $id = $segmentos[2] ?? null;
    if(isset($id)){
        PermissaoController::buscarPorId($conn, $id);
    }else{
        PermissaoController::listarTodos($conn);
    }
}
elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    PermissaoController::criar($conn, $data);
}
elseif ($_SERVER['REQUEST_METHOD'] === "DELETE"){
    $id = $segmentos[2] ?? null;
   
    if(isset($id)){
        PermissaoController::deletar($conn, $id);
    }else{
        jsonResponse(['message' =>'É necessario passar o ID'], 400);
    } 
}
elseif($_SERVER['REQUEST_METHOD'] === "PUT"){
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    PermissaoController::atualizar($conn, $id, $data);
    

}
else{
    jsonResponse([
        'status'=>'erro',
        'message'=>'Metodo nao permitido'
    ], 405);
}
?>