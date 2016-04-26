<?php
include __DIR__ . '/../application/configuration/path.php';
foreach ([SYSTEM, CONTROLLER, MODEL] as $path) {
    foreach (glob($path . '*.php') as $filename) {
        require_once $filename;
    }
}

$app = new Summer();
$app->get('/', function(){
    echo "<h1>Welcome home!</h1>";
});

$app->get('/home', function(){
    echo "<h1>>Welcome home!</h1>";
});

$app->get('/about', ['AboutController','index']);

$app->run();
