<?php
require_once __DIR__ . "/../controllers/QuartoController.php";
 
if ($_SERVER['REQUEST_METHOD'] === "GET"){
    $id = $seguimentos[2] ?? null;  
    if(isset($id)){
        quartoController::buscarPorId($conn, $id);
    }else{
        quartoController::listarTodos($conn);
    }
}
elseif ($_SERVER['REQUEST_METHOD'] === "DELETE"){
    $id = $seguimentos[2] ?? null;
   
    if(!isset($id)){
        QuartoController::deletarQuarto($conn, $id);
    }else{
        jsonResponse(['messagem' =>'É necessario passar o ID'], 400);
    }  
}
else{
    jsonResponse([
        'status'=>'erro',
        'menssagem'=>'Metodo nao permitido'
    ], 405);
}
 
 
?>
 