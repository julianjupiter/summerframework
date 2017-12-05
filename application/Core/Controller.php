<?php

namespace Core;


use Helper\Request;
use Core\View;
use Core\Model;

class Controller
{
    protected $request;
    protected $view;
    protected $model;

    public function __construct(Model $model = NULL)
    {
        $this->request = new Request();
        $this->view = new View();
        if (NULL !== $model) 
        {
            $this->model = new $model();
        }
    }
}