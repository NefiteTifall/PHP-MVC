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
            $_SESSION['popup'] = "Votre demande de contact à bien été enregistrée. Vous recevrez une réponse par mail.";
            $this->manager->store();
            header("Location: /contact");
        } else {
            header("Location: /contact");
        }

    }

}
