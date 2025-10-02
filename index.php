<?php
require_once "config/database.php";
require_once 'helpers/response.php';
require_once 'helpers/token_jwt.php';

if($erroDB){
    echo "erro na conexão";
    exit;
}
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$metodo = $_SERVER['REQUEST_METHOD'];

$pasta = basename(dirname(__FILE__));
$uri = str_replace("/$pasta", "", $uri);
$segmentos = explode("/", trim($uri, "/"));

$route = $segmentos[0] ?? null;
$subRoute = $segmentos[1] ?? null;

if($route != "api"){
    require __DIR__ . "/public/index.html";
    require "teste.php";
    exit;

}
elseif($route === "api"){
    if(in_array($subRoute, [ "login", "quarto", "cliente", "pedido", "reserva", "adicional"] )){
        require "routes/${subRoute}.php";
    }else{
        return jsonResponse(['message'=>'rota não encontrada'], 404);
    }
    exit;

}else{
    echo "404, Página não encontrada";
    exit;
}

#echo var_dump($segmentos);
#echo var_dump($pasta); //Mostra na tela oque esta fazendo

?>