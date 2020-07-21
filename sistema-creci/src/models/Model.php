<?php
// Classe que facilita e assegura o acesso ao Banco de Dados
// Permite a utilização dos métodos mágicos

class Model  {
    protected static $tableName = "";
    protected static $columns = [];
    protected $values = [];

    function __construct($arr) {
        $this->loadFromArray($arr);
    }

    public function loadFromArray($arr) {
        if($arr) {
            foreach($arr as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function __get($key) {
        return $this->values[$key] ?? "";
    }

    public function __set($key, $value) {
        $this->values[$key] = $value ?? "";
    }

    public static function getOne($filters = [],  $columns = '*') {
        $class = get_called_class(); //informa classe usada
        $result = static::getResultSetFromSelect($filters, $columns);
        return $result ? new $class(odbc_fetch_array($result)) : null ;
    }
    
    public static function get($filters = [],  $columns = '*') {
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $columns);
        if($result) {
            $class = get_called_class(); //informa classe usada

            //Chamando o objeto da classe criada anteriormente
            while($row = odbc_fetch_array($result)){
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }
    
    public static function getResultSetFromSelect($filters = [], $columns = '*') {
        /*  Função para consultar BD com parametros personalizados
            Columns -> colunas para realizar a consulta
            Filters -> filtros (where) para condicionar a consulta */

        $sql = "SELECT ${columns} FROM ".static::$tableName.static::getFilters($filters);
        $result = Database::getResultFromQuery($sql);
        if(odbc_num_rows($result) == 0) {
            return null;
        } else {
            return $result;
        }
    }

    public function insert() {
        $sql = "INSERT INTO " . static::$tableName . " ("
            . implode(",", static::$columns) . ") VALUES (";
            foreach(static::$columns as $col) {
                $sql .= static::getFormatedValue($this->$col) . ",";
            }
            $sql[strlen($sql) - 1] = ')'; //substituindo o ultimo caractere
            $id = Database::executeSQL($sql);
            $this->id = $id;
    }

    public function update() {
        $sql = "UPDATE " . static::$tableName . " SET ";
        foreach(static::$columns as $col) {
            $sql .= " ${col} = " . static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql) - 1] = ' '; //substituindo o ultimo caractere
        $sql .= "WHERE id = {$this->id}";
        // var_dump($sql);
        Database::executeSQL($sql); 
       
    }

    private static function getFilters($filters) {
        $sql = '';
        if(count($filters) > 0) {
            $sql .= " WHERE 1 = 1";
            foreach($filters as $column => $value) {
                $sql .= " AND ${column} = " . static::getFormatedValue($value);
            }
        }
        // print_r($sql);
        return $sql;
    }

    // Formata o valor de acordo com o tipo, tratamento de dados para o BD
    private static function getFormatedValue($value) {
        if(is_null($value)) {
            return "null";
        } elseif(gettype($value) === 'string') {
            return "'${value}'";
        } else {
            return $value;
        }
    }
}