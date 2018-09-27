<?php

class EventModel extends Model {
    
    // les paramètres
    private $id;
    private $name;
    private $date_start;
    private $date_end;
    private $event_type;

    // les getters & setters
    public function getId(){
        return $this->id;
    }

    // name
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
        $this->updateParam("name", $name, "id={$this->id}");
    }

    // date
    public function getDate_start(){
        return $this->date_start;
    }
    public function setDate_start($date_start){
        $this->date_start = $date_start;
        $this->updateParam("date_start", $date_start, "id={$this->id}");
    }

    // date_end
    public function getDate_end(){
        return $this->date_end;
    }
    public function setDate_end($date_end){
        $this->date_end = $date_end;
        $this->updateParam("date_end", $date_end, "id={$this->id}");
    }

    // event_type
    public function getEvent_type(){
        return $this->event_type;
    }
    public function setEvent_type($event_type){
        $this->event_type = $event_type;
        $this->updateParam("event_type", $event_type, "id={$this->id}");
    }
    
    /**
     * initialise le model event
     */
    public function init() {
        $this->table = 'events';
    }
    
    /**
     * hydrate l'object depuis la bdd
     * @param integer $id id du activity a recuperer depuis la bdd
     */
    public function hydrate($id) {
        $data = $this->findById($id);
        
        $this->id = $id;
        $this->name = $data->name;
        $this->date_end = $data->date_end;
        $this->event_type = $data->event_type;
    }

    /**
     * creer une nouvelle entité dans la base
     * @return Boolean
     */
    public function create() {
        $newEventRequest = Base::getInstance()->query("INSERT INTO {$this->table} (name, event_type, date_start, date_end) VALUES ('{$this->name}', '{$this->event_type}', '{$this->date_start}', '{$this->date_end}')");
        $newEventId = Base::getInstance()->lastInsertId();
        Base::getInstance()->query("INSERT INTO users_events (user_id, event_id) VALUES ('{$_SESSION["user"]->id}', '{$newEventId}')");
        return true;
    }
    
}