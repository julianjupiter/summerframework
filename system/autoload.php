<?php

set_include_path(SYSTEM . PATH_SEPARATOR . get_include_path());
$autoloader = function($className) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    include $path;
};
