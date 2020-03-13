<?php
/*********************************************
 *              mail class
 * *******************************************/
class mail
{
    /*********************************************
     *     attribute of class
     * *******************************************/

    private $name;
    private $email;
    private $sub;
    private $msg;

    /*********************************************
     *     initials attribute
     * *******************************************/

    public function __construct($name,$email,$sub,$msg)
    {
        $this->name  = $name;
        $this->email = "FROM : ".$email;
        $this->sub   = $sub;
        $this->msg   = $msg;
    }

    /*********************************************
     *     verification of mail
     * *******************************************/
    public function mailverify()
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    /*********************************************
     *     send mail
     * *******************************************/

    public function sendmail()
    {
        $msg = "";
        if(mailverify($this->email))
        {
            if( mail("elmaalmibillal@gamil.com",$this->sub,$this->msg,$this->email) )
            {
                $msg = "Your msg send succesfully";
            }
            else
            {
                $msg = "Your mail not send try again ";
            }
        }
        else
        {
            $msg = "Your mail not valiable";
        }
    }
}
