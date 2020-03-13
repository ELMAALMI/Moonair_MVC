<?php


namespace Classes;

ini_set("display_errors",'on');
error_reporting(E_ALL);
class AutoLoad
{

    public static function start()
    {
        /*********************************************
         *            load classes replace include
         * *******************************************/

        spl_autoload_register(array(__CLASS__,'autoload'));

        /*********************************************
         *            define constant
         * *******************************************/

        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];
        define("ROOT", $root . "/MVC_APP/");
        define("HOST", $host . "/MVC_APP/");
        define("CONTROLLER", ROOT . "Controller/");
        define("MODUL", ROOT . "Modul/");
        define("VIEW", ROOT . "View/");
        define("ASSEST", ROOT . "assets/");
        define("CLASSES", ROOT . "/Classes/");
    }


    public static function autoload($class)
    {
        /*********************************************
         *     test if class found in the directory
         * *******************************************/

        if(file_exists(MODUL.$class.".php"))
        {
            include_once (MODUL.$class.".php");
        }else if(file_exists(VIEW.$class.".php"))
        {
            include_once (VIEW.$class.".php");
        }else if(file_exists(CONTROLLER.$class.".php"))
        {
            include_once (CONTROLLER.$class.".php");
        }else if(file_exists(CLASSES.$class.".php"))
        {
            include_once (CLASSES.$class.".php");
        }
    }

}