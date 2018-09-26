<?php

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

}