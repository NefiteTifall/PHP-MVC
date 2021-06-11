<?php

namespace Foxwind\Controllers;

use Foxwind\Models\CommentManager;
use Foxwind\Validator;

/** Class CommentController **/
class CommentController {
    private $manager;
    private $validator;

    public function __construct() {
        $this->manager = new CommentManager();
        $this->validator = new Validator();
    }

    public function getComments($id){
        return $this->manager->getByArticle($id);
    }
    public function addComment($idArticle){
        $ctrl = new UserController();
        if(!$ctrl::isAuth()){
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Merci de vous connecter pour commenter !";
            $_SESSION["popup"]["type"] = "error";
            header("Location: /login");
            die;
        }

        $this->validator->validate([
            "content"=>["requiredTextarea", "alphaNumDash","max:250"],
        ]);

        $_SESSION['old'] = $_POST;
        if (!$this->validator->errors()) {
            $this->manager->addComment($idArticle);
            $_SESSION["popup"]["title"] = "Commentaire";
            $_SESSION["popup"]["text"] = "Vous venez de poster un commantaire !";
            $_SESSION["popup"]["type"] = "info";
            header("Location: /article/".$idArticle);
        }else{
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Une erreur est survenu pendant l'envoie";
            $_SESSION["popup"]["type"] = "error";
            header("Location: /article/".$idArticle);
        }
        
    }

    public function deleteCom($id)
    {
        $ctrl = new UserController();
        if(!$ctrl::isAuth()){
            $_SESSION['popup'] = "Veuillez vous connectez pour supprimer vos commentaires.";
            header("Location: /login");
            die;
        }
        $com = $this->manager->find($id);
        if ($com->getIdUser() !== $_SESSION["user"]["id"]) {
            $_SESSION['popup'] = "Vous n'êtes pas l'auteur du commentaire que vous essayer de supprimer.";
            header("Location: /login");
            die;
        }

        $this->manager->delete($id);
        $_SESSION['popup'] = "Le commentaire à bien été supprimé.";
        header("Location: /article/".$com->getIdArticle());

    }


}
