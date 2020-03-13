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
        parent::index('home',array($this->getdata(),$this->getallfight()));
    }

    public function getdata()
    {
        return $this->var->getoffre(120);
    }
    public function getallfight()
    {
        return $this->var->getallflight();
    }
}