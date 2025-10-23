<?php

require_once __DIR__ . "/../controllers/ImagemController.php";

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $data = $_FILES['fotos'] ?? null;
    ImagemController::upload([$data]);
}else{
    jsonResonse(['status', 'message'=> 'erro']);
}
?>