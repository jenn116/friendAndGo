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
require(__DIR__  . DIRECTORY_SEPARATOR . "models" . DIRECTORY_SEPARATOR  . "EventModel.php");
require(__DIR__  . DIRECTORY_SEPARATOR . "models" . DIRECTORY_SEPARATOR  . "ActivityModel.php");
require(__DIR__  . DIRECTORY_SEPARATOR . "models" . DIRECTORY_SEPARATOR  . "DepenseModel.php");

// require des controllers
require(__DIR__  . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR  . "PagesController.php");
require(__DIR__  . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR  . "UsersController.php");
require(__DIR__  . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR  . "EventsController.php");
require(__DIR__  . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR  . "ActivitiesController.php");
require(__DIR__  . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR  . "DepensesController.php");

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

Router::get('/connexion', function($urlParam) {
    $pages = new PagesController();
    $pages->connexion($urlParam);
});

Router::get('/inscription', function($urlParam) {
    $pages = new PagesController();
    $pages->inscription($urlParam);
});


// module users
Router::get('/users/details', function($urlParam) {
    $users = new UsersController();
    $users->getDetails($urlParam);
});

Router::get('/users/list', function($urlParam) {
    $users = new UsersController();
    $users->getList($urlParam);
});

Router::post('/users/connect', function($urlParam, $post) {
    $users = new UsersController();
    $users->postConnect($urlParam, $post);
});

Router::get('/users/deconnect', function($urlParam) {
    $users = new UsersController();
    $users->getDeconnect($urlParam);
});

Router::post('/users/create', function($urlParam, $post) {
    $users = new UsersController();
    $users->postCreate($urlParam, $post);
});

Router::post('/users/edit', function($urlParam, $post) {
    $users = new UsersController();
    $users->postEdit($urlParam, $post);
});

// module events
Router::get('/events/details', function($urlParam) {
    $events = new EventsController();
    $events->getDetails($urlParam);
});

Router::get('/events/list', function($urlParam) {
    $events = new EventsController();
    $events->getList($urlParam);
});

Router::post('/events/edit', function($urlParam, $post) {
    $events = new EventsController();
    $events->postEdit($urlParam, $post);
});

// module activities
Router::get('/activities/details', function($urlParam) {
    $activities = new ActivitiesController();
    $activities->getDetails($urlParam);
});

Router::get('/activities/list', function($urlParam) {
    $activities = new ActivitiesController();
    $activities->getList($urlParam);
});

Router::post('/activities/edit', function($urlParam, $post) {
    $activities = new ActivitiesController();
    $activities->postEdit($urlParam, $post);
});

// module depenses
Router::get('/depenses/details', function($urlParam) {
    $depenses = new DepensesController();
    $depenses->getDetails($urlParam);
});

Router::get('/depenses/list', function($urlParam) {
    $depenses = new DepensesController();
    $depenses->getList($urlParam);
});

Router::post('/depenses/edit', function($urlParam, $post) {
    $depenses = new DepensesController();
    $depenses->postEdit($urlParam, $post);
});