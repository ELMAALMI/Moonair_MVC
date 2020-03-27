<?php

class airports
{
    private $all_airports;
    private $possible_dest;
    
    public function __construct()
    {
        try
        {
            $this->all_airports = DB::select("SELECT * FROM AIRPORTS");
        }catch(Exception $e)
        {
            echo "we have a problem "+$e;
        }
    }
    
    public function getAll()
    {
        return $this->all_airports;
    }
    
    public function getPossible()
    {
        return $this->possible_dest;
    }
    
    function like_match($pattern, $subject)
    {
        $pattern = str_replace('%', '.*', preg_quote($pattern, '/'));
        return (bool) preg_match("/^{$pattern}$/i", $subject);
    }
    
    public function getAirports($keyword)
    {
        try
        {
            $result = array();
            foreach($this->getAll() as $row)
            {
                $word = '%'.strtolower($keyword).'%';
                $airport_code = strtolower($row["airport_code"]);
                $airport_name = strtolower($row["airport_name"]);
                $city = strtolower($row["city"]);
                $country = strtolower($row["country"]);
                $continent = strtolower($row["continent"]);
                
                if($this->like_match($word, $airport_code) || $this->like_match($word, $airport_name) || $this->like_match($word, $city)
                  || $this->like_match($word, $country) || $this->like_match($word, $continent))
                {
                    array_push($result, $row);
                }
            }
            return $result;
            
        }catch(Exception $e)
        {
            echo "we have a problem "+$e;
        }
     }
    
    public function getDestinations($from)
    {
        try
        {
            $code = substr($from,-4, 3);
            $result = array();
            
            $destDirect = DB::select("SELECT *, airports.airport_code as destinations FROM line INNER JOIN airports ON line.airport_code = '$code' AND line.airport_code_st = airports.airport_code");
            
            $destIndirect = DB::select("SELECT *, airports.airport_code as destinations FROM line INNER JOIN airports ON line.airport_code_st = '$code' AND line.airport_code = airports.airport_code");
            
            foreach($destDirect as $row)
                array_push($result, $row);
            
            foreach($destIndirect as $row)
                array_push($result, $row);
            
            $this->possible_dest = $result;;
            
        }catch(Exception $e)
        {
            echo "we have a problem "+$e;
        }
    }
    
    public function getDestinationsKeyword($keyword)
    {
        try
        {
            $result = array();
            foreach($this->getPossible() as $row)
            {
                $word = '%'.strtolower($keyword).'%';
                $airport_code = strtolower($row["destinations"]);
                $airport_name = strtolower($row["airport_name"]);
                $city = strtolower($row["city"]);
                $country = strtolower($row["country"]);
                $continent = strtolower($row["continent"]);
                
                if($this->like_match($word, $airport_code) || $this->like_match($word, $airport_name) || $this->like_match($word, $city)
                  || $this->like_match($word, $country) || $this->like_match($word, $continent))
                {
                    array_push($result, $row);
                }
            }
            return $result;
            
        }catch(Exception $e)
        {
            echo "we have a problem "+$e;
        }
     }

    function DisplayRows($result)
    {
        if(count($result) == 0)
        {
            echo '<div class="alert alert-danger"><b>Ops Sorry!</b> There is no airport.</div>';
        }
        else
        {   
            foreach($result as $row)
            {
                echo '<tr><td>'.$row["airport_code"].'</td>
                        <td>'.$row["airport_name"].'</td>
                        <td>'.$row["city"].'</td>
                        <td><img src="imgs/countries/'.$row["country"].'.png" style="width: 25px;"></td>
                        <td>'.$row["country"].'</td>
                        <td><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-xs" onclick="DeleteRow(\''.$row["airport_code"].'\', \'airports\'); ShowMsg();"><i class="fa fa-trash"></i></button>
                        </td></tr>';
            }
        }
    }
    
    function showDest($result)
    {
        if($result == "")
            echo "";
        else
        {
            if(count($result) == 0)
                echo '<p><i class="fa fa-exclamation-triangle"></i> City not found </p>';
            else
            {
                foreach($result as $row)
                {
                    echo '<li><i class="fa fa-plane"></i> '.$row["city"].' ('.$row["airport_code"].')</li>';
                }
            }
        }
    }
    
    function showPossibleDest($result)
    {
        if($result == "")
            echo "";
        else
        {
            if(count($result) == 0)
                echo '<p><i class="fa fa-exclamation-triangle"></i> City not found </p>';
            else
            {
                foreach($result as $row)
                {
                    echo '<li><i class="fa fa-plane"></i> '.$row["city"].' ('.$row["destinations"].')</li>';
                }
            }
        }
    }
        
    public function delAirport($code)
    {
        try
        {
            DB::select("DELETE FROM AIRPORTS WHERE airport_code = '$code'");
        }catch(Exception $e)
        {
            echo "we have a problem "+$e;
        }
    }
    public function getinfo()
    {

        if(isset($_GET["key"]))
        {
            $this->DisplayRows($this->getAirports($_GET["key"]));
        }

        if(isset($_GET["id"]))
        {
            $this->delAirport($_GET["id"]);
            $new = new airports();
            $this->DisplayRows($new->getAll());
        }

        if(isset($_GET["fromairp"]) && !isset($_GET["toairp"]))
        {
            if($_GET["fromairp"] != "none")
                $this->showDest($this->getAirports($_GET["fromairp"]));
            else
                $this->showDest("");
        }

        if(isset($_GET["fromairp"]) && isset($_GET["toairp"]))
        {
            if($_GET["toairp"] != "none")
            {
                $this->getDestinations($_GET["fromairp"]);
                $this->showPossibleDest($this->getDestinationsKeyword($_GET["toairp"]));
            }
            else
                $this->showPossibleDest("");
        }
    }

    public function getnationality()
    {
        $tab = [];
        foreach (DB::select("SELECT distinct country from airports") as $ls)
        {
            array_push($tab,$ls);
        }
        return json_encode($tab);
    }
}

    
?>