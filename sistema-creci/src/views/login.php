<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/assets/css/comum.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/icofont.min.css">
    <link rel="stylesheet" href="public/assets/css/login.css">
    <title>Sistema CRECI-SE</title>
</head>
<body>
    
    <form class="form-login" action="#" method="post">
        <div class="card-header">
            <img class="img-brasao-login" src="public/assets/img/brasao2.png" width="300">
        </div>
        <div class="login-card card">
            <div class="card-header">
                <div class="logo">
                    <span class="font-weight-light">Sistema</span>
                    <span class="font-weight-bold">&nbsp;CRECI-SE</span>
                </div>
            </div>
            <div class="card-body">
                <?php include(TEMPLATE_PATH . '/messages.php') ?>
                <div class="form-group">
                    <label for="nome_usuario">Usuário</label>
                    <input type="nome_usuario" id="nome_usuario" name="nome_usuario" 
                        class="form-control <?= $errors['nome_usuario'] ? 'is-invalid' : '' ?>" 
                        value="<?= $nome_usuario ?? '' ?>" placeholder="Informe o nome do usuário" autofocus>
                    <div class="invalid-feedback">
                        <?= $errors['nome_usuario'] ?? "" ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" 
                        class="form-control <?= $errors['senha'] ? 'is-invalid' : '' ?>" 
                        placeholder="Informe a senha" autofocus>
                    <div class="invalid-feedback">
                        <?= $errors['senha'] ?? "" ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-lg btn-success">Entrar</button>
            </div>
        </div>
    </form>
</body>
</html>