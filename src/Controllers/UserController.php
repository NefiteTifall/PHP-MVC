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


        //Déconnecte l'utilisateur
        session_destroy();
        header("Location: /");
    }

    public function isUserNameValide($name){
        $res = $this->manager->find($name);
        if (!$res) {
            echo json_encode("true");
        }else{
            echo json_encode("false");
        }
    }

    public function getUserById($id){
        return $this->manager->findById($id);
    }

    public function register() {
        $this->validator->validate([
            "email"=>["required", "min:3", "email"],
            "username"=>["required", "min:3", "alphaNum"],
            "password"=>["required", "min:6", "alphaNum", "confirm"],
            "passwordConfirm"=>["required", "min:6", "alphaNum"]
        ]);
        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->manager->find($_POST["username"]);
            if (empty($res)) {
                $resMail = $this->manager->findMail($_POST["email"]);
                if (empty($resMail)){
                    $password = hash("sha256",$_POST["password"]);
                    $this->manager->store($password);

                    $_SESSION["user"] = [
                        "id" => $this->manager->getBdd()->lastInsertId(),
                        "role" => 1,
                        "name" => $_POST["username"],
                        "email" => $_POST["email"],
                    ];
                    header("Location: /");
                }else{
                    $_SESSION["error"]['email'] = "Le mail choisi est déjà utilisé !";
                    header("Location: /register");
                }
            } else {
                $_SESSION["error"]['username'] = "Le username choisi est déjà utilisé !";
                header("Location: /register");
            }
        } else {
            header("Location: /register");
        }
    }

    public function login() {
        $this->validator->validate([
            "email"=>["required", "min:3", "email"],
            "password"=>["required", "min:6", "alphaNum"]
        ]);

        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->manager->findMail($_POST["email"]);
            if ($res &&  (hash("sha256",$_POST["password"]) == $res->getMdp())) {
                $_SESSION["user"] = [
                    "id" => $res->getIdUser(),
                    "role" => $res->getIdRole(),
                    "name" => $res->getUsername(),
                    "email" => $res->getEmail(),
                ];
                header("Location: /");
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
                if ($role["id_role"] == 3) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function hasRole($r){
        if(UserController::isAuth()){
            $manager = new UserManager();
            $roles = $manager->getRoles($_SESSION["user"]["id"]);
            foreach ($roles as $key => $role) {
                if ($role["id_role"] == $r) {
                    return true;
                }
            }
        }
        return false;
    }
}
