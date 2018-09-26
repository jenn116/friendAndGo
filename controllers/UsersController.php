<?php
session_start();

class UsersController extends Controller {

    public function getDetails($urlParams) {
        if (isset($urlParams["query"]["id"])) {
            $id = $urlParams["query"]["id"];
            $user = new UserModel();
            $user->hydrate($id);
            
            echo $this->render_view('testVariables', 'Test Variables', [ "user" => $user ], "layouts/dev");
        }

        echo $this->render_view('testVariables', 'Test Variables', [ ], "layouts/dev");
    }

    public function getList($urlParams) {
        $user = new UserModel();
        $users = $user->findAll();
        
        echo $this->render_view('testVariables', 'Test Variables', [ "users" => $users ], "layouts/dev");
    }

    public function postEdit($urlParams, $post) {
        if (isset($post["id"])) {
            $id = $post["id"];
            $user = new UserModel();
            $user->hydrate($id);
    
            foreach($post as $colonne => $value) {
                if ($colonne !== "id") {
                    $setter = "set" . ucfirst($colonne);
                    $user->{$setter}($value);
                }
            }
            
            echo $this->render_view('testVariables', 'Test Variables', [ "user" => $user ], "layouts/dev");
        }

        echo $this->render_view('testVariables', 'Test Variables', [ "user" => $user ], "layouts/dev");
    }

    public function postCreate($urlParams, $post) { // a finir
        $user = new UserModel($post);
        $user->hydrate($id);
    
        foreach($post as $colonne => $value) {
            if ($colonne !== "id") {
                $setter = "set" . ucfirst($colonne);
                $user->{$setter}($value);
            }
        }

        echo $this->render_view('testVariables', 'Test Variables', [ "user" => $user ], "layouts/dev");
    }

    public function postConnect($urlParams, $post) {
        if (isset($post["email"]) && isset($post["password"])) {
            $email = $post["email"];
            $password = $post["password"];
            $user = new UserModel();
            $user = $user->findOneBy("email", $email);
            
            if ($user !== false) {
                if ($password === $user->password) {
                    $_SESSION["user"] = $user;
                    header("Location: /events");
                    // user connecté
                }
                header("Location: /connexion?erreur=\"mot de passe inconnue\"");
                // mot de passe faux
            }
            header("Location: /connexion?erreur=\"email inconnue\"");
            // email inconnnue
        }
        header("Location: /connexion?erreur=\"information invalide\"");
        // requete invalide
    }

    public function getDeconnect($urlParams) {
        session_destroy();
        header("Location: /connexion?erreur=\"information invalide\"");
    }

}