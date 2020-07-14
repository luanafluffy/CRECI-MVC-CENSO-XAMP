<?php
//Série de classes, constantes e diretórios
require_once(dirname(__FILE__) . '/config/config.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if($uri === '/sistema-creci/index.php' || $uri === '/sistema-creci/controller/login.php' || $uri === '/sistema-creci'){
    $uri = '/controller/controle_censo.php';
}

require_once(dirname(__FILE__) .$uri);