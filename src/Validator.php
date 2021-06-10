<?php

namespace Foxwind;

/** Class Validator **/
class Validator {

    private $data;
    private $errors = [];
    private $messages = [
        "required" => "Le champ est requis !",
        "min" => "Le champ doit contenir un minimum de %^% lettres !",
        "max" => "Le champ doit contenir un maximum de %^% lettres !",
        "regex" => "Le format n'est pas respecté",
        "length" => "Le champ doit contenir %^% caractère(s) !",
        "url" => "Le champ doit correspondre à une url !",
        "email" => "Le champ doit correspondre à une email: exemple@gmail.com !",
        "date" => "Le champ doit être une date !",
        "alpha" => "Le champ peut contenir que des lettres minuscules et majuscules !",
        "alphaNum" => "Le champ peut contenir que des lettres minuscules, majuscules et des chiffres !",
        "alphaNumDash" => "Le champ peut contenir que des lettres minuscules, majuscules, des chiffres, des slash et des tirets !",
        "numeric" => "Le champ peut contenir que des chiffres !",
        "confirm" => "Le champs n'est pas conforme au confirm !",
        "requiredTextarea"=>"Le champs est requis !",
        "requiredFile"=>"Le fichier est requis !",
        "img"=>"Le fichier requis doit être une image",
        "hour"=>"Le champ doit être une heure"

    ];
    private $rules = [
        "required" => "#^.+$#",
        "min" => "#^.{ù,}$#",
        "max" => "#^.{0,ù}$#",
        "length" => "#^.{ù}$#",
        "regex" => "ù",
        "url" => FILTER_VALIDATE_URL,
        "email" => FILTER_VALIDATE_EMAIL,
        "date" => "#^(\d{4})(\/|-)(0[0-9]|1[0-2])(\/|-)([0-2][0-9]|3[0-1])$#",
        "alpha" => "#^[A-z]+$#",
        "alphaNum" => "#^[A-z0-9 ]+$#",
        "alphaNumDash" => "#^[A-z0-9-\|\r\n ]+$#",
        "numeric" => "#^[0-9]+$#",
        "confirm" => "",
        "requiredTextarea"=>"#^(.+[\n]{0,})*$#",
        "requiredFile"=>"",
        "img"=>"",
        "hour"=>"#^([0-1]?[0-9]|2[0-3]):[0-5][0-9]:?([0-5][0-9])?$#",
    ];
    //^.{0,}+[\n]{0,}
    public function __construct($data = []) {
        $this->data = $data ?: $_POST;
    }

    public function validate($array) {
        foreach ($array as $field => $rules) {
            $this->validateField($field, $rules);
        }
    }

    public function validateField($field, $rules) {
        foreach ($rules as $rule) {
            $this->validateRule($field, $rule);
        }
    }

    public function validateRule($field, $rule) {
        $res = strrpos($rule, ":");
        if ($res == true) {
            $repRule = explode(":", $rule);
            $changeRule = str_replace("ù", $repRule[1], $this->rules[$repRule[0]]);
            $changeMessage = str_replace("%^%", $repRule[1], $this->messages[$repRule[0]]);

            if (!preg_match($changeRule, $this->data[$field])) {
                $this->errors = [$this->messages[$repRule[0]]];
                $this->storeSession($field, $changeMessage);
            }
        } elseif ($res == false) {
            if ($rule == "confirm") {
                if (!isset($this->data[$field . 'Confirm'])) {
                    $this->errors = ["Nous buttons sur un problème"];
                    $this->storeSession($field . 'Confirm', "Nous buttons sur un problème");
                } elseif (isset($this->data[$field . 'Confirm']) && $this->data[$field] != $this->data[$field . 'Confirm']) {
                    $this->errors = [$this->messages[$rule]];
                    $this->storeSession($field . 'Confirm', $this->messages[$rule]);
                }
                return;
            }
            if ($rule == "email" || $rule == "url") {
                if (!filter_var($this->data[$field], $this->rules[$rule])) {
                    $this->errors = [$this->messages[$rule]];
                    $this->storeSession($field, $this->messages[$rule]);
                }
            }
            elseif ($rule=="requiredFile"){
                $skip = true;
                if (!isset($_FILES[$field]) && !isset($_FILES[$field]["name"])){
                    $this->errors = [$this->messages[$rule]];
                    $this->storeSession($field, $this->messages[$rule]);
                }

            }
            elseif ($rule=="img"){
                $skip = true;
                $error = false;
                if (isset($_FILES[$field]) && isset($_FILES[$field]["name"])) {
                    if (strpos($_FILES[$field]["type"],"image/")!==false) {
                        switch ($_FILES[$field]['error']) {
                            case 1: // UPLOAD_ERR_INI_SIZE
                                $error = "La taille du fichier est plus grande que la limite autorisée par le serveur(paramètre upload_max_filesize du fichier path.ini).";
                                break;
                            case 2: // UPLOAD_ERR_FORM_SIZE
                                $error = "La taille du fichier est plus grande que la limite autorisée par leformulaire (paramètre post_max_size du fichier path.ini).";
                                break;
                            case 3: // UPLOAD_ERR_PARTIAL
                                $error = "L'envoi du fichier a été interrompu pendant le transfert.";
                                break;
                            case 4: // UPLOAD_ERR_NO_FILE
                                $error = "La taille du fichier que vous avez envoyé est nulle.";
                                break;

                        }

                    }else{
                        $error = "Le fichier doit être une image";
                    }
                    if ($error!=false){
                        $this->errors = [$error];
                        $this->storeSession($field, $error);
                    }
                }else{
                    $this->errors = [$this->messages[$rule]];
                    $this->storeSession($field, "L'image est requise");

                }

            }
            elseif (!preg_match($this->rules[$rule], $this->data[$field])) {
                $this->errors = [$this->messages[$rule]];
                $this->storeSession($field, $this->messages[$rule]);
            }
        }
    }

    public function errors() {
        return $this->errors;
    }

    public function storeSession($field, $error) {
        if (!isset($_SESSION["error"][$field])) {
            $_SESSION["error"][$field] = $error;
        } else {
            return;
        }
    }
}
