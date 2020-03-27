<?php

class airlines
{
    private $all_lines;
    private $airlines;
    
    public function __construct()
    {
        try
        {
            $this->all_lines = DB::select("SELECT line_num, a1.airport_name as airp1, a2.airport_name as airp2, price FROM LINE INNER JOIN airports `a1` ON line.airport_code = a1.airport_code INNER JOIN Airports `a2` ON line.airport_code_st = a2.airport_code");
            $this->airlines = DB::select("SELECT * FROM LINE");
        }catch(Exception $e)
        {
            echo "we have a problem "+$e;
        }
    }
    public function airlines_request()
    {
        if(isset($_GET["key"]))
        {
            $this->DisplayRows($this->getLine($_GET["key"]));
        }

        if(isset($_GET["id"]))
        {
            $this->delLine($_GET["id"]);
            $this->DisplayRows($this->getAll());
        }
    }

    public function getAll()
    {
        return $this->all_lines;
    }
    
    public function getLinesCode()
    {
        return $this->airlines;
    }
    
    public function testLineWay($from, $to)
    {
        foreach($this->getLinesCode() as $row)
        {
            if($from == $row["airport_code"] && $to == $row["airport_code_st"])
                return ["line_way" => "forward", "line_num" => $row["line_num"]];
            if($from == $row["airport_code_st"] && $to == $row["airport_code"])
                return ["line_way" => "reverse", "line_num" => $row["line_num"]];
        }
    }
    
    function like_match($pattern, $subject)
    {
        $pattern = str_replace('%', '.*', preg_quote($pattern, '/'));
        return (bool) preg_match("/^{$pattern}$/i", $subject);
    }
    
    public function getLine($keyword)
    {
        try
        {
            $result = array();
            foreach($this->getAll() as $row)
            {
                $word = '%'.strtolower($keyword).'%';
                $line_num = strtolower($row["line_num"]);
                $airp1 = strtolower($row["airp1"]);
                $airp2 = strtolower($row["airp2"]);
                
                if($this->like_match($word, $line_num) || $this->like_match($word, $airp1) || $this->like_match($word, $airp2))
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
    
    public function delLine($line)
    {
        try
        {
            DB::select("DELETE FROM LINE WHERE line_num = $line");
        }catch(Exception $e)
        {
            echo "we have a problem "+$e;
        }
    }
    
    function DisplayRows($result)
    {
        if(count($result) == 0)
        {
            echo '<div class="alert alert-danger"><b>Ops Sorry!</b> There is no airlines.</div>';
        }
        else
        {   
            foreach($result as $row)
            {
                echo '<tr><td>'.$row["line_num"].'</td>
                        <td>'.$row["airp1"].'</td>
                        <td>'.$row["airp2"].'</td>
                        <td>$ '.$row["price"].'</td>
                        <td><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash" onclick="DeleteRow('.$row["line_num"].', \'airlines\'); ShowMsg();"></i></button>
                        </td></tr>';
            }
        }
    }
    
}
    
?>