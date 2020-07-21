<?php
session_start();
requireValidSession();

loadModel('Censos');

$usuario = $_SESSION['user'];
$cadastroCenso = Censos::loadCadastroCenso($usuario->id, $hoje);

try {
    $diaAtual = date('d/m/Y');
    $cadastroCenso->registroCenso($diaAtual);
    addSuccessMsg('Cadastro de censo realizado com sucesso!');
} catch(AppException $e) {
    addSuccessMsg($e->getMessage());
}

header('Location: controle_censo.php');