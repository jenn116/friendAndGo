<?php

class Base {

    private static $instance;
    
    public static function getInstance() {
        if(self::$instance === null) {
            $instance = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';port=' . DB_PORT, DB_USER, DB_PASS);
            self::$instance = $instance;
        }
        
        return self::$instance;
    }
    
    public static function query($statement) {
        return self::getInstance()->query($statement);
    }
    
}