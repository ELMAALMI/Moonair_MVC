<?php


class flight
{
    // all flight
    private  $id;
    private  $from;
    private  $to;
    private  $price;
    private  $wallpaper;
    private  $way ;

    public function __construct($id,$from,$to,$price, $wallpaper,$way)
    {
        $this->id        = $id ;
        $this->from      = $from ;
        $this->to        = $to   ;
        $this->price     = $price;
        $this->wallpaper = $wallpaper;
        $this->way       = $way ;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return mixed
     */
    public function getWay()
    {
        return $this->way;
    }
    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getWallpaper()
    {
        return $this->wallpaper;
    }



}