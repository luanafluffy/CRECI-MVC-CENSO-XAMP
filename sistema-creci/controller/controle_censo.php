<?php
require_once(dirname(__FILE__, 2) . '/config/config.php');

session_start();
requireValidSession();
loadModel('Censos');

$NomeUsuario = $_SESSION['usuario']->nome_completo ?? "";
var_dump($NomeUsuario);
if(isset($_POST['creciNumero'], $_POST['anoExerc'])){
    $registro = Censos::loadConsultaCenso($_POST['creciNumero'], $_POST['anoExerc']);
}else{
    $registro = "";
}

loadTemplateView('controle_censo', ['registro' => $registro]);
?>