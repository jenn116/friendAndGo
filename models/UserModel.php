<?php

class UserModel extends Model {
    
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

    // email
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
        $this->updateParam("email", $email, "id={$this->id}");
    }

    // password
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
        $this->updateParam("password", $password, "id={$this->id}");
    }

    // firstname
    public function getFirstname(){
        return $this->firstname;
    }
    public function setFirstname($firstname){
        $this->firstname = $firstname;
        $this->updateParam("firstname", $firstname, "id={$this->id}");
    }

    // lastname
    public function getLastname(){
        return $this->lastname;
    }
    public function setLastname($lastname){
        $this->lastname = $lastname;
        $this->updateParam("lastname", $lastname, "id={$this->id}");
    }

    // age
    public function getAge(){
        return $this->age;
    }
    public function setAge($age){
        $this->age = $age;
        $this->updateParam("age", $age, "id={$this->id}");
    }

    // gender
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
        $this->table = 'users';
    }
    
    /**
     * hydrate l'object depuis la bdd
     * @param integer $id id du user a recuperer depuis la bdd
     */
    public function hydrate($id) {
        $data = $this->findById($id);
        
        $this->id = $id;
        $this->email = $data->email;
        $this->password = $data->password;
        $this->lastname = $data->lastname;
        $this->firstname = $data->firstname;
        $this->age = $data->age;
        $this->gender = $data->gender;
    }

    /**
     * creer une nouvelle entité dans la base
     * @return Boolean
     */
    public function create() {
        return Base::getInstance()->query("INSERT INTO {$this->table} (email, password, lastname, firstname, age, gender) VALUES ('{$this->email}', '{$this->password}', '{$this->lastname}', '{$this->firstname}', '{$this->age}', '{$this->gender}')");
    }
    
}