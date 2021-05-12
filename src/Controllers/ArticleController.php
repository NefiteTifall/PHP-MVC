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

        /*$comments = "";*/
        $sections = $this->manager->getSection($id);
        require VIEWS . ROAD.'/article.php';
    }


}
