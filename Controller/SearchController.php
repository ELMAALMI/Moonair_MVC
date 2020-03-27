<?php


class SearchController extends Controller
{
    public function getsearchpage()
    {
        $from = (isset($_POST["from-dest"])) ? $_POST["from-dest"] : "";
        $to = (isset($_POST["to-dest"])) ? $_POST["to-dest"] : "";
        $resv_method = (isset($_POST["resv-method"])) ? $_POST["resv-method"] : "";
        $depart = (isset($_POST["pick_from"])) ? $_POST["pick_from"] : "";
        $return = (isset($_POST["pick_to"])) ? $_POST["pick_to"] : "";
        $adults = (isset($_POST["adult-nb"])) ? $_POST["adult-nb"] : "";
        $childs = (isset($_POST["child-nb"])) ? $_POST["child-nb"] : "";

        $your_date = strtotime("-1 day", strtotime($depart));
        $new_date = date("Y-m-d", $your_date);

        $your_date = strtotime("-1 day", strtotime($return));
        $return_date = date("Y-m-d", $your_date);

        $from_code = substr($from,-4, 3);
        $to_code = substr($to,-4, 3);

        $airline = new airlines();

        $airline_info = $airline->testLineWay($from_code, $to_code);

        $ticket = new Ticket($airline_info["line_num"], $airline_info["line_way"]);

        $return_ticket = "";

        if($resv_method == "Return")
        {
            if($airline_info["line_way"] == "forward")
                $return_ticket = new Ticket($airline_info["line_num"], "reverse");
            else
                $return_ticket = new Ticket($airline_info["line_num"], "forward");
        }

        parent::index("Search"
                      ,array('from'=>$from,'to'=>$to,'airline_info'=>$airline_info,
                             'resv_me'=>$resv_method,'ticketobj'=>$ticket,'returnobj'=>$return_ticket,
                             'newdate'=>$new_date,'return_date'=>$return_date,'adults'=>$adults,
                             'childs'=>$childs)
                       ,false);
    }
    
}