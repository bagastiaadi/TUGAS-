<?php

spl_autoload_register(function($class){
    $path1 = __DIR__ . '/../class/' . $class . '.php';
    if (file_exists($path1)) require_once $path1;
});

define('DB_HOST', 'localhost');
define('DB_NAME', 'tugas1');
define('DB_USER', 'root');
define('DB_PASS', ''); 
