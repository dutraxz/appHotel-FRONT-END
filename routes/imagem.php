<?php

require_once __DIR__ . "/../controllers/ImagemController.php";

//rota de teste
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $data = $_FILES['imagens'] ?? null;
    ImagemController::upload([$data]);
}else{
    jsonResonse(['status', 'message'=> 'erro']);
}
?>