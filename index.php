<?php
// require de la config
require(__DIR__  . DIRECTORY_SEPARATOR . "conf" . DIRECTORY_SEPARATOR  . "config.php");

// require des class
require(__DIR__ . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR  . "Base.php");
require(__DIR__ . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR  . "Router.php");
require(__DIR__ . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR  . "Controller.php");
require(__DIR__ . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR  . "Model.php");

// require des models
require(__DIR__  . DIRECTORY_SEPARATOR . "models" . DIRECTORY_SEPARATOR  . "UserModel.php");

// require des controllers
require(__DIR__  . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR  . "PagesController.php");
require(__DIR__  . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR  . "UsersController.php");

// require des vendors
require(__DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR  . "mustachePHP" . DIRECTORY_SEPARATOR  . "bin" . DIRECTORY_SEPARATOR  . "build_bootstrap.php");

// on se connecte a la base de donnée
$database = new Base();
$db = $database->getInstance();

// on déclare les routes et on défini quel méthode de quel controller utilisé
Router::get('/', function($urlParam) {
    $pages = new PagesController();
    $pages->index($urlParam);
});

Router::get('/accueil', function($urlParam) {
    $pages = new PagesController();
    $pages->index($urlParam);
});


// module users
Router::get('/users/list', function($urlParam) {
    $users = new UsersController();
    $users->getList($urlParam);
});

Router::post('/users/edit', function($urlParam, $post) {
    $users = new UsersController();
    $users->postEdit($urlParam, $post);
});