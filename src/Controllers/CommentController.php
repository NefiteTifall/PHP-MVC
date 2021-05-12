<?php

namespace Foxwind\Controllers;

use Foxwind\Models\CommentManager;
use Foxwind\Validator;

/** Class CommentController **/
class CommentController {
    private $manager;
    private $validator;

    public function __construct() {
        $this->manager = new CommentManager();
        $this->validator = new Validator();
    }

    public function getComments($id){
        //var_dump();
        return $this->manager->getByArticle($id);
    }


}
