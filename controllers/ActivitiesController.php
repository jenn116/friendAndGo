
<?php

class ActivitiesController extends Controller {

    public function getDetails($urlParams) {
        if (isset($urlParams["query"]["id"])) {
            $id = $urlParams["query"]["id"];
            $Activity = new ActivityModel();
            $Activity->hydrate($id);
            
            echo $this->render_view('testVariables', 'Test Variables', [ "activity" => $Activity ], "layouts/dev");
        }

        echo $this->render_view('testVariables', 'Test Variables', [ ], "layouts/dev");
    }

    public function getList($urlParams) {
        $Activity = new ActivityModel();
        $Activities = $Activity->findAll();
        
        echo $this->render_view('testVariables', 'Test Variables', [ "activities" => $Activities ], "layouts/dev");
    }

    public function postEdit($urlParams, $post) {
        if (isset($post["id"])) {
            $id = $post["id"];
            $Activity = new ActivityModel();
            $Activity->hydrate($id);
    
            foreach($post as $colonne => $value) {
                if ($colonne !== "id") {
                    $setter = "set" . ucfirst($colonne);
                    $Activity->{$setter}($value);
                }
            }
            
            echo $this->render_view('testVariables', 'Test Variables', [ "activity" => $Activity ], "layouts/dev");
        }

        echo $this->render_view('testVariables', 'Test Variables', [ "activity" => $Activity ], "layouts/dev");
    }

}