<?php
namespace Foxwind\Models;

/** Class User **/
class User {

    private $id_user;
    private $email;
    private $user_preusdo;
    private $mdp;
    private $id_role;
    private $role_nom;
    /**
     * @return mixed
     */
    public function getUserPreusdo()
    {
        return $this->user_preusdo;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getIdRole()
    {
        return $this->id_role;
    }

    /**
     * @return mixed
     */
    public function getRoleNom()
    {
        return $this->role_nom;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $user_preusdo
     */
    public function setUserPreusdo($user_preusdo)
    {
        $this->user_preusdo = $user_preusdo;
    }

    /**
     * @param mixed $id_role
     */
    public function setIdRole($id_role)
    {
        $this->id_role = $id_role;
    }

    /**
     * @param mixed $role_nom
     */
    public function setRoleNom($role_nom)
    {
        $this->role_nom = $role_nom;
    }

}
