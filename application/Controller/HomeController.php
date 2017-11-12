<?php

namespace Controller;

use Core\View;

class HomeController
{
    public function __construct()
    {
        $this->view = new View();
    }
    
    public function index()
    {
        $this->view->setAttribute('applicationName', APPLICATION_NAME);
        $this->view->setAttribute('pageName', 'Home');
        $this->view->render('home');
    }
}