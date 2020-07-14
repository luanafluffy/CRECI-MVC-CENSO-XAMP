<main class="content">
    <?php
        renderTitle(
            'Controle de Censo',
            'Pesquise o corretor aqui!',
            'icon icofont-spreadsheet mr-2'
        );
        include(TEMPLATE_PATH . "/messages.php");
    ?>
 
    <form method="POST" action="../controller/controle_censo.php">
        <!-- Pesquisando dados -->
        <div>
            <label for="creciNumero">CRECI </label>
            <input type="number" name="creciNumero" id="creciNumero" value="<?= $registro->creci_numero ?? "abc" ?>"><br>
            <label for="anoExerc">Exercício </label>
            <input type="number" name="anoExerc" id="anoExerc" value="<?= $registro->ano_exerc ?? "abc" ?>"><br>
            <button >Pesquisar Corretor</button>
        </div><br><br>
    </form>

    <form method="POST" action="../controller/controller/status_censo.php" >
        <!-- Dados filtrados -->
        <input type="hidden" name="creciNumero" id="creciNumero" value="<?= $_POST['creciNumero'] ?? "" ?>">
        <input type="hidden" name="anoExerc" id="anoExerc" value="<?= $_POST['anoExerc'] ?? "" ?>">

        <!-- Resultado da pesquisa:  -->
        <div>
      
            <hr>
            <label>Nome do Corretor: <?= $registro->nome_corretor ?? "------" ?></label><br>
            <label for="inicioCenso">Inicio do Censo: </label>
            <input name="inicioCenso" value="<?= $registro->inicio_censo ?? "" ?>" placeholder="00/00/0000" type="text"><br>
            <label for="cadastroCenso">Cadastro Censo: <?= $registro->cadastro_censo ?? "------" ?></label><br>
            <input  name="botao" type="submit" value="Cadastrar Censo">
        </div><br><br>
    </form>
    <form method="POST" action="../controller/status_censo.php" >
        <div>
            <input type="hidden" name="creciNumero" id="creciNumero" value="<?= $_POST['creciNumero'] ?? "" ?>">
            <input type="hidden" name="anoExerc" id="anoExerc" value="<?= $_POST['anoExerc'] ?? "" ?>">

            <label for="cadastro">Cadastro: </label>
            <input name="cadastro" value="<?= $registro->p1_cadastro ?? "" ?>" placeholder="" type="text"><br>
            <label for="entrada">Entrada: </label>
            <input name="entrada" value="<?= $registro->p1_entrada ?? "" ?>" placeholder="00/00/0000" type="text"><br>
            <label for="status">Status: </label>
            <input name="status" value="<?= $registro->p1_status ?? "" ?>" placeholder="" type="text"><br>
            <label for="just">Justificativa: </label>
            <input name="just" value="<?= $registro->p1_just ?? "" ?>" placeholder="" type="text"><br>
            <label for="atuali_status">Atualizar status: </label>
            <input name="atuali_status" value="<?= $registro->p1_atuali_status ?? "" ?>" placeholder="" type="text"><br>
            <label for="saida">Saída: </label>
            <input name="saida" value="<?= $registro->p1_saida ?? "" ?>" placeholder="00/00/0000" type="text"><br>
            <a href="../controller/status_censo.php"><input type="submit" name="botao" value="Atualizar Status 1"></a>
        </div>
    </form>
</main>