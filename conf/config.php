<?php

// Définition des constantes
define("DB_HOST", "localhost");
define("DB_NAME", "friend_and_go-dev");
define("DB_USER", "root");
define("DB_PASS", "");

// require des class
require(__DIR__ . DIRECTORY_SEPARATOR  . ".."  . DIRECTORY_SEPARATOR  . "class" . DIRECTORY_SEPARATOR  . "Base.class.php");
require(__DIR__  . DIRECTORY_SEPARATOR  . ".." . DIRECTORY_SEPARATOR  . "class" . DIRECTORY_SEPARATOR  . "User.class.php");

// on se connecte a la base de donnée
$database = new Base(DB_NAME, DB_USER, DB_PASS, DB_HOST);

// on stocke l'instance
$db = $database->getInstance();