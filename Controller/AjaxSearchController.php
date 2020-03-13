<?php


class AjaxSearchController extends Controller
{
    public function getmsg()
    {
        $var = new airports();
        $var->getinfo();
    }

}