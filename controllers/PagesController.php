<?php

class PagesController extends Controller {

    public function index($urlParam) {
        $data = [];
        if (isset($urlParam['query']['erreur'])) { $data["erreur"] = $urlParam['query']['erreur']; }
        if (isset($_SESSION["user"])) { $data["currentUser"] = $_SESSION["user"]; }

        echo $this->render_view('pages/accueil', 'Accueil', $data);
    }

    public function connexion($urlParam) {
        $data = [];
        if (isset($urlParam['query']['erreur'])) { $data["erreur"] = $urlParam['query']['erreur']; }

        if (isset($_SESSION["user"])) {
            header("Location: /events");
        } else {
            echo $this->render_view('pages/connexion', 'Accueil', $data);
        }
    }

    public function inscription($urlParam) {
        $data = [];
        if (isset($urlParam['query']['erreur'])) { $data["erreur"] = $urlParam['query']['erreur']; }
        if (isset($_SESSION["user"])) { $data["currentUser"] = $_SESSION["user"]; }

        echo $this->render_view('pages/inscription', 'Accueil', $data);
    }

    public function activity($urlParam) {
        $data = [];
        if (isset($urlParam['query']['erreur'])) { $data["erreur"] = $urlParam['query']['erreur']; }
        if (isset($_SESSION["user"])) { $data["currentUser"] = $_SESSION["user"]; }
        
        echo $this->render_view('pages/activity', 'Accueil', $data);
    }

}