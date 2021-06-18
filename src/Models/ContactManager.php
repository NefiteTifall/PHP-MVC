<?php
namespace Foxwind\Models;

/** Class ContactManager **/
class ContactManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function all(){ //Recupère tout les messages
        $stmt = $this->bdd->query('SELECT * FROM contact 
                                            JOIN utilisateur ON contact.id_user = utilisateur.id_user');

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Foxwind\Models\Contact");
    }

    public function store() {
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

    public function findById($id) {
        $stmt = $this->bdd->prepare("SELECT * FROM contact 
                                            JOIN utilisateur ON contact.id_user = utilisateur.id_user
                                            WHERE id_contact = ?");
        $stmt->execute(array( $id ));

        $stmt->setFetchMode(\PDO::FETCH_CLASS,"Foxwind\Models\Contact");
        return $stmt->fetch();
    }

    public function removeByID($ID){
        $userReq = $this->bdd->prepare('DELETE FROM contact WHERE id_contact = ?');
        $userReq->execute(array( $ID ));
    }

}
