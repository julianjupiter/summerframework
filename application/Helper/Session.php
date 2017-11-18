<?php

namespace Helper;

class Session 
{    
    public static function start()
    {
        if(!headers_sent() && !session_id())
        {
            if(session_start())
            {
                session_regenerate_id();
                return true; 
            }
        }
        
        return false; 
    }
    
    public static function get($key, $default = false)
    {
        return (self::has($key)) ? $_SESSION[$key] : $default;
    }
    
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value; 
    }
    
    public static function has($key)
    {
        return array_key_exists($key, $_SESSION);
    }
    
    public static function delete($key)
    {
        if(isset($_SESSION))
        {
            unset($_SESSION[$key]);
        }
    }
    
    public static function destroy()
    {
        if(isset($_SESSION))
        {
            session_destroy();
        }   
    }
}