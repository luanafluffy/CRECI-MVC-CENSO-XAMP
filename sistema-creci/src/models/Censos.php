<?php

class Censos extends Model {
    protected static $tableName = 'dbo.censos';
    protected static $columns = [
        "id",
        "ano_exerc",
        "creci_numero",
        "inicio_censo",
        "nome_corretor",
        "cadastro_censo",
        "p1_entrada",
        "p1_cadastro",
        "p1_status",
        "p1_just",
        "p1_atuali_status",
        "p1_saida",
        "p2_cadastro",
        "p2_entrada",
        "p2_status",
        "p2_just",
        "p2_atuali_status",
        "p2_saida",
        "p3_cadastro",
        "p3_entrada",
        "p3_status",
        "p3_just",
        "p3_atuali_status",
        "p3_saida",  
    ];

    //Filtrar dados usados no formulário para consulta/cadastro
    public static function loadConsultaCenso($creciNumero, $anoExerc) {
        $registros = self::getOne(['creci_numero'=>$creciNumero,'ano_exerc'=>$anoExerc]);
        // Caso não encontrado
        if(!$registros) {
            $registros = new Censos([
                //OBS.: Olhar no Banco de dados do corretor se existe
                'creci_numero' => $creciNumero,
                'ano_exerc' => $anoExerc,
                // se não existe lá, informar usuário da inexistência do censo
            ]);
        }
        return $registros;
    }

    // Fazer o controle de etapas de registros (consulta, financeiro, manufatura e entrega)
    private function botaoAcionado($botao) {
        if($botao === "Atualizar Status 1"){
            return "p1_";
        } elseif($botao === "Atualizar Status 2"){
            return "p2_";
        } elseif($botao === "Atualizar Status 3"){
            return "p3_";
        } else {
            return null;
        }
    }

    // Atualizando os dados da lista retornada do banco de dados
    private function atualizarDado($registroBD, $prefix, $nome_usuario, $entrada, $status, $just, $atuali_status, $saida) {
        
        if($prefix == 'p1_' or $prefix == 'p2_' or $prefix == 'p3_') {
            //  Concatenando chaves
            $p_cadastro = $prefix . 'cadastro';
            $p_entrada = $prefix . 'entrada';
            $p_status = $prefix . 'status';
            $p_just = $prefix . 'just';
            $p_atuali_status = $prefix . 'atuali_status';
            $p_saida = $prefix .'saida';

            // Mudando os valores com as chaves
            $registroBD = [
                $this->$p_cadastro = $nome_usuario, 
                $this->$p_entrada = $entrada, //data atual não pode ser aqui, 
                $this->$p_status = $status, 
                $this->$p_just = $just, 
                $this->$p_atuali_status = $atuali_status, 
                $this->$p_saida = $saida,
        ];
        } else {// Ativar cadastro de censo
            echo 'Cadastrando censo aqui...';
            $registroBD = [
                $this->inicio_censo = date('d/m/Y'),
                $this->cadastro_censo = $nome_usuario,
            ];
        }   
        echo '<br>';
        var_dump($this);
        echo '<br>';
        echo '<br>';
        return $registroBD;
    }

    //Registrar/Atualizar e Retornar dado de Censo
    public function registroCenso($registroBD, $botao, $nome_usuario, $entrada, $status, $just, $atuali_status, $saida) {
        
        $prefix = $this->botaoAcionado($botao);
        $registroAtualizado = $this->atualizarDado($registroBD, $prefix, $nome_usuario, $entrada, $status, $just, $atuali_status, $saida);
        
        if($prefix == 'p1_' && $registroAtualizado['p1_cadastro']) {
            // Se tiver um cadastro de censo, avisar ao usuário
            throw new AppException("Censo já tem cadastrado este status 1!");    
        } elseif($prefix == 'p2_' && $registroAtualizado['p2_cadastro']) {
            // Se tiver um cadastro de censo, avisar ao usuário
            throw new AppException("Censo já tem cadastrado este status 2!");    
        } elseif($prefix == 'p3_' && $registroAtualizado['p3_cadastro']) {
            // Se tiver um cadastro de censo, avisar ao usuário
            throw new AppException("Censo já tem cadastrado este status 3!");    
        }

        $this->$registroAtualizado;

        if($this->id) {
            echo 'Atualizando...';
            $this->update();
        }else {
            echo 'Inserindo...';
            $this->insert();
        }
      
    }
}