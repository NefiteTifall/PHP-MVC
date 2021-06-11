<?php

namespace Foxwind\Controllers;

use Foxwind\Models\ArticleManager;
use Foxwind\Validator;

/** Class ArticleController **/
class ArticleController {
    private $manager;
    private $validator;

    public function __construct() {
        $this->manager = new ArticleManager();
        $this->validator = new Validator();
    }

    public function index() {
        $articles = $this->manager->getAll();
        require VIEWS . ROAD.'/blog.php';
    }

    public function show($id){
        $article = $this->manager->getById($id);
        $sections = $this->manager->getSection($id);
        if (!$article){
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Cette article n'existe pas !";
            $_SESSION["popup"]["type"] = "error";
            header("Location: /blog");
            die;

        }
        require VIEWS . ROAD.'/article.php';
    }

    public function create(){
        if(!UserController::isAdmin() && !UserController::hasRole(2)){
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Vous n'avez pas la permission de créer un article !";
            $_SESSION["popup"]["type"] = "error";
            header("Location: /");
            die;
        }
        require VIEWS . ROAD.'/create.php';
    }

    public function store(){
        if(!UserController::isAdmin() && !UserController::hasRole(2)){
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Vous n'avez pas la permission de créer un article !";
            $_SESSION["popup"]["type"] = "error";
            header("Location: /");
            die;
        }
        $sec = 0;
        $toTest = [
            "title"=>["required", "alphaNumDash","max:250"],
            "intro"=> ["requiredTextarea","alphaNumDash"],
            "img"=>["requiredFile", "img"]
        ];
        if (isset($_POST["type1"])){
            $img = $this->type($_POST["type1"],"");
            if ($img){
                $toTest["img1"] = ["requiredFile", "img"];
                $toTest["t1"] = ["required", "alphaNumDash","max:250"];
            }else{
                $toTest["t1"] = ["required", "alphaNumDash","max:250"];
            }
            $sec++;
            for ($i=2;$i<4;$i++){
                if (isset($_POST["type".$i])) {
                    $img = $this->type($_POST["type".$i], "");
                    if ($img) {
                        $toTest["img".$i] = ["requiredFile", "img"];
                        $toTest["t".$i] = ["required", "alphaNumDash", "max:250"];
                    } else {
                        $toTest["t".$i] = ["required", "alphaNumDash", "max:250"];
                    }
                    $sec++;
                }
            }

            $this->validator->validate(
                $toTest
            );
            if (!$this->validator->errors()){
                $id = uniqid();
                $img = "/resources/image/article/".rand(0,1000).rand(0,1000);
                move_uploaded_file($_FILES["img"]["tmp_name"],".".$img);
                $this->manager->addArticle($id,$img);
                for($i=1;$i<$sec+1;$i++){
                    $img = $this->type($_POST["type".$i], "");

                    if ($img){
                        $imgName = "/resources/image/article/".rand(0,1000).rand(0,1000);
                        move_uploaded_file($_FILES["img".$i]["tmp_name"],".".$imgName);
                    }else{
                        $imgName = "";
                    }
                    $this->manager->addSection($id,$imgName,$i);
                    header("Location: /article/".$id);
                }

            }else{
                $_SESSION["popup"]["title"] = "ERREUR 🤖";
                $_SESSION["popup"]["text"] = "Une erreur inconu s'est produite !";
                $_SESSION["popup"]["type"] = "error";
                header("Location: /article/create");
            }


        }else{

            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Vous devez au moins avoir une section !";
            $_SESSION["popup"]["type"] = "error";
            header("Location: /article/create");
        }

    }

    public function type($var,$type){
        if ($var=="center"){
            return false;
        }else{
            return true;
        }
    }

}
