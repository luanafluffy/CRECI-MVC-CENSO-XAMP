<?php

class Database {
    //função para realizar uma conexão com o banco de dados SQLServer
    public static function getConnection() {
        $envPath = realpath(dirname(__FILE__) . '/../env.ini');
        $env = parse_ini_file($envPath);
        $conn = 'DRIVER={SQL Server};SERVER='. $env['host'] . ';DATABASE=' . $env['database'];
        $conn = odbc_connect($conn, $env['username'], $env['password']);

        if (odbc_error()){  
            die("ODBC Erro: " . odbc_errormsg($conn));
        }
        return $conn;
    }

    // Consultar BD
    public static function getResultFromQuery($sql) {
        $conn = self::getConnection();
        $result = odbc_exec($conn, $sql);
        return $result;
    }

    public static function executeSQL($sql) {
        $conn = self::getConnection();
        $result = odbc_exec($conn, $sql);
        if(!$result) {
            throw new Exception(odbc_errormsg($conn));
        }
        $id = $result;
        // odbc_close($conn);
        return $id;
    }
}