<?php

//Falta adicionar registro de saída do usuário no banco de dados
session_start();
session_destroy();
header('Location: login.php');