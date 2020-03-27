<?php

use Pdfcrowd\HtmlToPdfClient;

class pdfgenerate
{
    private $var ;
    public function __construct()
    {
        $this->var = new HtmlToPdfClient("demo","0sdf012sdf32s13d2f13sdf2s3d5f8sdf35f5");
    }
    public function convert($titre,$url)
    {
        try
        {
         $this->var->convertUrlToFile($url,$titre);
        }catch(Exception $e)
        {
            print_r($e);
        }
    }
}