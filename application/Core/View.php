<?php

namespace Core;

class View 
{
    private $attributes = [];
    
    public function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;    
    }
    
    public function redirect($value='')
    {
        if ($value != null)
        {
            header('Location: ' . $value);   
        }
    }
    
    public function render($template) 
    {
        if (!is_null($this->attributes)) 
        {
            extract($this->attributes);
        }        
        
        $file = PATH_VIEW . $template . '.php';
        if (file_exists($file))
        {
            include_once $file;
        } 
        else
        {
            include_once PATH_VIEW . 'errors/fileNotFound.php';
        }
    }

}