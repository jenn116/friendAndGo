<?php
require(__DIR__  . DIRECTORY_SEPARATOR  . "conf" . DIRECTORY_SEPARATOR  . "config.php");

// on déclare les routes et on défini quel méthode de quel controller utilisé
Router::get('/accueil', function(){
    $accueil = new AccueilController();
    $accueil->index();
});