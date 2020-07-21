<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/assets/css/comum.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/icofont.min.css">
    <link rel="stylesheet" href="public/assets/css/template.css">
    <title>:: Sistema CRECI-SE</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <span class="font-weight-light">Sistema</span>
            <span class="font-weight-bold">&nbsp;CRECI-SE</span>
        </div>
        <div class="menu-toggle mx-3">
            <i class="icofont-navigation-menu ml-1"></i>
            <!-- <span>MENU</span> -->
        </div>
        <div class="">
            <span class="user-data ml-3">
                <?= $_SESSION['user']->nome_completo ?? "" ?>
            </span>|
            <span class="user-data ml-3">
                <?php
                $setor = $_SESSION['user']->setor ?? "";
                echo "Setor: ${setor}";
                ?>
            </span>|
            <span class="user-data ml-3">
                <?php
                $dia_logado = $_SESSION['user']->ultimo_logout_data ?? "";
                $hora_logado = $_SESSION['user']->ultimo_logout_hora ?? "";
                echo "Seu último acesso foi dia ${dia_logado} às ${hora_logado} horas.";
                ?>
            </span>
        </div>
        <div class="spacer"></div>
            <div class="dropdown">
                <div class="dropdown-button ml-3">    
                    <span>Meu Perfil</span>
                    <i class="icofont-simple-down mx-2"></i>
                </div>
                
                <div class="dropdown-content">
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="logout.php">
                                <i class="icofont-logout mr-2"></i>
                                Sair
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#">
                                <i class="icofont-user mr-2"></i>
                                Meus dados
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>