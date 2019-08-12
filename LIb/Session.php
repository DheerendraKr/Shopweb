<?php
class Session 
{
    function __construct() 
    {
       // @session_start();
    }
    public static function init()
    {
        @session_start();
    }
    public static function set($key,$value)
    {
        $_SESSION[$key]=$value;
    }
    public static function get($key)
    {
        if(isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }
        else
        {
            $var="no value found";
            return $var;
        }
    }
    public static function destroy()
    {
        session_destroy();
    }

}
?>