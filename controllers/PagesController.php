<?php

class PagesController extends Controller {

    public function index() {
        echo $this->render_view('pages/accueil', 'Accueil', []);
    }

}