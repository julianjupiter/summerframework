<?php

require_once __DIR__ . '/../config/appConfig.php';
require_once __DIR__ . '/../application/autoload.php';

use Core\Application;
use Helper\HttpMethod;
use Helper\Session;

Session::start();

$app = new Application();
$app->get('/', 'Controller\HomeController', 'index');
$app->get('/contacts', 'Controller\ContactController', 'findAll');
$app->get('/contacts/create', 'Controller\ContactController', 'create');
$app->post('/contacts/create', 'Controller\ContactController', 'create');
$app->get('/contacts/view/{num}', 'Controller\ContactController', 'findById');
$app->get('/contacts/update/{num}', 'Controller\ContactController', 'update');
$app->post('/contacts/update', 'Controller\ContactController', 'update');
$app->get('/contacts/delete/{num}', 'Controller\ContactController', 'delete');
$app->run();