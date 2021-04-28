<?php

namespace Foxwind\Controllers;

use Foxwind\Models\UserManager;
use Foxwind\Validator;

/** Class UserController **/
class UserController {
    private $manager;
    private $validator;

    public function __construct() {
        $this->manager = new UserManager();
        $this->validator = new Validator();
    }

    public function showLogin() {
        require VIEWS . 'Auth/login.php';
    }

    public function showRegister() {
        require VIEWS . 'Auth/register.php';
    }

    public function logout()
    {
        $redirect = "/";
        if (isset($_GET["redirect"])) {
            $redirect = $_GET["redirect"];
        }

        //Déconnecte l'utilisateur
        session_destroy();
        header("Location: ".$redirect);
    }

    public function isUserNameValide($name){
        $res = $this->manager->find($name);
        if (!$res) {
            echo json_encode("true");
        }else{
            echo json_encode("false");
        }
    }

    public function register() {
        $redirect = "/";
        if (isset($_POST["redirect"])) {
            $redirect = $_POST["redirect"];
        }
        $this->validator->validate([
            "username"=>["required", "min:3", "alphaNum"],
            "password"=>["required", "min:6", "alphaNum", "confirm"],
            "passwordConfirm"=>["required", "min:6", "alphaNum"]
        ]);
        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->manager->find($_POST["username"]);

            if (empty($res)) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $this->manager->store($password);

                $_SESSION["user"] = [
                    "id" => $this->manager->getBdd()->lastInsertId(),
                    "username" => $_POST["username"]
                ];
                header("Location: ".$redirect);
            } else {
                $_SESSION["error"]['username'] = "Le username choisi est déjà utilisé !";
                header("Location: /register");
            }
        } else {
            header("Location: /register");
        }
    }

    public function login() {
        $redirect = "/";
        if (isset($_POST["redirect"])) {
            $redirect = $_POST["redirect"];
        }
        $this->validator->validate([
            "username"=>["required", "min:3", "max:9", "alphaNum"],
            "password"=>["required", "min:6", "alphaNum"]
        ]);

        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->manager->find($_POST["username"]);
            if ($res && password_verify($_POST['password'], $res->getPassword())) {
                $_SESSION["user"] = [
                    "id" => $res->getId(),
                    "username" => $res->getUsername()
                ];
                header("Location: ".$redirect);
            } else {
                $_SESSION["error"]['message'] = "Une erreur sur les identifiants";
                header("Location: /login");
            }
        } else {
            header("Location: /login");
        }
    }

    public static function isAuth(){
        if (isset($_SESSION["user"]["id"])) {
            $manager = new UserManager();
            $o = $manager->findId($_SESSION["user"]["id"]);
            if (!$o) {
                return false;
            }else{
                return true;
            }
        }
        return false;
    }

    public static function isAdmin(){
        if(UserController::isAuth()){
            $manager = new UserManager();
            $roles = $manager->getRoles($_SESSION["user"]["id"]);
            foreach ($roles as $key => $role) {
                if ($role["id_role"] == 1) {
                    return true;
                }
            }
        }
    }
}
