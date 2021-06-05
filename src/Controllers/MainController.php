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
        require VIEWS . ROAD.'/cart.php';
    }

    public function commande(){
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

    public function addCart(){
        $this->validator->validate([
            "qte"=>["numeric"]
        ]);

        $_SESSION['old'] = $_POST;
        if (!$this->validator->errors()) {
            $_SESSION['popup'] = "Cette article à bien été ajouté au panier.";
            if (!isset($_SESSION["cart"]["eol"]) || count($_SESSION["cart"]["eol"]) === 0) $_SESSION["cart"]["eol"]["eolienne"] = [
                "name"=>"Éolienne",
                "prix"=> 50,
                "img"=> "/resources/image/cart-ex.svg",
                "qte" => null
            ];
            if (isset($_SESSION["cart"]["eol"]["eolienne"])) $_SESSION["cart"]["eol"]["eolienne"]["qte"] = (int)$_SESSION["cart"]["eol"]["eolienne"]["qte"] + (int)$_POST["qte"];
            else $_SESSION["cart"]["eol"]["eolienne"]["qte"] = (int)$_POST["qte"];
            header("Location: /cart");
        } else {
            $_SESSION['popup'] = "Veuillez rentrer un nombre valide et supérieur à 0";
            header("Location: /contact");
        }

    }
    public function changeCart() {
        if (!isset($_SESSION["cart"])) $_SESSION["cart"]["eol"]["eolienne"] = [
            "name"=>"Éolienne",
            "prix"=> 50,
            "img"=> "/resources/image/cart-ex.svg",
            "qte" => null
        ];
        $_SESSION["cart"]["eol"]["eolienne"]["qte"] = intval($_POST["qte"]);
    }
}
