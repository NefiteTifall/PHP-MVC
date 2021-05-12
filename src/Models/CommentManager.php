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

}
