<?php
    require_once __DIR__ . "/controllers/AuthController.php";
    require_once __DIR__ . "/controllers/passwordController.php";

    $data = [
        "email"=>"victorED@gmail.com",
        "password"=>'vicEDU'
    ];

    //authController::login($conn, $data);
    
    $tokenValido = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJzaXRlVmljdG9yIiwiaWF0IjoxNzU2OTMwNDA0LCJleHAiOjE3NTY5MzQwMDQsInN1YiI6eyJpZCI6MTMsImVtYWlsIjoidmljdG9yRURAZ21haWwuY29tIiwibm9tZSI6InZpY3RvciIsIkNhcmdvIjoiU3Vwb3J0ZSBUSSJ9fQ.jhOVJWSNg3qS-qE30KcIuwuOlWR6llq4bcGlRgS7ufI";
    //$tokenInvalido = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJzaXRlVmljdG9yIiwiaWF0IjoxNzU2OTMwNDA0LCJleHAiOjE3NTY5MzQwMDQsInN1YiI6eyJpZCI6MTMsImVtYWlsIjoidmljdG9yRURAZ21haWwuY29tIiwibm9tZSI6InZpY3RvciIsIkNhcmdvIjoiU3Vwb3J0ZSBUSSJ9fQ.jhOVJWSNg3qS-qE30KcIuwuOlWR6llq4bcGlRgS7123"

    echo var_dump(validateToken($tokenValido));

    //echo validateToken($token);
    
    //echo passWordController::generateHash($data['password']);

    //$hash = '$2y$10$yTQ9oCnWXqq.W1dMaDariu67Xzw.V9jiRjnciolSmPaxarwG/RvKG';

    //echo "<br>";

    //echo passWordController::validateHash($data['password'], $hash);
?>  