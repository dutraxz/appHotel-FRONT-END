<?php
require_once __DIR__ . "/controllers/authController.php";
require_once __DIR__ . "/controllers/QuartoController.php";
require_once __DIR__ . "/controllers/ClienteController.php";
require_once __DIR__ . "/controllers/ReservaController.php";
require_once __DIR__ . "/controllers/PermissaoController.php";
require_once __DIR__ . "/controllers/PedidoController.php";
require_once __DIR__ . "/helpers/token_jwt.php";
require_once __DIR__ . "/controllers/passwordController.php";

    $data = [
        "email"=>"victorED@gmail.com",
        "password"=>'vicEDU'
    ];


    
    
    
    // - - - Quartos - - -
    
    
    // QuartoController::atualizar($conn, $id = 4, $data);
    // QuartoController::deletar($conn, $id = 4, $data);
    // QuartoController::listarTodos($conn, $id = 6);
    // QuartoController::criar($conn, $data);
    
    // $data = [

    //    "nome" => "Quarto Vitera",
    //    "numero" => 4,
    //    "camaSolteiro" => 310,
    //    "camaCasal" => 0,
    //    "disponivel" => 1,
    //    "preco" => 200900
    // ];


    // - - - Clientes - - -

    // ClienteController::atualizar($conn, $id = 4, $data);
    // ClienteController::deletar($conn, $id = 4, $data);
    // ClienteController::listarTodos($conn, $id = 6);
    //ClienteController::criar($conn, $data);
    
    $data = [
        
        "nome" => "VictorEDU",
        "email" => "VictorED@gmail.com",
        "cpf" => "262148",
        "telefone" => "15999",
        "senha" => "edu123",
        "id_cargo_fk" => 2 
    ];
    

    // - - - Reservas - - -


    // ReservaController::atualizar($conn, $id = 4, $data);
    // ReservaController::deletar($conn, $id = 4, $data);
    // ReservaController::listarTodos($conn, $id = 6);
    // ReservaController::criar($conn, $data);

    // $data = [

    //    "id_adicional_fk" => "Quarto Vitera",
    //    "id_quarto_fk" => 4,
    //    "id_pedido_fk" => 310,
    //    "dataInicio" => 0,
    //    "dataFim" => 1,
    // ];


    // - - - Pedidos - - -


    // PedidoController::atualizar($conn, $id = 4, $data);
    // PedidoController::deletar($conn, $id = 4, $data);
    // PedidoController::listarTodos($conn, $id = 6);
    // PedidoController::criar($conn, $data);

    // $data = [

    //    "id_usuario_fk" => "Quarto Vitera",
    //    "id_cliente_fk" => 4,
    //    "data" => 310,
    //    "pagamento" => 0,
    // ];


    // - - - SAdicionais - - -


    // AdicionalController::atualizar($conn, $id = 4, $data);
    // AdicionalController::deletar($conn, $id = 4, $data);
    // AdicionalController::listarTodos($conn, $id = 6);
    // AdicionalController::criar($conn, $data);

    // $data = [

    //    "nome" => "Quarto Vitera",
    //    "preco" => 200900
    // ];


    // - - - Permissoes - - -


    // PermissaoController::atualizar($conn, $id = 4, $data);
    // PermissaoController::deletar($conn, $id = 4, $data);
    // PermissaoController::listarTodos($conn, $id = 6);
    // PermissaoController::criar($conn, $data);

    // $data = [

    //    "nome" => "Quarto Vitera",
    // ];





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