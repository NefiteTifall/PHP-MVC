<?php
namespace Foxwind\Models;

//use Foxwind\Models\Test;
/** Class ArticleManager **/
class ArticleManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }


    public function getAll()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM article');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, ROAD."\Models\Article");
    }

    public function getById($id){
        $stmt = $this->bdd->prepare('SELECT * FROM article WHERE id_article=?');
        $stmt->execute(array(
            $id
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, ROAD."\Models\Article");
        return $stmt->fetch();

    }

    public function getSection($id){
        $stmt = $this->bdd->prepare('SELECT * FROM section WHERE id_article=?');
        $stmt->execute(array(
            $id
        ));

        return $stmt->fetchAll();

    }
}
