<aside class="user-data">
    <div class="painel-user">
        <div class="bem-vindo-titulo">
            <h4>Bem vindo(a)!</h4>
        </div>
        <div class="bem-vindo-conteudo">
            <span><b>Nome:  <?= $user->nome_completo; ?></b>Administrador</span>
            <span><b>Setor:<?= $user->setor ?></b> TI</span><br>
            <span><b>Último login em </br>
                <?= $user->ultimo_logout_hora." às ".$user->ultimo_logout_data; ?>
            </span>
        </div>
    </div>
</aside>