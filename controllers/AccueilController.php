<?php
// require des class nécéssaires
require(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR . "Controller.php");

class AccueilController extends Controller {

    public function index() {
        echo $this->render_view('accueil', 'Accueil', []);
    }

}