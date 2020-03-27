<?php

class UserLocation
{
    private $ip;
    public function __construct()
    {
        if ( !empty($_SERVER['HTTP_CLIENT_IP']) ) 
        {
            // Check IP from internet.
            $ip = $_SERVER['HTTP_CLIENT_IP'];

        } 
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) )
        {
            // Check IP is passed from proxy.
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } 
        else
        {
            // Get IP address from remote address.
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $this->ip = $ip;
    }
    public function getLocation()
    {
        $userinfo = json_decode( file_get_contents( 'http://api.ip2location.com/?ip=105.66.5.76&key=demo&package=WS10&format=json', true ));
        
        return $userinfo->country_name;
    }
}