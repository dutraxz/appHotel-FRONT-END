<?php
require_once __DIR__ . "/../controllers/QuartoController.php";
 
if ($_SERVER['REQUEST_METHOD'] === "GET"){
    $id = $segmentos[2] ?? null;

    if (isset($id)){
        if (is_numeric($id)){ //Cliente passou um numero -> (API/ROOMS/1)
            QuartoController::buscarPorId($conn, $id);

        }elseif($id === "disponivel"){ // cliente os disponiveis -> (API/ROOMS/DISPONIVEIS?)
            $data = [
                "dataInicio" => isset($_GET['dataInicio']) ? $_GET['dataInicio'] : null,
                "dataFim" => isset($_GET['dataFim']) ? $_GET['dataFim'] : null,
                "qtd" => isset($_GET['qtd']) ? $_GET['qtd'] : null];
            QuartoController::buscarDisponiveis($conn, $data);
        }else{
            jsonResponse(['messagem' =>'Rota nao identificada'], 400);
        }
    }else{
            QuartoController::listarTodos($conn);
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === "DELETE"){
    $id = $segmentos[2] ?? null;
    
    if(isset($id)){
        QuartoController::delete($conn, $id);
    }else{
        jsonResponse(['messagem' =>'É necessario passar o ID'], 400);
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === "POST"){
    $data = $_POST;
    $data['imagens'] = $_FILES['imagens'] ?? null;
    RoomController::create($conn, $data);
}
elseif($_SERVER['REQUEST_METHOD'] === "PUT"){
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    QuartoController::atualizar($conn, $id, $data);     
}

else{
    jsonResponse([ 'status'=>'erro', 'menssagem'=>'Metodo nao permitido'], 405);
}

