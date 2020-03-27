<?php

class Ticket
{
   
    private $all_flight;
    
    public function __construct($line_num, $line_way)
    {
        try
        {
            if($line_way == "forward")
                $this->all_flight = DB::select("SELECT *, airp1.airport_code as airp_code_from, airp2.airport_code as airp_code_to, airp1.airport_name as airp_from, airp2.airport_name as airp_to, airp1.city as from_city, airp2.city as to_city, airp1.country as from_country, airp2.country as to_country ,DATE_FORMAT(flight.depart_date, '%Y-%m-%d') as dateformat, DATE_FORMAT(flight.depart_date, '%H:%i') as timeformat_dept, DATE_FORMAT(flight.arrival_date, '%H:%i') as timeformat_arriv, DATE_FORMAT(SEC_TO_TIME(TIMESTAMPDIFF(SECOND, flight.depart_date, flight.arrival_date)), '%H h %i m') as flight_timing,ROUND((line.price + (line.price * flight.price_pct/100)), 2) as new_price  FROM flight INNER JOIN line ON flight.LINE_NUM = line.LINE_NUM INNER JOIN airports airp1 ON line.AIRPORT_CODE = airp1.AIRPORT_CODE INNER JOIN airports airp2 ON line.airport_code_st = airp2.airport_code WHERE flight.line_num = $line_num AND flight.way = '$line_way'");
            
            else
                $this->all_flight = DB::select("SELECT *, airp1.airport_code as airp_code_to, airp2.airport_code as airp_code_from, airp1.airport_name as airp_to, airp2.airport_name as airp_from, airp1.city as to_city, airp2.city as from_city, airp1.country as to_country, airp2.country as from_country ,DATE_FORMAT(flight.depart_date, '%Y-%m-%d') as dateformat, DATE_FORMAT(flight.depart_date, '%H:%i') as timeformat_dept, DATE_FORMAT(flight.arrival_date, '%H:%i') as timeformat_arriv, DATE_FORMAT(SEC_TO_TIME(TIMESTAMPDIFF(SECOND, flight.depart_date, flight.arrival_date)), '%H h %i m') as flight_timing,ROUND((line.price + (line.price * flight.price_pct/100)), 2) as new_price  FROM flight INNER JOIN line ON flight.LINE_NUM = line.LINE_NUM INNER JOIN airports airp1 ON line.AIRPORT_CODE = airp1.AIRPORT_CODE INNER JOIN airports airp2 ON line.airport_code_st = airp2.airport_code WHERE flight.line_num = $line_num AND flight.way = '$line_way'");
                
        }catch(Exception $e)
        {
            echo "Select failed";
        }
    }
    
    public function getallflight()
    {
        return $this->all_flight;
    }
    
    public function getFlight($flight_num)
    {
        $result = array();
        foreach($this->all_flight as $row)
        {
            if($row["flight_num"] == $flight_num)
                array_push($result, $row);
        }
        return $result;
    }
    
    public function testDate($date)
    {
        $result = array();
        foreach($this->all_flight as $row)
        {
            if($row["dateformat"] == $date)
                //$result = [ "flight_num" => $row["flight_num"], "line_num" => $row["line_num"], "way" => $row["way"], "price" => $row["new_price"]];
                $result = $row;
        }
        return $result;
    }
    
    public function daysUp($date)
    {
        $result = array();
        $your_date = strtotime("1 day", strtotime($date));
        $new_date = date("Y-m-d", $your_date);

        array_push($result, $new_date);

        for($i=0; $i<5; $i++)
        {
            $your_date = strtotime("1 day", strtotime($new_date));
            $new_date = date("Y-m-d", $your_date);
            array_push($result, $new_date);
        }
        return $result;
    }
    
    public function daysDown($date)
    {
        $result = array();
        $your_date = strtotime("-1 day", strtotime($date));
        $new_date = date("Y-m-d", $your_date);

        array_push($result, $new_date);
        
        for($i=0; $i<5; $i++)
        {
            $your_date = strtotime("-1 day", strtotime($new_date));
            $new_date = date("Y-m-d", $your_date);
            array_push($result, $new_date);
        }
        return array_reverse($result);
    }
    
    public function formatDate($date)
    {
        $result = array();
        
        $time=strtotime($date);
        $month=date("F",$time);
        $day_digit=date("d",$time);
        $day=date("l",$time);
        
        $result = [ "day_week" => $day, "day_digit" => $day_digit, "month" => $month];
        
        return $result;
    }
    
    public function generateTicket($flight, $method)
    {
        foreach($this->getallflight() as $row)
        {
            if($row["flight_num"] == $flight)
            {
                $result = $row; break;
            }
        }
        
        echo '<div class="ticket-center"  onclick="confirmeTicket'.$method.'()">
                <div class="ticket-form">
                    <div class="departure">
                        <div class="country">
                            <img src="assets/imgs/countries/'.$result["from_country"].'.png">
                        </div>
                        <div class="airport">
                            <p class="time">'.$result["timeformat_dept"].'</p>
                            <p class="airp">'.$result["airp_from"].'</p>
                            <p class="city">'.$result["from_city"].'</p>
                        </div>
                    </div>
                    <div class="timing">
                        <div class="icon-timing">
                            <i class="fa fa-plane-departure"></i>
                            <p class="flight-time">'.$result["flight_timing"].'</p>
                        </div>
                    </div>
                    <div class="arrival">
                        <div class="airport">
                            <p class="time">'.$result["timeformat_arriv"].'</p>
                            <p class="airp">'.$result["airp_to"].'</p>
                            <p class="city">'.$result["to_city"].'</p>
                        </div>
                        <div class="country">
                            <img src="assets/imgs/countries/'.$result["to_country"].'.png">
                        </div>
                    </div>
                </div>
                <div class="ticket-price">
                    <span class="price">$'.$result["new_price"].'</span><br>
                    <button type="submit">Reserve</button>
                </div>
            </div>
            <div class="btn_close" id="hide-ticket" onclick="hideTicket(\''.$method.'\');"><i class="fa fa-times"></i></div>
        </div>';
    }

    
    public function DisplayDays($result, $method)
    {
        $row = $this->testDate($result[0]);
        
        $new_format = $this->formatDate($result[0]);
        
        if(count($this->testDate($result[0])) == 0)
        {
            echo '<div class="available-days">
                    <div class="grid">
                        <p id="first_row'.$method.'" style="display: none">'.$result[0].'</p>
                        <p>'.$new_format["day_digit"].' '.$new_format["month"].'<br>'.$new_format["day_week"].'</p>
                        <img src="assets/imgs/Icon/airplaneoff.png"> 
                    </div>
                    </div>';
        }
        else
        {
            echo '<div class="available-days" id="flight-'.$row["flight_num"].'" style="cursor: pointer;" onclick="flightDetails('.$row["flight_num"].',\''.$method.'\')">
                    <div class="grid">
                        <p id="first_row'.$method.'" style="display: none">'.$result[0].'</p>
                        <p id="flight_num" style="display: none">'.$row["flight_num"].'</p>
                        <p>'.$new_format["day_digit"].' '.$new_format["month"].'<br>'.$new_format["day_week"].'</p>
                        <h3>$'.$row["new_price"].'</h3> 
                    </div>
                    </div>';
        }

        
        for($i=1; $i<count($result)-1; $i++)
        {
            $row = $this->testDate($result[$i]);
            $new_format = $this->formatDate($result[$i]);
            if(count($this->testDate($result[$i])) == 0)
            {
                echo '<div class="available-days">
                    <div class="grid">
                        <p style="display: none">'.$result[$i].'</p>
                        <p>'.$new_format["day_digit"].' '.$new_format["month"].'<br>'.$new_format["day_week"].'</p>
                        <img src="assets/imgs/Icon/airplaneoff.png"> 
                    </div>
                    </div>';
            }
            else
            {
                echo '<div class="available-days" id="flight-'.$row["flight_num"].'" style="cursor: pointer;" onclick="flightDetails('.$row["flight_num"].', \''.$method.'\')">
                    <div class="grid">
                        <p style="display: none">'.$result[$i].'</p>
                        <p id="flight_num" style="display: none">'.$row["flight_num"].'</p>
                        <p>'.$new_format["day_digit"].' '.$new_format["month"].'<br>'.$new_format["day_week"].'</p>
                        <h3>$'.$row["new_price"].'</h3> 
                    </div>
                    </div>';
            }
        }
        
        $row = $this->testDate($result[count($result)-1]);
        $new_format = $this->formatDate($result[count($result)-1]);

        if(count($this->testDate($result[count($result)-1])) == 0)
        {
            echo '<div class="available-days">
                    <div class="grid">
                        <p id="last'.$method.'" style="display: none">'.$result[count($result)-1].'</p>
                        <p>'.$new_format["day_digit"].' '.$new_format["month"].'<br>'.$new_format["day_week"].'</p>
                        <img src="assets/imgs/Icon/airplaneoff.png"> 
                    </div>
                    </div>';
        }
        else
        {
            echo '<div class="available-days last-grid" id="flight-'.$row["flight_num"].'" style="cursor: pointer;" onclick="flightDetails('.$row["flight_num"].', \''.$method.'\')">
                    <div class="grid">
                        <p id="last'.$method.'" style="display: none">'.$result[count($result)-1].'</p>
                        <p id="flight_num" style="display: none">'.$row["flight_num"].'</p>
                        <p>'.$new_format["day_digit"].' '.$new_format["month"].'<br>'.$new_format["day_week"].'</p>
                        <h3>$'.$row["new_price"].'</h3> 
                    </div>
                    </div>';
        }
    }

}