<?php
namespace Foxwind\Models;

/** Class Article **/
class Article {

    private $id_article;
    private $id_user;
    private $intro;
    private $titre;
    private $img;
    private $date;
    private $section = [];

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
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
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
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * @return array
     */
    public function getSection(): array
    {
        return $this->section;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $id_article
     */
    public function setIdArticle($id_article)
    {
        $this->id_article = $id_article;
    }

    /**
     * @param mixed $intro
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;
    }

    /**
     * @param array $section
     */
    public function setSection(array $section)
    {
        $this->section = $section;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }
}
