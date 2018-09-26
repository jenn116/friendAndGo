<?php

abstract class Model {

    protected $table; // la table dans la base
    
    public function __construct($data = NULL) {
        $this->init();
        if ($data !== NULL) {
            foreach($data as $colonne => $valeur) {
                $this->{$colonne} = $valeur;
            }
        }
    }
    
    /**
     * update la valeur d'un champs
     * @param string $param nom de la colonne
     * @param string | int $value valeur
     * @param string | int $close SQL string : WHERE CLOSE
     */
    protected function updateParam($param, $value, $close) {
        // on ne peut pas modifier l'id
        if ($param == 'id') { return false; }
        
        if(is_string($value)) {
            Base::getInstance()->query("UPDATE {$this->table} SET {$param}='{$value}' WHERE {$close}");
        } else if (is_int($value)) {
            Base::getInstance()->query("UPDATE {$this->table} SET {$param}={$value} WHERE {$close}");
        } else {
            Base::getInstance()->query("UPDATE {$this->table} SET {$param}=NULL WHERE {$close}");
        }

        return true;
    }

    /**
     * retourne toute les entrée de la table
     *
     * @return Array
     */
    public function findAll() {
        $model = ucfirst(substr($this->table, 0, -1)) . "Model";
        return Base::getInstance()->query("SELECT * FROM {$this->table}")->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $model);
    }

    /**
     * Retourne l'entrée de la table avec l'id passé en paramètre
     *
     * @param Integer $id
     * @return Object
     */
    public function findById($id) {
        return Base::getInstance()->query("SELECT * FROM {$this->table} WHERE id={$id}")->fetchObject();
    }

    /**
     * Retourne l'entrée de la table avec la valeur de la colonne passé en param
     *
     * @param String $colonne
     * @param String|Integer|Boolean $value
     * @return Object
     */
    public function findOneBy($colonne, $value) {
        return Base::getInstance()->query("SELECT * FROM {$this->table} WHERE {$colonne}={$id} LIMIT 1")->fetchObject();
    }

    /**
     * Retourne l'entrée de la table avec la valeur de la colonne passé en param
     *
     * @param String $condition
     * @return Array
     */
    public function findBy($condition, $jointure = "") {
        return Base::getInstance()->query("SELECT * FROM {$this->table} {$jointure} WHERE $condition")->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $model);
    }
    
}
