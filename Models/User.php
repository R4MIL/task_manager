<?php
namespace task_manager\Models;

class User 
{
    private $login;
    private $password;
    private $name;
    private $email;

    public function __construct($login,$password,$name='',$email='') {
        $this->name = $name;
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() { 
        return $this->password; 
    }   

    public function getName() {
        return $this->name;
    }

    public function getEmail() {    
        return $this->email;
    }
}