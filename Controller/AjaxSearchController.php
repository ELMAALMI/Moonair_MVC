<?php


class AjaxSearchController extends Controller
{
    public function getinfo()
    {
        if( isset( $_GET['tr'] ) )
        {
            $this->travelsearch();
        }
        elseif(isset( $_GET['nationality'] )&&$_GET['nationality'] == 'true')
        {
            $var = new flight();
            print_r($var->randomflight(12,''));
    
        }
        else
        {
            $var = new airports();
            $var->getinfo();
        }
    }
    public function travelsearch()
    {
        if(isset($_GET["flight"]))
        {
            $ticket = new Ticket($_GET["line_num"], $_GET["line_way"]);
            $ticket->generateTicket($_GET["flight"], $_GET["method"]);
        }
        
        
        if(isset($_GET["key"]))
        {
            if($_GET["way"] == "next")
            {
                $ticket = new Ticket($_GET["line_num"], $_GET["line_way"]);
                $ticket->DisplayDays($ticket->daysUp($_GET["key"]), $_GET["method"]);
            }
            if($_GET["way"] == "prev")
            {
                $ticket = new Ticket($_GET["line_num"], $_GET["line_way"]);
                $ticket->DisplayDays($ticket->daysDown($_GET["key"]),$_GET["method"]);
            }
        }
    }

}