<?php
require_once __DIR__ . "/../controllers/QuartoController.php";
 
if ($_SERVER['REQUEST_METHOD'] === "GET"){
    $id = $segmentos[2] ?? null;
    if(isset($id)){
        quartoController::buscarPorId($conn, $id);
    }else{
        quartoController::listarTodos($conn);
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['dataInicio']) && isset($data['dataFim'])) {
        $dataInicio = $data['dataInicio'];
        $dataFim = $data['dataFim']
        $quantidadePessoas = $data['quantidadePessoas'];
        QuartoController::validarCntrl($conn, $dataInicio, $dataFim, $quantidadePessoas);
    }
    else if (isset($data['nome'])) {
        QuartoController::criar($conn, $data);
    }
    else {
        jsonResponse(['message' =>"Atributos de requisição inválidos ou incompletos"], 400);
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === "DELETE"){
    $id = $segmentos[2] ?? null;
   
    if(isset($id)){
        QuartoController::deletar($conn, $id);
    }else{
        jsonResponse(['message' =>'É necessario passar o ID'], 400);
    } 
}

elseif ($_SERVER['REQUEST_METHOD'] === "PUT"){
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];

    if (isset($id, $data)) {
            QuartoController::atualizar($conn, $id, $data);
        } else {
            jsonResponse(["message"=>"Atributos Invalidos!"], 400);
        }
}
else{
    jsonResponse([
        'status'=>'erro',
        'message'=>'Metodo nao permitido'
    ], 405);
}
?>