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

    
    
    
    private function atualizarDado($registroBD, $botao, $nome_usuario, $entrada, $status, $just, $atuali_status, $saida) {
        // Fazer o controle de etapas de registros (consulta, financeiro, manufatura e entrega)
        // Atualizando os dados da lista retornada do banco de dados

        if($botao === "Atualizar Status 1") {
            // Mudando os valores do objeto
            $this->p1_cadastro = $nome_usuario; 
            $this->p1_entrada = $entrada; //data atual não pode ser aqui; 
            $this->p1_status = $status; 
            $this->p1_just = $just; 
            $this->p1_atuali_status = $atuali_status; 
            $this->p1_saida = $saida;
            return true;
        } 
        elseif($botao === "Atualizar Status 2") {
            // Mudando os valores do objeto
            $this->p2_cadastro = $nome_usuario; 
            $this->p2_entrada = $entrada; //data atual não pode ser aqui; 
            $this->p2_status = $status; 
            $this->p2_just = $just; 
            $this->p2_atuali_status = $atuali_status; 
            $this->p2_saida = $saida; // Ativar cadastro de censo
            return true;
        }
        elseif($botao === "Atualizar Status 3") {
            // Mudando os valores do objeto
            $this->p3_cadastro = $nome_usuario; 
            $this->p3_entrada = $entrada; //data atual não pode ser aqui; 
            $this->p3_status = $status; 
            $this->p3_just = $just; 
            $this->p3_atuali_status = $atuali_status; 
            $this->p3_saida = $saida;
            return true;
        }
        elseif ($botao === 'Cadastrar Censo') {
            echo 'Cadastrando censo aqui...';
            $this->inicio_censo = $entrada; //data atual não pode ser aqui; 
            $this->cadastro_censo = $nome_usuario;
            return true;
        }  else {
            return false;
        }
    }

    //Registrar/Atualizar e Retornar dado de Censo
    public function registroCenso($registroBD, $botao, $nome_usuario, $entrada, $status, $just, $atuali_status, $saida) {
        
     
        $registroAtualizado = $this->atualizarDado($registroBD, $botao, $nome_usuario, $entrada, $status, $just, $atuali_status, $saida);
        
        if(!$registroAtualizado) {
            // Se tiver um cadastro de censo, avisar ao usuário
            throw new AppException("Censo já tem cadastrado este status !");    
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