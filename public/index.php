<?php

include __DIR__ . '/../application/Configuration/path.php';

$includePath = APPLICATION;
set_include_path($includePath);
require_once SYSTEM . 'autoload.php';
spl_autoload_register($autoloader);

use Summer\Summer;
use Summer\View;

$app = new Summer();
$app->get('/', function() {
    View::render('includes.header');
    View::render('home');
    View::render('includes.footer');
});
$app->get('/about', ['Controller\AboutController', 'index']);
$app->get('/hello', function() {
    echo "<h1>Hello!</h1>";
});
$app->run();
