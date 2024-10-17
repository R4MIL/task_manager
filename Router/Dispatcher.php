<?php

namespace task_manager\Router;

use task_manager\Router\Route;

class Dispatcher {
  private $requestMethod;
  private $requestUri;

  public function __construct($requestMethod, $requestUri) {
    $this->requestMethod = $requestMethod;
    $this->requestUri = $requestUri;
  }

  public function dispatch() {
    foreach (Route::$routes[$this->requestMethod] as $route => $action) {
      if ($route === $this->requestUri) {
        return $this->executeAction($action);
      }
    }

    http_response_code(404);
    echo '404 Not Found';
  }

  private function executeAction($action) {
        if (is_callable($action)) {
            return $action();
        }

        if (is_array($action)) {
            list($controller, $method) = $action;
        } elseif (class_exists($action)) {
            $controller = $action;
        } else {
            list($controller, $method) = explode('@', $action);
        }

       

        if ($this->requestMethod == 'GET') {
            $payload = $_GET;
        } else {
            $payload = $_POST;
        }
     
        $controller = new $controller;
        if (!empty ($method)) {
            return $controller->$method(...$payload);
        }
        return $controller();
    }
}