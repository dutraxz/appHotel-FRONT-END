<?php
    require_once __DIR__ . "/controllers/authController.php";
    require_once __DIR__ . "/controllers/QuartoController.php";
    require_once __DIR__ . "/helpers/token_jwt.php";
    require_once __DIR__ . "/controllers/passwordController.php";

    //$data = [
        //"email"=>"victorED@gmail.com",
        //"password"=>'vicEDU'
    //];


    //$data = [

    //    "nome" => "Quarto Vitera",
    //    "numero" => 5,
    //    "camaSolteiro" => 310,
    //    "camaCasal" => 0,
    //    "disponivel" => 1,
    //    "preco" => 200900
    //];
    

    //QuartoController::atualizarQuarto($conn, $id = 4, $data);
    //QuartoController::criar($conn, $data);






    //authController::login($conn, $data);
    
    //$tokenValido = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJzaXRlVmljdG9yIiwiaWF0IjoxNzU2OTMwNDA0LCJleHAiOjE3NTY5MzQwMDQsInN1YiI6eyJpZCI6MTMsImVtYWlsIjoidmljdG9yRURAZ21haWwuY29tIiwibm9tZSI6InZpY3RvciIsIkNhcmdvIjoiU3Vwb3J0ZSBUSSJ9fQ.jhOVJWSNg3qS-qE30KcIuwuOlWR6llq4bcGlRgS7ufI";
    //$tokenInvalido = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJzaXRlVmljdG9yIiwiaWF0IjoxNzU2OTMwNDA0LCJleHAiOjE3NTY5MzQwMDQsInN1YiI6eyJpZCI6MTMsImVtYWlsIjoidmljdG9yRURAZ21haWwuY29tIiwibm9tZSI6InZpY3RvciIsIkNhcmdvIjoiU3Vwb3J0ZSBUSSJ9fQ.jhOVJWSNg3qS-qE30KcIuwuOlWR6llq4bcGlRgS7123"

    //echo var_dump(validateToken($tokenValido));

    //echo validateToken($token);
    
    //echo passWordController::generateHash($data['password']);

   //$hash = '$2y$10$yTQ9oCnWXqq.W1dMaDariu67Xzw.V9jiRjnciolSmPaxarwG/RvKG';
   //echo passWordController::validateHash($data['password'], $hash);

    //echo "<br>";

?>  