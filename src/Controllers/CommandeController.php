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
            $_SESSION['popup'] = "Veuillez vous connectez pour commander.";
            header("Location: /Login");
        }
        var_dump($_POST);
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
            $_SESSION['popup'] = "Votre commande à bien été enregistrée.";
            $id = uniqid();
            /*$this->manager->store($id);
            header("Location: /");*/
        } else {
            header("Location: /checkout");
        }

    }

}
