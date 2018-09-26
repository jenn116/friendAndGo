<?php

class DepenseModel extends Model {
    
    // les paramètres
    private $id;
    private $name;
    private $sold;
    private $activity_id;

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
    public function getSold(){
        return $this->sold;
    }
    public function setSold($sold){
        $this->sold = $sold;
        $this->updateParam("sold", $sold, "id={$this->id}");
    }

    // activity_id
    public function getActivity_id(){
        return $this->activity_id;
    }
    public function setActivity_id($activity_id){
        $this->activity_id = $activity_id;
        $this->updateParam("activity_id", $activity_id, "id={$this->id}");
    }

    /**
     * initialise le model event
     */
    public function init() {
        $this->table = 'depenses';
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
        $this->activity_id = $data->activity_id;
    }
    
}