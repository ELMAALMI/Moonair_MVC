<?php

class flight extends Modul
{
    // all flight
    private  $all_flight;
    private  $all_line;
   
    public function __construct()
    {
        try
        {
            $this->all_flight = DB::select("SELECT * FROM line INNER JOIN airports a1 on line.airport_code = a1.airport_code INNER JOIN airports a2 on line.airport_code_st = a2.airport_code INNER JOIN flight on line.line_num = flight.line_num");
            $this->all_line   = DB::select("SELECT * FROM line INNER JOIN airports a1 on line.airport_code = a1.airport_code INNER JOIN airports a2 on line.airport_code_st = a2.airport_code");
        }catch(Exception $e)
        {
            echo "failed in the construct of flight";

        }
    }
    public function like($pattern, $subject)
    {
        $pattern = str_replace('%', '.*', preg_quote($pattern, '/'));
        return (bool) preg_match("/^{$pattern}$/i", $subject);
    }

    public function flightsearch($key)
    {
        $result = array();
        if($key != '')
        {
            foreach ($this->all_flight as $flight)
            {
                if($this->like("%".$key."%",$flight['city'])!= false)
                {
                    array_push($result,$flight['city']);
                }
            }
        }
        else
        {
            foreach ($this->all_flight as $flight)
            {
                array_push($result,$flight['city']);
            }
        }
        return $result;
    }

    public function getallflight()
    {
        return $this->all_flight;
    }

    public function getflight($id)
    {
        $flight = '' ;
        foreach($this->all_flight as $fly)
        {
            if($fly['FLIGHT_NUM']==$id)
            {
                $flight = $fly;
            }
        }
        return $flight;
    }

    public function getoffre($limit)
    {
        $flight = array();
        foreach($this->all_flight as $fly)
        {
            if($fly['price']<=$limit )
            {
                $flight[] = $fly;
            }
        }
        return $flight;
    }



}
