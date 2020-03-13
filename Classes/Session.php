<?php

class Session
{
    /*********************************************
     *     Session table
     * *******************************************/
    private $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    /*********************************************
     *     Session start
     * *******************************************/
    public function Startsession()
    {
        if(empty($_SESSION))
        {
            session_start();
            $_SESSION['login'] = $this->user;
            return "created session";
        }
        else
        {
            return "session exit";
    
        }
    }
    /*********************************************
     *     Session end
     * *******************************************/
    public function logout()
    {
        $_SESSION['login'] = array();    // unset the data
        session_destroy();              //destroy session
        header('Location: index.html');
    }
}
