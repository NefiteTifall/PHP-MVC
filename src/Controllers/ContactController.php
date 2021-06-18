<?php

namespace Foxwind\Controllers;

use Foxwind\Models\ContactManager;
use Foxwind\Validator;

/** Class ContactController **/
class ContactController {
    private $manager;
    private $validator;

    public function __construct() {
        $this->manager = new ContactManager();
        $this->validator = new Validator();
    }

    public function store(){
        $this->validator->validate([
            "mail"=>["required", "email"],
            "who"=>["required", "min:3","alphaNumDash"],
            "content"=>["requiredTextarea","alphaNumDash"],
        ]);
        $_SESSION['old'] = $_POST;
        if (!$this->validator->errors()) {
            $_SESSION["popup"]["title"] = "CONTACT 📣";
            $_SESSION["popup"]["text"] = "Votre demande de contact à bien été enregistrée. Vous recevrez une réponse par mail.";
            $_SESSION["popup"]["type"] = "info";
            $this->manager->store();
            header("Location: /contact");
        } else {
            header("Location: /contact");
        }
    }

    public function show(){ //Montre les contacts sur le back-office
        if(!UserController::isAuth()) {
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Veuillez vous identifier!";
            $_SESSION["popup"]["type"] = "error";
            header("Location:/login");
            die;
        }
        if(!UserController::isAdmin() && UserController::hasRole(2)) {
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Vous ne possédez pas les droits nécessaires!";
            $_SESSION["popup"]["type"] = "error";
            header("Location:/compte");
            die;
        }

        $contacts = $this->manager->all();
        require VIEWS . ROAD . '/Back/contact.php';
    }


    public function showByID($id){ //Montre un contact sur le back-office via son ID
        if(!UserController::isAuth()) {
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Veuillez vous identifier!";
            $_SESSION["popup"]["type"] = "error";
            header("Location:/login");
            die;
        }
        if(!UserController::isAdmin() && UserController::hasRole(2)) {
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Vous ne possédez pas les droits nécessaires!";
            $_SESSION["popup"]["type"] = "error";
            header("Location:/compte");
            die;
        }

        $contact = $this->manager->findByID($id);
        require VIEWS . ROAD . '/Back/Contact/content.php';
    }

    public function delete($id){
        if(!UserController::isAdmin() && !UserController::hasRole(2)){
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Vous n'avez pas la permission de modifier ce message !";
            $_SESSION["popup"]["type"] = "error";
            header("Location: /contact/show/");
            die;
        }

        $contact = $this->manager->findById($id);
        if (!$contact){
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Ce message n'existe pas !";
            $_SESSION["popup"]["type"] = "error";
            header("Location: /contact/show/");
            die;
        }
        $this->manager->removeByID($id);

        header("Location: /contact/show/");
    }


}
