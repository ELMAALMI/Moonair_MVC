<?php
                            /*********************************************
                             *            database configuration
                             * *******************************************/
class DB
{
    /*********************************************
     *            db info
     * *******************************************/

    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    private static $dbName = 'moonair';
    private static $con = null;

    /*********************************************
     *     if we have a proble in th connection
     * *******************************************/

    public function __construct()
    {
        die("we have a problem in the connection");
    }

    /*********************************************
     *     close the connection
     * *******************************************/

    public static function disconect()
    {
        self::$con = null;
    }

    /*********************************************
     *     create a connection
     * *******************************************/

    public static function connection()
    {
        if (self::$con == null) {
            try {
                self::$con = new mysqli(self::$dbHost, self::$dbUsername, self::$dbUserPassword, self::$dbName);

            } catch (Exception $e) {
                echo "error :-> " . $e->getmessage();
            }
        }
        return self::$con;
    }

    /*********************************************
     *     get information from db
     * *******************************************/

    public static function select($query)
    {
        try {
            $result = self::connection()->query($query);
            self::disconect();
            return $result;
        } catch (Exception $e) {
            echo "we have a problem in the select";
        }
    }
}
