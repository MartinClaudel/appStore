<?php

/**
 * Database credentials and debug mode status
 */
class Conf{

    
    private static $debug=true;
    private static $db = array(
        "host"=>"localhost",
        "dbname"=>"appstore",
        "psswd"=>"",
        "login"=>"root");
    
    /**
     * Generic getter for credentials
     * @param $key string The parameter to retrieve
     */
    public static function get($key){
        return self::$db[$key];
    }
    
    /**
     * Return server's debug mode status
     * @return boolean
     */
    public static function getDebug(){
        return self::$debug;
    }
   
}
