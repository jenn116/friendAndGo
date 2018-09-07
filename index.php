<?php
require(__DIR__  . DIRECTORY_SEPARATOR  . "conf" . DIRECTORY_SEPARATOR  . "config.php");

// on initialise l'object User
$user = new User($database);
$MyUser = $user->findById(1);

// on recupère les informations sur un user (on hydrate le user)
$user->hydrate(1);

$m = new Mustache_Engine;
echo $m->render('<div>Hello {{planet}}</div>', array('planet' => 'World!')); // "Hello World!"
