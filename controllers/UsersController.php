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
        if (isset($post["email"])
            && isset($post["password"])
            && isset($post["password1"])
            && isset($post["lastname"])
            && isset($post["firstname"])
            && isset($post["age"])
            && isset($post["gender"])
        ) {

            if ($post["password"] === $post["password1"]) {
                unset($post["password1"]);
                $user = new UserModel($post);
                if ($user->create()) {
                    // deuxieme mot de passe different
                    header("Location: /connexion"); 
                } else {
                    // deuxieme mot de passe different
                    header("Location: /inscription?erreur=users deja inscrit"); 
                }
            } else {
                // deuxieme mot de passe different
                header("Location: /inscription?erreur=les deux mots de passe sont différent"); 
            }
        } else {
            // formulaire incomplet
            header("Location: /inscription?erreur=formulaire incomplet");
        }
    }

    public function postConnect($urlParams, $post) {
        if (isset($post["email"]) && isset($post["password"])) {
            $email = $post["email"];
            $password = $post["password"];
            $user = new UserModel();
            $user = $user->findOneBy("email", $email);

            if ($user !== false) {
                if ($password === $user->password) {
                    // user connecté
                    $_SESSION["user"] = $user;
                    header("Location: /events");
                } else {
                    // mot de passe faux
                    header("Location: /connexion?erreur=mot de passe inconnue");
                }
            } else {
                // email inconnnue
                header("Location: /connexion?erreur=email inconnue");
            }
        } else {
            // requete invalide
            header("Location: /connexion?erreur=information invalide");
        }
    }

    public function getDeconnect($urlParams) {
        session_destroy();
        header("Location: /accueil");
    }

}