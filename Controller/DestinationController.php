<?php


class DestinationController extends Controller
{
    public function getdestination()
    {   $var  = new flight();
        $data = []; 
        $num  = 1; 
        if(isset($_GET['pagenum']) && !empty($_GET['pagenum']))
        {
             $num = $_GET['pagenum'];
        }
        
        $data = $var->pagination($num);

        parent::index('destination',array("flight"=>$data[0],"numpage"=>$data[1],"pagenum"=>$num));
    }

}