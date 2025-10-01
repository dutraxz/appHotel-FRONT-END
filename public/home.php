<?php
    require_once "../config/database.php";
    require_once "../controllers/authController.php";
    $title = "HOME";
    //require_once 'utils/cabecalho.php';
    
    $data = [
        "email"=>"victorED@gmail.com",
        "senha"=>"vicEDU"
    ];

    authController::login($conn, $data);


    
?>  


<h1>home initial</h1>

<?php
require_once 'utils/cabecalho.php';
    
?>  

