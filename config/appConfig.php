<?php

define('APPLICATION_NAME', 'Summer Framework');

$configs = [
    'path' => [
        'PATH_APPLICATION' => __DIR__ . '/../application/',
        'PATH_VIEW' => __DIR__ . '/../application/View/'
    ],

    'address' => [
        'DB_TYPE' => 'mysql',
        'DB_HOST' => 'localhost',
        'DB_PORT' => '3306',
        'DB_NAME' => 'summerframework',
        'DB_USER' => 'root',
        'DB_PASSWORD' => 'admin',
        'DB_CHAR_SET' => 'utf-8'
    ]
];

foreach ($configs as $config) {
    foreach ($config as $key => $value) {
        define($key, $value);
    }
}