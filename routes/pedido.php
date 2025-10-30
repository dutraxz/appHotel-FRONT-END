<?php
require_once __DIR__ . "/../controllers/PedidoController.php";
 
if ($_SERVER['REQUEST_METHOD'] === "GET"){
    $id = $segmentos[2] ?? null;
    if(isset($id)){
        PedidoController::buscarPorId($conn, $id);
    }else{
        PedidoController::listarTodos($conn);
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
    $user = validateTokenAPI("cliente"); 

    $id = $segmentos[2] ?? null;
    $data = json_decode(file_get_contents('php://input'), true);
    $data ['cliente_id'] = $user['id'];

    if($id == "reserva"){
        PedidoController::criarOrdem($conn, $data);
    }else{
        PedidoController::criar($conn, $data);
    }
}
else{
    jsonResponse(['status'=>'erro', 'message'=>'Metodo nao permitido'], 405);
}

// elseif($_SERVER['REQUEST_METHOD'] === "DELETE"){
//     $id = $segmentos[2] ?? null;
   
//     if(isset($id)){
//         PedidoController::deletar($conn, $id);
//     }else{
//         jsonResponse(['message' =>'É necessario passar o ID'], 400);
//     } 
// }
// elseif($_SERVER['REQUEST_METHOD'] === "PUT"){
//     $data = json_decode(file_get_contents('php://input'), true);
//     $id = $data['id'];
//     PedidoController::atualizar($conn, $id, $data);
    

// }
// else{
//     jsonResponse([
//         'status'=>'erro',
//         'message'=>'Metodo nao permitido'
//     ], 405);
// }
?>