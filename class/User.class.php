<?php

// require des class nécéssaires
require(__DIR__ . DIRECTORY_SEPARATOR . "Model.class.php");

class User extends Model {
    
    // les paramètres
    private $id;
    private $email;
    private $password;
    private $firstname;
    private $lastname;
    private $age;
    private $gender;
    
    // les getters & setters
    public function getId(){
        return $this->id;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
        $this->updateParam("email", $email, "id={$this->id}");
    }

    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
        $this->updateParam("password", $password, "id={$this->id}");
    }

    public function getFirstname(){
        return $this->firstname;
    }
    public function setFirstname($firstname){
        $this->firstname = $firstname;
        $this->updateParam("fistname", $firstname, "id={$this->id}");
    }

    public function getLastname(){
        return $this->lastname;
    }
    public function setLastname($lastname){
        $this->lastname = $lastname;
        $this->updateParam("lastname", $lastname, "id={$this->id}");
    }

    public function getAge(){
        return $this->age;
    }
    public function setAge($age){
        $this->age = $age;
        $this->updateParam("age", $age, "id={$this->id}");
    }

    public function getGender(){
        return $this->gender;
    }
    public function setGender($gender){
        $this->gender = $gender;
        $this->updateParam("gender", $gender, "id={$this->id}");
    }
    
    /**
     * initialise le model users
     */
    public function init() {
        $this->_table = 'users';
    }
    
    /**
     * hydrate l'object depuis la bdd
     * @param integer $id id du user a recuperer depuis la bdd
     */
    public function hydrate($id) {
        $req = $this->_db->getInstance()->query("SELECT email, password, firstname, lastname, age, gender FROM users WHERE id={$id}");
        $data = $req->fetchObject();
        
        $this->id = $id;
        $this->email = $data->email;
        $this->password = $data->password;
        $this->lastname = $data->lastname;
        $this->firstname = $data->firstname;
        $this->age = $data->age;
        $this->gender = $data->gender;
    }
    
}