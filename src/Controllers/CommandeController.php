<?php

namespace Foxwind\Controllers;

use Foxwind\Models\CommandeManager;
use Foxwind\Validator;

/** Class CommandeController **/
class CommandeController {
    private $manager;
    private $validator;

    public function __construct() {
        $this->manager = new CommandeManager();
        $this->validator = new Validator();
    }

    public function store(){
        $ctrl = new UserController();
        if(!$ctrl::isAuth()){
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Merci de vous connecter pour commander";
            $_SESSION["popup"]["type"] = "error";
            header("Location: /Login");
        }
        $this->validator->validate([
            "nom"=>["required", "alphaNumDash"],
            "prenom"=>["required","alphaNumDash"],
            "rue"=>["required","alphaNumDash"],
            "ville"=>["required","alphaNumDash"],
            "code"=>["required","alphaNumDash"],
            "pays"=>["required","alphaNumDash"],
        ]);

        $_SESSION['old'] = $_POST;
        if (!$this->validator->errors()) {
            $_SESSION["popup"]["title"] = "Commande";
            $_SESSION["popup"]["text"] = "Votre commande à bien été enregistrée.";
            $_SESSION["popup"]["type"] = "info";
            $id = uniqid();
            $this->manager->store($id);
            header("Location: /");
        } else {
            header("Location: /checkout");
        }

    }

}
