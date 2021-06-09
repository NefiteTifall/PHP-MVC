<?php

namespace Foxwind\Controllers;

use Foxwind\Models\ArticleManager;
use Foxwind\Validator;

/** Class ArticleController **/
class ArticleController {
    private $manager;
    private $validator;

    public function __construct() {
        $this->manager = new ArticleManager();
        $this->validator = new Validator();
    }

    public function index() {
        $articles = $this->manager->getAll();
        require VIEWS . ROAD.'/blog.php';
    }

    public function show($id){
        $article = $this->manager->getById($id);
        $sections = $this->manager->getSection($id);
        require VIEWS . ROAD.'/article.php';
    }

    public function create(){
        
        require VIEWS . ROAD.'/create.php';
    }

    public function store(){
        var_dump($_POST);
        var_dump($_FILES);
    }


}
