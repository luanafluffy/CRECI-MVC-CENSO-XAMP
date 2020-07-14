<?php
require_once(dirname(__FILE__, 2) . '/config/config.php');

loadModel('Login');
session_start();
$exception = null;

if(count($_POST) > 0) {
    $login = new Login($_POST);
    try {
        // Usuário logado?
        $usuario = $login->checkLogin();
        $_SESSION['usuario'] = $usuario;
        header("Location: controle_censo.php");
    } catch(AppException $e) {
        $exception = $e;
    }
}else {
    $exception = '';
}
// Mandando o POST também para retornar com campos preenchidos
loadView('login', $_POST + ['exception' => $exception]);