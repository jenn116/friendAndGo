<?php

class EventsController extends Controller {

    public function getDetails($urlParams) {
        if (isset($urlParams["query"]["id"])) {
            $id = $urlParams["query"]["id"];
            $Event = new EventModel();
            $Event->hydrate($id);
            
            echo $this->render_view('testVariables', 'Test Variables', [ "activity" => $Event ], "layouts/dev");
        }

        echo $this->render_view('testVariables', 'Test Variables', [ ], "layouts/dev");
    }

    public function getList($urlParams) {
        $Event = new EventModel();
        $Events = $Event->findAll();
        
        echo $this->render_view('testVariables', 'Test Variables', [ "activities" => $Events ], "layouts/dev");
    }

    public function postEdit($urlParams, $post) {
        if (isset($post["id"])) {
            $id = $post["id"];
            $Event = new EventModel();
            $Event->hydrate($id);
    
            foreach($post as $colonne => $value) {
                if ($colonne !== "id") {
                    $setter = "set" . ucfirst($colonne);
                    $Event->{$setter}($value);
                }
            }
            
            echo $this->render_view('testVariables', 'Test Variables', [ "activity" => $Event ], "layouts/dev");
        }

        echo $this->render_view('testVariables', 'Test Variables', [ "activity" => $Event ], "layouts/dev");
    }

}