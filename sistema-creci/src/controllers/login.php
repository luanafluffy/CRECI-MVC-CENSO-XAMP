<?php
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
}
// Mandando o POST também para retornar com campos preenchidos
loadView('login', $_POST + ['exception' => $exception]);