<?php

class UsersController extends Controller {

    public function getDetail($urlParam) {
        if (isset($urlParam["id"])) {
            $user = new UserModel();
            $user->hydrate($urlParam["id"]);
            
            echo $this->render_view('testVariables', 'Test Variables', [ "user" => $user ], "layouts/dev");
        }
        
        echo $this->render_view('testVariables', 'Test Variables', [ "user" => $user ], "layouts/dev");
    }

    public function getList($urlParam) {
        $user = new UserModel();
        $users = $user->findAll();
        
        echo $this->render_view('testVariables', 'Test Variables', [ "users" => $users ], "layouts/dev");
    }

    public function postEdit($urlParam, $post) {
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