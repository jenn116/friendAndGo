<?php

class PagesController extends Controller {

    public function index() {
        echo $this->render_view('pages/accueil', 'Accueil', []);
    }

    public function connexion() {
        echo $this->render_view('pages/connexion', 'Accueil', []);
    }

    public function inscription() {
        echo $this->render_view('pages/inscription', 'Accueil', []);
    }

    public function activity() {
        echo $this->render_view('pages/activity', 'Accueil', []);
    }

}