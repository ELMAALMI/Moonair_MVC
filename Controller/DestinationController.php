<?php


class DestinationController extends Controller
{
    public function getdestination()
    {
        parent::index('destination');
    }

    public function getdata()
    {
       return  $_GET['id'];
    }

}