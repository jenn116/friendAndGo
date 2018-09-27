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
                if ($colonne !== "id" && $colonne !== "users") {
                    $setter = "set" . ucfirst($colonne);
                    $Event->{$setter}($value);
                } else if ($colonne == "users") {
                    $eventUsers = explode(" ", $value);
                    foreach($eventUsers as $eventUser) {
                        $user = new UserModel();
                        $eventUser = $user->findOneBy("email", $eventUser);
                        if ($eventUser !== false) {
                            Base::getInstance()->query("INSERT INTO users_events (user_id, event_id) VALUES ('{$eventUser->id}', '{$newEventId}')");
                        }
                    }
                }
            }
            
            echo $this->render_view('testVariables', 'Test Variables', [ "activity" => $Event ], "layouts/dev");
        }

        echo $this->render_view('testVariables', 'Test Variables', [ "activity" => $Event ], "layouts/dev");
    }

    public function postCreate($urlParams, $post) {
        if (isset($post["name"])
            && isset($post["event_type"])
            && isset($post["date_start"])
        ) {
            $eventUsers = $post["users"];
            unset($post["users"]);
            $event = new EventModel($post);
            if ($event->create($eventUsers)) {
                // deuxieme mot de passe different
                header("Location: /events");
            } else {
                // deuxieme mot de passe different
                header("Location: /events?erreur=erreur inconnue"); 
            }
        } else {
            // formulaire incomplet
            header("Location: /events?erreur=formulaire incomplet");
        }
    }
}