<?php

namespace Controller;

use Core\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->view->setAttribute('applicationName', APPLICATION_NAME);
        $this->view->setAttribute('pageName', 'Home');
        $this->view->render('home');
    }
}