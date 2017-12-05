<?php

namespace Helper;

class Input
{
    public function get($name)
    {
        return isset($_GET[$name]) ? $_GET[$name] : NULL;
    }
    
    public function post($name)
    {
        return isset($_POST[$name]) ? $_POST[$name] : NULL;
    }
}