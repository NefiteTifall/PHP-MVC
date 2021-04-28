<?php
namespace Foxwind\Models;

use Foxwind\Models\User;
/** Class UserManager **/
class UserManager {

    private $bdd;
    private $bddName = "utilisateur";

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getBdd()
    {
        return $this->bdd;
    }

    public function find($username) {
        $stmt = $this->bdd->prepare("SELECT * FROM ".$this->bddName." WHERE username = ?");
        $stmt->execute(array(
            $username
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"Foxwind\Models\User");

        return $stmt->fetch();
    }

    public function findId($id) {
        //Vérifie si le nom d'utilisateur est déjà utilisé
        $stmt = $this->bdd->prepare("SELECT id_user FROM utilisateur WHERE id_user = ?");
        $stmt->execute(array(
            $id
        ));

        return $stmt->fetch();
    }

    public function all() {
        $stmt = $this->bdd->query('SELECT * FROM '.$this->bddName);

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Foxwind\Models\User");
    }

    public function store($password) {
        $id = uniqid();
        $stmt = $this->bdd->prepare("INSERT INTO ".$this->bddName."(id, username, password) VALUES (?, ?, ?)");
        $stmt->execute(array(
            $id,
            escape($_POST["username"]),
            $password
        ));
    }

    public function getRoles($id){
        $stmt = $this->bdd->prepare('SELECT * FROM role_user WHERE id_user=?');
        $stmt->execute(array(
            $id
        ));
        return $stmt->fetchAll();
    }
}
