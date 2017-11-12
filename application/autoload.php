<?php

set_include_path(PATH_APPLICATION);
// set_include_path(__DIR__ . '/../system' . PATH_SEPARATOR . get_include_path());
// echo get_include_path();
$autoloader = function($className) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    include $path;
};

spl_autoload_register($autoloader);