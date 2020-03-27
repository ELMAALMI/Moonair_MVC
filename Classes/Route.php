<?php

/*
 * CREATE ROUTE FOR MY WEB SITE
 */
class Route
{
    /*********************************************
     *            define template
     * *******************************************/

    private $request;



    /*********************************************
     *            Route of web site
     * *******************************************/

    private $routes = array("home" =>['Controller' => 'HomeController', 'methode' => 'gethome'],
                            "about"=>['Controller' => 'AboutController', 'methode' => 'getabout'],
                            "contact"=>['Controller' => 'ContactController', 'methode' => 'getcontact'],
                            "destination"=>['Controller' => 'DestinationController', 'methode' => 'getdestination'],
                            "AjaxSearchController"=>['Controller' => 'AjaxSearchController', 'methode' => 'getinfo'],
                            "search"=>['Controller' => 'SearchController', 'methode' => 'getsearchpage']);

    /*********************************************
     *            initial template
     * *******************************************/

    public function __construct($resquest)
    {
        if($resquest == "")
        {
            $this->request = "home";
        }
        else 
        {
            $this->request = $resquest;
        }
    }

    /*********************************************
     *        get template from Controller
     * *******************************************/

    public function Controllerrender()
    {
        if (key_exists($this->request,$this->routes))
        {
           
         
                $controller = $this->routes[$this->request]['Controller'];
                $methode    = $this->routes[$this->request]['methode'];
                $Curentecontroller = new $controller();
                $Curentecontroller->$methode();
            
        }
        else
        {
          $error = new View("404",false);
          $error->render();
        }
    }
}