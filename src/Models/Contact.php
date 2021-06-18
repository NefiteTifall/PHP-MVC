<?php
namespace FoxWind\Models;

/** Class Contact **/
class Contact {

    private string $id_contact;
    private string $id_user;
    private string $mail;
    private string $qui;
    private string $content;
    private string $username;

    //Get Contact ID  --  String expected
    public function getContactID():string{
        return $this->id_contact;
    }

    //Get User ID  --  String expected
    public function getUserID(){
        return $this->id_user;
    }

    //Get User Mail  --  String expected
    public function getUserMail(){
        return $this->mail;
    }

    //Get User status (Mecene, Asso, . . .)  --  String expected
    public function getUserStatus():string{
        return $this->qui;
    }

    //Get Contact Content  --  String expected
    public function getContent():string{
        return $this->content;
    }

    //Get Username  --  String expected  --  /!\ Variable filled under certain queries /!\
    public function getUsername():string{
        return $this->username;
    }


}