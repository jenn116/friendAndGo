<?php

// Définition des constantes
define("DB_HOST", "localhost");
define("DB_PORT", "8889");
define("DB_NAME", "friend_and_go-dev");
define("DB_USER", "jenTest");
define("DB_PASS", "test");

// require des class
require(__DIR__ . DIRECTORY_SEPARATOR  . ".."  . DIRECTORY_SEPARATOR  . "class" . DIRECTORY_SEPARATOR  . "Base.php");
require(__DIR__  . DIRECTORY_SEPARATOR  . ".." . DIRECTORY_SEPARATOR  . "models" . DIRECTORY_SEPARATOR  . "UserModel.php");

// on se connecte a la base de donnée
$database = new Base(DB_NAME, DB_USER, DB_PASS, DB_HOST, DB_PORT);

// on stocke l'instance
$db = $database->getInstance();