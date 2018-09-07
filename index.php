<?php
require(__DIR__  . DIRECTORY_SEPARATOR  . "conf" . DIRECTORY_SEPARATOR  . "config.php");

// on initialise l'object User
$user = new User($database);
$MyUser = $user->findById(1);

// on recupère les informations sur un user (on hydrate le user)
$user->hydrate(1);

$te = new Template_Engine();

$te->render_view('accueil', [
    'page_title' => 'Accueil',
    'test' => 'hello <ordl'
]);