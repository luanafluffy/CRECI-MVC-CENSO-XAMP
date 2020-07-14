<?php
class User Extends Model {
    protected static $tableName = 'dbo.usuarios';
    protected static $columns = [
        "id",	
        "nome_usuario",	
        "nome_completo",
        "setor",
        "senha",
        "ultimo_logout_hora",
        "ultimo_logout_data",
        "ultimo_login_hora",
        "ultimo_login_data",
        "status_OnOff",
        "e_Admin",
    ];
}