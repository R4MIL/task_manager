<?php

spl_autoload_register(function($class) {
    include './' . str_replace('task_manager/','',str_replace('\\', '/', $class)) . '.php';
});

use task_manager\Router\Dispatcher;

include './Router/Web.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$dispatcher = new Dispatcher($requestMethod, $requestUri);
$dispatcher->dispatch();
