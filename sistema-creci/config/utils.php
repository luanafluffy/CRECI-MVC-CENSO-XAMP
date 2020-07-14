<?php

function addSuccessMsg($msg) {
    $_SESSION['message'] = [
        'type' => 'success',
        'message' => 'Cadastro realizado com sucesso!'
    ];
}

function addErrorMsg($msg) {
    $_SESSION['message'] = [
        'type' => 'error',
        'message' => $msg
    ];
}