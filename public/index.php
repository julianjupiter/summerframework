<?php

require_once __DIR__ . '/../config/appConfig.php';
require_once __DIR__ . '/../application/autoload.php';

use Core\Application;

$app = new Application();

$app->addRoute('GET', '/', 'Controller\HomeController', 'index');
$app->addRoute('GET', '/contacts', 'Controller\ContactController', 'findAll');
$app->addRoute('GET', '/contacts/create', 'Controller\ContactController', 'create');
$app->addRoute('POST', '/contacts/create', 'Controller\ContactController', 'create');
$app->addRoute('GET', '/contacts/view/{num}', 'Controller\ContactController', 'findById');
$app->addRoute('GET', '/contacts/update/{num}', 'Controller\ContactController', 'update');
$app->addRoute('POST', '/contacts/update', 'Controller\ContactController', 'update');
$app->addRoute('GET', '/contacts/delete/{num}', 'Controller\ContactController', 'delete');

$app->run();