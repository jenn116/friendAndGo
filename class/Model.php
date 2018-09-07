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

        return true;
    }

    /**
     * retourne toute les entrée de la table
     *
     * @return Array
     */
    public function findAll() {
        return $this->_db->getInstance()->query("SELECT * FROM {$this->_table}")->fetchArray();
    }

    /**
     * Retourne l'entrée de la table avec l'id passé en paramètre
     *
     * @param [integer] $id
     * @return Object
     */
    public function findById($id) {
        return $this->_db->getInstance()->query("SELECT * FROM {$this->_table} WHERE id='{$id}'")->fetchObject();
    }
    
}
