<?php

namespace Foxwind\Controllers;

use Foxwind\Models\MainManager;
use Foxwind\Validator;

/** Class MainController **/
class MainController {
    private $manager;
    private $validator;

    public function __construct() {
        $this->manager = new MainManager();
        $this->validator = new Validator();
    }

    public function index() {
        require VIEWS . ROAD.'/accueil.php';
    }

    public function eolienne(){
        $eol = $this->getDispoEol();
        require VIEWS . ROAD.'/eolienne.php';
    }

    public function destroySession(){
        session_destroy();
        echo "Session destroyed please go to /";
    }
    public function showSession(){
        session_destroy();
        echo "Session destroyed please go to /";
    }

    public function contact(){
        require VIEWS . ROAD.'/contact.php';
    }

    public function team(){
        require VIEWS . ROAD.'/equipe.php';
    }

    public function cart(){
        $eol = $this->getDispoEol();
        require VIEWS . ROAD.'/cart.php';
    }

    public function commande(){
        $ctrl = new UserController();
        if(!$ctrl::isAuth()){
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Vous devez être connecter pour commander";
            $_SESSION["popup"]["type"] = "error";
            header("Location: /login");
        }
        require VIEWS . ROAD. '/cart-checkout.php';
    }

    public function deleteFromCart($id){
        /*$_SESSION["cart"]["eol"][1] = [
            "name"=>"Éolienne",
            "qte"=> 5,
            "prix"=> 50,
            "img"=> "/resources/image/cart-ex.svg"
        ];*/
        unset($_SESSION["cart"]["eol"][$id]);
        header("Location: /cart");
    }

    public function dashboardBO(){ //Acces au back-office
        if(!UserController::isAuth()) {
            $_SESSION["popup"] = "Veuillez vous identifier!";
            header("Location:/login");
            die;
        }
        require VIEWS . ROAD.'/Back/dashboard.php';
    }

    public function user(){ //Acces au comptez
        if(!UserController::isAuth()) {
            $_SESSION["popup"] = "Veuillez vous identifier!";
            header("Location:/login");
            die;
        }
        require VIEWS . ROAD . '/Back/compte.php';
    }

    public function addCart(){
        $eol = $this->getDispoEol();
        $_POST["qte"] = intval($_POST["qte"]);
        $this->validator->validate([
            "qte"=>["required","numeric"]
        ]);

        $_SESSION['old'] = $_POST;
        if (!$this->validator->errors()) {
            if ($_POST["qte"]>$eol) {
                $_SESSION["popup"]["title"] = "ERREUR 🤖";
                $_SESSION["popup"]["text"] = "Vous ne pouvez pas réserver plus de $eol éoliennes";
                $_SESSION["popup"]["type"] = "error";
                echo "refresh";
                die;
            }
            $_SESSION["popup"]["title"] = "Succès";
            $_SESSION["popup"]["text"] = "L'article vient d'être ajouter a vôtre panier";
            $_SESSION["popup"]["type"] = "success";
            if (!isset($_SESSION["cart"]["eol"]) || count($_SESSION["cart"]["eol"]) === 0) $_SESSION["cart"]["eol"]["eolienne"] = [

                "name"=>"Éolienne",
                "prix"=> 50,
                "img"=> "/resources/image/cart-ex.svg",
                "qte" => null
            ];
            if (isset($_SESSION["cart"]["eol"]["eolienne"])) $_SESSION["cart"]["eol"]["eolienne"]["qte"] = (int)$_SESSION["cart"]["eol"]["eolienne"]["qte"] + (int)$_POST["qte"];
            else $_SESSION["cart"]["eol"]["eolienne"]["qte"] = (int)$_POST["qte"];
            echo "/cart";
        } else {
            $_SESSION["popup"]["title"] = "ERREUR 🤖";
            $_SESSION["popup"]["text"] = "Merci d'entrer un nombre supérieur à 1";
            $_SESSION["popup"]["type"] = "error";
            echo "refresh";
        }

    }
    public function changeCart() {
        $eol = $this->getDispoEol();
        
        if (!isset($_SESSION["cart"])) $_SESSION["cart"]["eol"]["eolienne"] = [
            "name"=>"Éolienne",
            "prix"=> 50,
            "img"=> "/resources/image/cart-ex.svg",
            "qte" => null
        ];
        $_SESSION["cart"]["eol"]["eolienne"]["qte"] = intval($_POST["qte"]);
    }

    public function getDispoEol(){
        return $this->manager->getDispoEol()["eol"];
    }
    public function destroyPopup() {
        unset($_SESSION['popup']);
    }
}
