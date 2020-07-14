<?php
class Login Extends Model {
    
    public function validate() {
        //saber se o campo está preenchido
        $errors = [];

        if(!$this->nome_usuario) {
            $errors['nome_usuario'] = 'Nome de usuário é um campo obrigatório.';
        }
        if(!$this->senha) {
            $errors['senha'] = 'Por favor, informe a senha.';
        }
        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }

    public function checkLogin() {
        $this->validate();
        $user = User::getOne(['nome_usuario' => $this->nome_usuario]);
        if($user) {
            if(password_verify($this->senha, $user->senha)) {
                /* Informar o usuário se ele já está logado
                if($user->status_OnOff == 0){
                    throw new AppException('Usuário já está logado em outro navegador/dispositivo.'); 
                }*/
                return $user;
            }
        }
        throw new AppException('Usuário e Senha inválidos');
    }
    public function deslogUser() {
        $this->$_SESSION['user'];
        
    }
   
}