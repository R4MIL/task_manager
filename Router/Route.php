<?php

namespace task_manager\Router;

class Route {

  public static $routes = array();

  public static function addRoute($method, $route, $action) {
    self::$routes[$method][$route] = $action;
  }

  public static function get($route, $action) {
    self::addRoute('GET', $route, $action);
  }

  public static function post($route, $action) {
    self::addRoute('POST', $route, $action);
  }

}
?>