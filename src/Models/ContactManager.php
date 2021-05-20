<?php
namespace Foxwind\Models;

/** Class ContactManager **/
class ContactManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }


    public function store()
    {
        $id = uniqid();
        $stmt = $this->bdd->prepare('INSERT INTO contact (id_contact,id_user,mail,qui,content) VALUES(?, ?, ?, ?, ?)');
        $stmt->execute(array(
            $id,
            $_SESSION["user"]["id"],
            $_POST["mail"],
            $_POST["who"],
            $_POST["content"],
        ));

    }

}
