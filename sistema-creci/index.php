<?php

define('ROOT', dirname(__FILE__, 1));

//Série de classes, constantes e diretórios
require_once(ROOT . '/src/config/config.php');

// Validando URL e fazendo com que funcione com os parametros com a função "parse_url"
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

$uri = substr($uri, 15); //tirando o "sistema-creci/"

if($uri === '/sistema-creci/' ||  $uri === 'sistema-creci/index.php') {
    $uri = 'sistema-creci/src/controllers/controle_censo.php';
    require_once(ROOT . $uri);

}elseif(CONTROLLER_PATH . "/{$uri}"){
     
    require_once(CONTROLLER_PATH ."/{$uri}");

}else {
    echo $uri; 
    // require_once('sistema-creci/erro.php');
}
//O arquivo .htaccess força todas as requisições passarem pelo index.php