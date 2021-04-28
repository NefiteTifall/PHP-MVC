<?php
namespace Foxwind\Models;

/** Class User **/
class User {

    private $username;
    private $email;
    private $password;
    private $idUser;

    public function getUsername():string {
        return $this->username;
    }

    public function getEmail():string {
        return $this->email;
    }

    public function getPassword():string {
        return $this->password;
    }

    public function getId():string {
        return $this->id;
    }

    public function setUsername(String $username) {
        $this->username = $username;
    }

    public function setPassword(String $password) {
        $this->password = $password;
    }

    public function setEmail(String $email) {
        $this->email = $email;
    }

    public function setId(Int $id) {
        $this->id = $id;
    }

    public function roles(){
        $manager = new UserManager();
        $oui = $manager->getRoles($this->id);
        var_dump($oui);
    }
}
