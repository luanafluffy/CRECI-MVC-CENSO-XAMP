<?php 
session_start();
requireValidSession();
loadModel('Censos');

$nomeUsuario = $_SESSION['usuario']->nome_completo ?? "";
$creciNumero = $_POST['creciNumero'] ?? "";
$anoExerc =  $_POST['anoExerc'] ?? "";

$registro = Censos::loadConsultaCenso($creciNumero, $anoExerc);
loadTemplateView('controle_censo', ['registro' => $registro]);