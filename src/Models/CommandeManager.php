<?php
namespace Foxwind\Models;

use Foxwind\Models\Comment;
/** Class CommandeManager **/
class CommandeManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }


    public function store($id)
    {
        $stmt = $this->bdd->prepare(
            'INSERT INTO commande(id_commande,nom,prenom,rue,ville,code_postal,pays,id_user,id_eolienne,qte) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
        );
        $stmt->execute(array(
            $id,
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["rue"],
            $_POST["ville"],
            $_POST["code"],
            $_POST["pays"],
            $_SESSION["user"]["id"],
            $_SESSION["cart"]["eol"]["eolienne"]["qte"]
        ));
    }

}
