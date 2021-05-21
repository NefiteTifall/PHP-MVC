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

    public function contact(){
        require VIEWS . ROAD.'/contact.php';
    }

    public function team(){
        require VIEWS . ROAD.'/equipe.php';
    }

    public function cart(){
        require VIEWS . ROAD.'/cart.php';
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

}
