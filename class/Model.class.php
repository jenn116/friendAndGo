<?php

abstract class Model {

    protected $_db; // la base de donnees
    protected $_table; // la table dans la base
    
    public function __construct($db) {
        $this->_db = $db;
        $this->init();
    }
    
    /**
     * update la valeur d'un champs
     * @param string $param nom de la colonne
     * @param string | int $value valeur
     * @param string | int $close SQL string : WHERE CLOSE
     */
    private function updateParam($param, $value, $close) {
        // on ne peut pas modifier l'id
        if ($param == 'id') { return false; }
        
        if(is_string($value)) {
            $this->_db->getInstance()->query("UPDATE {$this->_table} SET {$param}='{$value}' WHERE {$close}");
        } else if (is_int($value)) {
            $this->_db->getInstance()->query("UPDATE {$this->_table} SET {$param}={$value} WHERE {$close}");
        } else {
            $this->_db->getInstance()->query("UPDATE {$this->_table} SET {$param}=NULL WHERE {$close}");
        }
    }
    
}
