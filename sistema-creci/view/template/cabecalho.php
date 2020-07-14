<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/comum.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/icofont.min.css">
    <link rel="stylesheet" href="../assets/css/template.css">
    <title>:: Sistema CRECI-SE</title>
</head>
<body>
    <header class="header">
        <div class="logo-primary">
            <div class="logo">
                <span class="font-weight-bold">Sistema CRECI-SE</span>
            </div>
        </div>
            <div class="menu-toggle mx-3">
                <i class="icofont-navigation-menu ml-1"></i>
                <span></span>
            </div>
        <div class="">
            <span class="user-data ml-3">
                <!-- Falta configurar utf-8 no banco em geral, usando função (por enquanto) -->
                <?= utf8_encode($_SESSION['usuario']->nome_completo) ?? "" ?>
            </span>|
            <span class="user-data ml-3">
                <?= 'Setor: ' . $_SESSION['usuario']->setor ?? "" ?>
            </span>|
            <span class="user-data ml-3">
            </span>
        </div>
        <div class="spacer"></div>
            <div class="dropdown">
                <div class="dropdown-button ml-3">    
                    <i class="icon-sair icofont-logout mx-2"></i>
                </div>
                
                <div class="dropdown-content">
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="/sistema-creci/controller/logout.php">
                                Sair
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>