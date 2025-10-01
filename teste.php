<?php
require_once __DIR__ . "/controllers/authController.php";
require_once __DIR__ . "/controllers/QuartoController.php";
require_once __DIR__ . "/controllers/ClienteController.php";
require_once __DIR__ . "/controllers/ReservaController.php";
require_once __DIR__ . "/controllers/PermissaoController.php";
require_once __DIR__ . "/controllers/PedidoController.php";
require_once __DIR__ . "/controllers/AdicionalController.php";
require_once __DIR__ . "/helpers/token_jwt.php";
require_once __DIR__ . "/controllers/passwordController.php";

    $data = [
        "email"=>"victorED@gmail.com",
        "senha"=>'vicEDU'
    ];


    
    
    
    // - - - Quartos - - -
    
    // $data = [

    //    "nome" => "Quarto Viteraça",
    //    "numero" => 400,
    //    "camaCasal" => 310,
    //    "camaSolteiro" => 0,
    //    "disponivel" => 1,
    //    "preco" => 200901
    // ];

    // QuartoController::atualizar($conn, $id = 7, $data);
    // QuartoController::deletar($conn, 8);
    // QuartoController::listarTodos($conn, 6);
    // QuartoController::criar($conn, $data);
    
    


    // - - - Clientes - - -

    // $data = [
        
    //     "nome" => "VictorEDUZAOOO",
    //     "email" => "VictorED@gmail.com0909",
    //     "cpf" => "2621481212",
    //     "telefone" => "159991212",
    //     "senha" => "edu2020",
    //     "id_cargo_fk" => 2
    // ];  

    // ClienteController::atualizar($conn, $id = 5, $data);
    // ClienteController::deletar($conn, $id = 6);
    // ClienteController::listarTodos($conn, $id = 5);
    // ClienteController::criar($conn, $data);
    
    
    

    // - - - Reservas - - -

    // $data = [

    //    "id_adicional_fk" => 4,
    //    "id_quarto_fk" => 4,
    //    "id_pedido_fk" => 2
    // ];

    // ReservaController::listarPorPedido($conn, $id = 5);
    // ReservaController::criar($conn, $data);

    


    // - - - Pedidos - - -

    // $data = [

    //    "id_usuario_fk" => 11,
    //    "id_cliente_fk" => 5,
    //    "pagamento" => "Credito"
    // ];


    // PedidoController::listarTodos($conn, $data);
    // PedidoController::buscarPorId($conn, 4, $data);
    


    // - - - SAdicionais - - -

    // $data = [

    //    "nome" => "Choc2",
    //    "preco" => 1030
    // ];

    // AdicionalController::atualizar($conn, 4, $data);
    // AdicionalController::deletar($conn, $id = 5, $data);
    // AdicionalController::listarTodos($conn, $id = 6);
    // AdicionalController::criar($conn, $data);

    


    // - - - Permissoes - - -

    // $data = [

    //    "nome" => "DEV"
    // ];

    // PermissaoController::atualizar($conn, $id = 4, $data);
    // PermissaoController::deletar($conn, $id = 7, $data);
    // PermissaoController::listarTodos($conn, $id = 6);
    // PermissaoController::criar($conn, $data);

    





    //authController::login($conn, $data);
    
    //$tokenValido = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJzaXRlVmljdG9yIiwiaWF0IjoxNzU2OTMwNDA0LCJleHAiOjE3NTY5MzQwMDQsInN1YiI6eyJpZCI6MTMsImVtYWlsIjoidmljdG9yRURAZ21haWwuY29tIiwibm9tZSI6InZpY3RvciIsIkNhcmdvIjoiU3Vwb3J0ZSBUSSJ9fQ.jhOVJWSNg3qS-qE30KcIuwuOlWR6llq4bcGlRgS7ufI";
    //$tokenInvalido = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJzaXRlVmljdG9yIiwiaWF0IjoxNzU2OTMwNDA0LCJleHAiOjE3NTY5MzQwMDQsInN1YiI6eyJpZCI6MTMsImVtYWlsIjoidmljdG9yRURAZ21haWwuY29tIiwibm9tZSI6InZpY3RvciIsIkNhcmdvIjoiU3Vwb3J0ZSBUSSJ9fQ.jhOVJWSNg3qS-qE30KcIuwuOlWR6llq4bcGlRgS7123"

    //echo var_dump(validateToken($tokenValido));

    //echo validateToken($token);
    
    //echo passwordController::generateHash($data['senha']);

   //$hash = '$2y$10$yTQ9oCnWXqq.W1dMaDariu67Xzw.V9jiRjnciolSmPaxarwG/RvKG';
   //echo passwordController::validateHash($data['senha'], $hash);

    //echo "<br>";

?>  