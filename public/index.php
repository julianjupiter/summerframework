<?php

require_once __DIR__ . '/../config/appConfig.php';
require_once __DIR__ . '/../application/autoload.php';

use Core\Application;
use Helper\HttpMethod;

$app = new Application();

$app->addRoute(HttpMethod::GET, '/', 'Controller\HomeController', 'index');
$app->addRoute(HttpMethod::GET, '/contacts', 'Controller\ContactController', 'findAll');
$app->addRoute(HttpMethod::GET, '/contacts/create', 'Controller\ContactController', 'create');
$app->addRoute(HttpMethod::POST, '/contacts/create', 'Controller\ContactController', 'create');
$app->addRoute(HttpMethod::GET, '/contacts/view/{num}', 'Controller\ContactController', 'findById');
$app->addRoute(HttpMethod::GET, '/contacts/update/{num}', 'Controller\ContactController', 'update');
$app->addRoute(HttpMethod::POST, '/contacts/update', 'Controller\ContactController', 'update');
$app->addRoute(HttpMethod::GET, '/contacts/delete/{num}', 'Controller\ContactController', 'delete');

$app->run();