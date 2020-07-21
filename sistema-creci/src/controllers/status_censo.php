<?php
session_start();
requireValidSession();
loadModel('Censos');

// Nome do usuario logado
$nome_usuario = $_SESSION['usuario']->nome_completo; 
// Dados da pesquisa
$creciNumero = $_POST['creciNumero'] ?? null; 
$anoExerc = $_POST['anoExerc'] ?? null;
$botao = $_POST['botao'] ?? null;
$inicioCenso = $_POST['inicioCenso'] ?? null;
$cadastroCenso = $_POST['cadastroCenso'] ?? null;
// Dados do formulário de passos 1/2/3
$cadastro = $_POST['cadastro'] ?? null;
$entrada = $_POST['entrada'] ?? null;
$status = $_POST['status'] ?? null;
$just = $_POST['just'] ?? null;
$atuali_status = $_POST['atuali_status'] ?? null;
$saida = $_POST['saida'] ?? null;

// Feedback de entrada
echo 'Creci: '.$creciNumero,'<br>Ano: ' . $anoExerc, '<br>Função: '. $botao.'<br><br>';

// Se os dados forem encontrados, registrar ou atualizar e mostrar mensagem 
if($creciNumero && $anoExerc){ 
    // Tratamento de botão para função
    try {
        // Pesquisando no Banco de Dados
        $registroBD = Censos::loadConsultaCenso($creciNumero, $anoExerc); 
        $registroBD->registroCenso($registroBD, $botao, $nome_usuario, $cadastro, $entrada, $status, $just, $atuali_status, $saida); 
        addSuccessMsg('Status atualizado!');
        
    } catch(AppException $e) {
        addErrorMsg($e->getMessage());
    }
}
header('Location: controle_censo.php');