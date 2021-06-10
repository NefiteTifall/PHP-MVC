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

    public function addArticle($id,$img){
        $stmt = $this->bdd->prepare('INSERT INTO article(id_article,id_user,intro,titre,img,date) VALUES(?,?,?,?,?,?)');
        $stmt->execute(array(
            $id,
            $_SESSION["user"]["id"],
            $_POST["intro"],
            $_POST["title"],
            $img,
            date("Y-m-d")

        ));

        return $stmt->fetchAll();

    }

    public function addSection($id,$img,$ind){
        if ($_POST["type".$ind]=="left"){
            $type = "left-img";
        }else if ($_POST["type".$ind]=="right"){
            $type = "right-img";
        }else{
            $type = "full-img";
        }
        $stmt = $this->bdd->prepare('INSERT INTO section(id_section,id_article,type,content,image) VALUES(?,?,?,?,?)');
        $stmt->execute(array(
            uniqid(),
            $id,
            $type,
            $_POST["t".$ind],
            $img,
        ));

        return $stmt->fetchAll();

    }
}
