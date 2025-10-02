<?php
require_once __DIR__ . "/../controllers/QuartoController.php";
 
if ($_SERVER['REQUEST_METHOD'] === "GET"){
    $id = $segmentos[2] ?? null;
    if(isset($id)){
    QuartoController::buscarPorId($conn, $id);

        $inicio = isset($_GET['inicio']) ? $_GET['inicio'] : null;
            $fim = isset($_GET['fim']) ? $_GET['fim'] : null;
            $qtd = isset($_GET['qtd']) ? $_GET['qtd'] : null;
            QuartoController::get_available($conn, ["dataInicio"=>$inicio, "dataFim"=>$fim, "qtd"=>$qtd]);

    }else{
        QuartoController::listarTodos($conn);
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
        QuartoController::criar($conn, $data);
        jsonResponse(['message' =>"Atributos de requisição inválidos ou incompletos"], 400);
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