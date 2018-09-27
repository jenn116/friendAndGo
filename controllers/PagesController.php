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
            echo $this->render_view('pages/connexion', 'Connexion', $data);
        }
    }

    public function inscription($urlParam) {
        $data = [];
        if (isset($urlParam['query']['erreur'])) { $data["erreur"] = $urlParam['query']['erreur']; }
        if (isset($_SESSION["user"])) { $data["currentUser"] = $_SESSION["user"]; }

        echo $this->render_view('pages/inscription', 'Inscription', $data);
    }

    public function events($urlParam) {
        $data = [];
        if (isset($urlParam['query']['erreur'])) { $data["erreur"] = $urlParam['query']['erreur']; }
        if (isset($_SESSION["user"])) { $data["currentUser"] = $_SESSION["user"]; }

        $userEvents = Base::query("SELECT * FROM events INNER JOIN users_events on events.id = users_events.event_id WHERE users_events.user_id = {$_SESSION['user']->id}")->fetchAll(PDO::FETCH_ASSOC);

        $openedEvents = [];
        $closedEvents = [];
        foreach($userEvents as $i => $event) {
            if (strtotime($event["date_end"]) > time()) {
                $openedEvents[] = $event;
            } else {
                $closedEvents[] = $event;
            }
        }
        $data = [
            "openedEvents" => $openedEvents,
            "closedEvents" => $closedEvents
        ];
        echo $this->render_view('pages/events', 'Events', $data);
    }

    public function activities($urlParam) {
        $data = [];

        if (isset($urlParam['query']['event_id'])) {
            if (isset($urlParam['query']['erreur'])) { $data["erreur"] = $urlParam['query']['erreur']; }
            if (isset($_SESSION["user"])) { $data["currentUser"] = $_SESSION["user"]; }
            $event = new EventModel();
            $event->hydrate($urlParam['query']['event_id']);

            $activity = new ActivityModel();
            $eventActivities = $activity->findBy("event_id={$event->getId()}");

            $data = [
                "event"         => $event,
                "activities"    => $eventActivities
            ];

            echo $this->render_view('pages/activities', 'Activities', $data);
        } else {
            echo $this->render_view('pages/activities', 'Activities', $data);
        }
    }

}