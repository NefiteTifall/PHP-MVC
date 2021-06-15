<?php

namespace Foxwind\Controllers;

use Exception;
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


    public function update($id){
        if(!UserController::isAdmin() && !UserController::hasRole(2)){
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Vous n'avez pas la permission de modifier cet article !";
            $_SESSION["popup"]["type"] = "error";
            header("Location: /");
            die;
        }
        $article = $this->manager->getById($id);
        $sections = $this->manager->getSection($id);
        if (!$article){
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Cette article n'existe pas !";
            $_SESSION["popup"]["type"] = "error";
            header("Location: /blog");
            die;

        }

        require VIEWS . ROAD.'/update.php';
    }

    /**
     * @throws Exception
     */
    public function store(){
        if(!UserController::isAdmin() && !UserController::hasRole(2)){
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Vous n'avez pas la permission de créer un article !";
            $_SESSION["popup"]["type"] = "error";
            echo "not permitted";
        }
        $toTest = [
            "title"=>["required","max:250"],
            "intro"=> ["requiredTextarea"],
            "content"=> ["requiredTextarea"],
            "file"=>["requiredFile", "img"]
        ];
        $this->validator->validate(
            $toTest
        );
        if (!$this->validator->errors()){
            $id = uniqid('', false);
            $img = "/resources/image/article/".uniqid('', true).".jpg";
            move_uploaded_file($_FILES["file"]["tmp_name"],".".$img);
            $data = [
                "id" => $id,
                "title" => $_POST["title"],
                "intro" => $_POST["intro"],
                "content" => $_POST["content"],
                "img" => $img,
            ];
            $this->manager->addArticle($data);
            echo "redirect: /article/$id";
        }else{
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Une erreur inconu s'est produite !";
            $_SESSION["popup"]["type"] = "error";
            echo "error";
            print_r($this->validator->errors());
        }
    }

    public function type($var,$type): bool
    {
        return !($var === "center");
    }

}
