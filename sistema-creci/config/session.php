<?php
// Saber se a sessão está ativa 
// Usuário logado?
function requireValidSession() {
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)) {
        header('Location: controller/login.php');
        exit();
    }
}