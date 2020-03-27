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
    public function getallline()
    {
      return $this->all_line;
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

    public function getoffre($limit = 4)
    {

        $flight = [];
        
        foreach($this->getallline() as $tab1)
        {
            $test = $this->testflight($tab1['line_num'] );
            if(count($flight) == 4){break;}
            
            if($test['etat'] != 0)
            {
                $tab1['price_pct'] = $test['price_pct'];
                array_push($flight,$tab1);
            }
        }
        return $flight;
    }
    public function testflight($num)
    {
        $etat = 0;
        $price = null;
        foreach($this->getallflight() as $tab2)
        {
            
            if($tab2['line_num'] == $num)
            {
                $etat = 1;
                $price = $tab2['price_pct'];
                break;
            }
        }
        return  array("etat"=>$etat,"price_pct"=>$price);
    }

    public function pagination($pagenum)
    {
        $tab = [];
        $result = [];
        foreach($this->all_line as $ls)
        {
            array_push($tab,$ls);
        }
        $numofflight = 12;
        $total_rows = count($tab);
        $total_pages = ceil($total_rows / $numofflight); 
        if($pagenum <= $total_pages)
        {
            if($pagenum == 1)
            {
                $limit = $numofflight;
                $de    = 0 ;
            }
            elseif($pagenum == $total_pages)
            {
                $limit = $total_rows;
                $de    = $total_rows - $numofflight;
            }
            else
            {
                $limit = $pagenum * $numofflight;
                $de    = $limit - $numofflight; 
            }
            for ($i= $de ; $i < $limit ; $i++)
            { 
               array_push($result,$tab[$i]);
            }
            return array($result,$total_pages);
        }
        else
        {
            return "no data found";

        }

    }
    public function randomflight($num,$country)
    {
        $tab = [];
        $result = [];
        foreach($this->all_line as $ls)
        {
            array_push($tab,$ls);
        }
        $total_rows = count($tab);

        for ($i=0;; $i++)
        { 
            $index =  rand(0,$total_rows-1);
            if($tab[$index]['country'] != $country)
            {
             array_push($result,$tab[$index]);
            }
            if(count($result) == $num)
                break;
        }
        return $result;
    }

}
