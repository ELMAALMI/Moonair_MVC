<?php


class SearchController extends Controller
{
    private $airline ;
    private $ticket ;

    public function getsearchpage()
    {
         $this->airline = new airlines();
        /********************************************
         *  get info from search form post methode
         * *******************************************/
        $postrequest = $this->getrequest();

        /********************************************
         *  test lineway
         * *******************************************/

        $airline_info = $this->airline->testLineWay($postrequest[0], $postrequest[1]);

        /********************************************
         *  Create object from class Ticket
         * *******************************************/

        $this->ticket = new Ticket($airline_info["line_num"], $airline_info["line_way"]);

        /********************************************
         *  display infos
         * *******************************************/

        parent::index("Search",array($this->ticket,$airline_info["line_way"],$postrequest[3]));
    }
    public function getrequest()
    {

        $from = (isset($_GET["from-dest"])) ? $_GET["from-dest"] : "";
        $to = (isset($_GET["to-dest"])) ? $_GET["to-dest"] : "";
        $resv_method = (isset($_GET["resv-method"])) ? $_GET["resv-method"] : "";
        $depart = (isset($_GET["pick_from"])) ? $_GET["pick_from"] : "";
        $return = (isset($_GET["pick_to"])) ? $_GET["pick_to"] : "";
        $adults = (isset($_GET["adult-nb"])) ? $_GET["adult-nb"] : "";
        $childs = (isset($_GET["child-nb"])) ? $_GET["child-nb"] : "";

        $from_code = substr($from,-4, 3);
        $to_code = substr($to,-4, 3);
        return array($from_code,$to_code,$resv_method,$depart,$return,$adults,$childs);
    }
}