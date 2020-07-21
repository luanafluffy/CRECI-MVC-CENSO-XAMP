<?php
loadModel('Censos');

function getCensoModelo($anoExerc, $creciNumero, $inicioCenso, $nomeCorretor, $cadastroCenso, $p1Cadastro, $p1Entrada, $p1Status, $p1Just, 
                        $p1AtualiStatus, $p1Saida, $p2Cadastro, $p2Entrada, $p2Status, $p2Just, $p2AtualiStatus, $p2Saida, $p3Cadastro,
                        $p3Entrada, $p3Status, $p3Just, $p3AtualiStatus, $p3Saida) {
    $modelo = array(
        "ano_exerc" => $anoExerc,
        "creci_numero" => $creciNumero,
        "inicio_censo" => $inicioCenso,
        "nome_corretor" => $nomeCorretor,
        "cadastro_censo" => $cadastroCenso,
        "p1_cadastro" => $p1Cadastro,
        "p1_entrada" => $p1Entrada,
        "p1_status" => $p1Status,
        "p1_just" => $p1Just,
        "p1_atuali_status" => $p1AtualiStatus,
        "p1_saida" => $p1Saida,
        "p2_cadastro" => $p2Cadastro,
        "p2_entrada" => $p2Entrada,
        "p2_status" => $p2Status,
        "p2_just" => $p2Just,
        "p2_atuali_status" => $p2AtualiStatus ,
        "p2_saida" => $p2Saida,
        "p3_cadastro" => $p3Cadastro,
        "p3_entrada" => $p3Entrada,
        "p3_status" => $p3Status, 
        "p3_just" => $p3Just,
        "p3_atuali_status" => $p3AtualiStatus,
        "p3_saida" => $p3Saida,
    );
    return $modelo;
}

function popularCensos($anoExerc, $creciNumero, $nomeCorretor, $cadastroCenso, $p1Cadastro, $p1Entrada, $p1Status, $p1Just, 
                       $p1AtualiStatus, $p1Saida, $p2Cadastro, $p2Entrada, $p2Status, $p2Just, $p2AtualiStatus, $p2Saida, $p3Cadastro,
                       $p3Entrada, $p3Status, $p3Just, $p3AtualiStatus, $p3Saida) {
    $inicioCenso = (new DateTime())->format('d/m/Y'); //hoje
    $colunas = [
        "ano_exerc" => $anoExerc,
        "creci_numero" => $creciNumero, 
        "inicio_censo" => $inicioCenso, 
        "nome_corretor" => $nomeCorretor,
    ];
    $modelo = getCensoModelo($anoExerc, $creciNumero, $inicioCenso, $nomeCorretor, $cadastroCenso, $p1Cadastro, $p1Entrada, $p1Status, $p1Just, 
                             $p1AtualiStatus, $p1Saida, $p2Cadastro, $p2Entrada, $p2Status, $p2Just, $p2AtualiStatus, $p2Saida, $p3Cadastro,
                             $p3Entrada, $p3Status, $p3Just, $p3AtualiStatus, $p3Saida);
    $result = array_merge($modelo, $colunas);
    $censoCadastrado = new Censos($result);
    $censoCadastrado->insert();
}


// Adicionar ano de exercicio, creci, nome do corretor,
echo 'Tudo certo! :)';
