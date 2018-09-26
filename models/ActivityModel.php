<?php

class ActivityModel extends Model {
    
    // les paramètres
    private $id;
    private $name;
    private $date;
    private $event_id;

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
    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        $this->date = $date;
        $this->updateParam("date", $date, "id={$this->id}");
    }

    // event_id
    public function getEvent_id(){
        return $this->event_id;
    }
    public function setEvent_id($event_id){
        $this->event_id = $event_id;
        $this->updateParam("event_id", $event_id, "id={$this->id}");
    }
    
    /**
     * initialise le model activities
     */
    public function init() {
        $this->table = 'activities';
    }
    
    /**
     * hydrate l'object depuis la bdd
     * @param integer $id id du activity a recuperer depuis la bdd
     */
    public function hydrate($id) {
        $data = $this->findById($id);
        
        $this->id = $id;
        $this->name = $data->name;
        $this->date = $data->date;
        $this->event_id = $data->event_id;
    }
    
}