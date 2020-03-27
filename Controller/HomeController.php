<?php

class HomeController extends Controller
{
    private  $var ;
    public function __construct()
    {
        $this->var = new flight();
    }

    public function gethome()
    {
        parent::index('home',array("offre"=>$this->offre(),"flight"=>$this->getrandomflight()));
    }

    public function offre()
    {
        return $this->var->getoffre();
    }
    public function getrandomflight()
    {
      return (new flight())->randomflight(12,'Morocco');   
    }
}