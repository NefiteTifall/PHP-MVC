<?php
namespace Foxwind\Models;

use Foxwind\Models\Comment;
/** Class CommentManager **/
class CommentManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }


    public function getByArticle($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM commentaire WHERE id_article=?');
        $stmt->execute(array(
            $id
        ));

        return $stmt->fetchAll(\PDO::FETCH_CLASS, ROAD."\Models\Comment");
    }

    public function find($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM commentaire WHERE id_com=?');
        $stmt->execute(array(
            $id
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, ROAD."\Models\Comment");
        return $stmt->fetch();
    }

    public function addComment($id)
    {
        $stmt = $this->bdd->prepare('INSERT INTO commentaire(id_com, id_user, id_article, date, contenu, level) VALUES(?, ?, ?, ?, ?, ?)');
        $stmt->execute(array(
            uniqid(),
            $_SESSION["user"]["id"],
            $id,
            date("Y-m-d"),
            $_POST["content"],
            1
        ));

    }

    public function delete($id)
    {
        $stmt = $this->bdd->prepare('DELETE FROM commentaire WHERE id_com=?');
        $stmt->execute(array(
            $id
        ));

    }


}
