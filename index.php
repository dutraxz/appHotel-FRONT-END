<?php

//Requere conexão com o banco de dados
require_once "config/database.php";
//Requere helper de respostas
require_once 'helpers/response.php';
//Requere helper de tokens
require_once 'helpers/token_jwt.php';

//Verifica se houve erro na conexão com o banco de dados
if($erroDB){
    echo "erro na conexão";
    exit;
}

//Obtém a URI e o método da requisição HTTP
//strtolower deixa tudo em minusculo
//parse_url analisa a url e devolve seus componentes (QUERY, PATH, HOST, ETC) que for solicitado
//_SERVER variavel superglobal que contem informações sobre cabeçalhos, caminhos e localizações de scripts
//REQUEST_URI retorna a parte da URL após o nome do domínio
//PHP_URL_PATH retorna o caminho da URL

$uri = strtolower(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
//Método da requisição (GET, POST, PUT, DELETE, etc.)
$metodo = $_SERVER['REQUEST_METHOD'];

//Remove o nome da pasta do projeto da URI para facilitar o roteamento
//basename retorna o nome do diretório pai do arquivo atual
//dirname retorna o caminho do diretório pai do arquivo atual
//FILE__ é uma constante mágica que contém o caminho completo e o nome do arquivo do script em execução
$pasta = strtolower(basename(dirname(__FILE__)));

//remove o nome da pasta do projeto da URI e armazena na variável $uri
//str_replace substitui todas as ocorrências da string de busca pela Substring de substituição
$uri = str_replace("/$pasta", "", $uri);
//Divide a URI em segmentos com base nas barras "/"
//explode divide uma string em várias strings menores, com base em um delimitador especificado
//trim remove espaços em branco (ou outros caracteres) do início e do fim de uma string
$segmentos = explode("/", trim($uri, "/"));

//route = rota principal (api)
//subRoute = sub-rota (cliente, quarto, reserva, etc)
$route = $segmentos[0] ?? null;
$subRoute = $segmentos[1] ?? null;

//Se a rota principal não for "api", carrega o front-end
if($route != "api") {
    //Carrega o front-end e __DIR__ peg o diretorio inteiro do arquvio aonde esta localizado
    require __DIR__ . "/public/index.html";
    //Ou carrega o arquivo de testes
    require "teste.php";
    //Encerra a execução do script
    exit;

    //Se a rota for "api", carrega as rotas da API
}elseif($route === "api") {
    //Verifica se a sub-rota é válida e carrega o arquivo correspondente para tratar a requisição
    //A função in_array verifica se um valor ($subRoute) existe em um array (lista de rotas válidas)
    if(in_array($subRoute, [ "login", "quarto", "cliente", "pedido", "reserva", "adicional"] )){
        //Carrega o arquivo de rotas correspondente à sub-rota
        require "routes/${subRoute}.php";
    }else{
        return jsonResponse(['message'=>'rota não encontrada'], 404);
    }
    exit;
//Se a rota não for reconhecida, retorna erro 404
}else {
    echo "404, Página não encontrada";
    exit;
}

#echo var_dump($segmentos);
#echo var_dump($pasta); //Mostra na tela oque esta faze
// ndo

?>