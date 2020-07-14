<?php
require_once(dirname(__FILE__, 2) . '/config/config.php');

//Falta adicionar registro de saída do usuário no banco de dados
session_start();
session_destroy();
header('Location: /sistema-creci/controller/login.php');