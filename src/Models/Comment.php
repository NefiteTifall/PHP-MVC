<?php
namespace Foxwind\Models;

use Foxwind\Controllers\UserController;

/** Class Comment **/
class Comment {

    private $id_com;
    private $id_user;
    private $id_article;
    private $contenu;
    private $level;
    private $author;
    private $date;

    public function __construct()
    {
        $this->setAuthor($this->id_user);
    }

    /**
     * @return mixed
     */
    public function getIdArticle()
    {
        return $this->id_article;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @return mixed
     */
    public function getIdCom()
    {
        return $this->id_com;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $id_article
     */
    public function setIdArticle($id_article)
    {
        $this->id_article = $id_article;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @param mixed $id_com
     */
    public function setIdCom($id_com)
    {
        $this->id_com = $id_com;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setAuthor($id)
    {
        $ctrl = new UserController();
        $this->author = $ctrl->getUserById($id);
    }

}
