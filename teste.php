<?php
    require_once __DIR__ . "/controllers/AuthController.php";
    require_once __DIR__ . "/controllers/passwordController.php";

    $data = [
        "email"=>"victorED@gmail.com",
        "password"=>'vicEDU'
    ];

    authController::login($conn, $data);
    //echo passWordController::generateHash($data['password']);

    //$hash = '$2y$10$yTQ9oCnWXqq.W1dMaDariu67Xzw.V9jiRjnciolSmPaxarwG/RvKG';

    //echo "<br>";

    //echo passWordController::validateHash($data['password'], $hash);
?>  