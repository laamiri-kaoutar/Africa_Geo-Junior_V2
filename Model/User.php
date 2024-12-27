<?php
// User class
class User {
    private $id;
    private $username;
    private $password;
    private $role; 

    public function __construct($id, $username, $password, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    public function getId() {return $this->id ;}
    public function getUser() {return $this->username ;}
    public function getPassword() {return $this->password;}
    public function getRole() {return $this->role;}

    public function setUser($username) { $this->username = $username ;}
    public function setPassword($password) { $this->password = $password;}
}    