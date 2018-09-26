<?php

class UsersController extends Controller {

    public function users() {
        $user = new UserModel();
        $user->hydrate(1);
        
        echo $this->render_view('testVariables', 'Test Variables', $user, "layouts/dev");
    }

}