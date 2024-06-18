<?php

// namespace Core;

// class Router
// {
/*    public $routes;

   public function __construct()
   {
      $arr = require CONFIG . '/routes.php';
      foreach ($arr as $k => $v) {
         $this->add($k, $v);
      }
   }

   private function add($route, $params)
   {
      $route = '#^' . $route . '$#';
      $this->routes[$route] = $params;
   }

   public function run()
   {
      $uri = $_GET['page'] ?? trim($_SERVER['REQUEST_URI'], '/');
      foreach ($this->routes as $route => $params) {
         if (preg_match($route, $uri, $matches)) {
            array_shift($matches);

            $controller = "Controllers\\" . ucfirst($this->routes[$uri]['controller']) . 'Controller';
            $action = $this->routes[$uri]['action'] . 'Action';

            if (class_exists($controller) && method_exists($controller, $action)) {
               $class = new $controller($this->routes[$uri]);
               $class->$action();
            }
         }
      }
   } 
} */

namespace Core;

class Router
{
   protected $routes = [];
   protected $params = [];

   public function __construct()
   {
      $arr = require CONFIG . '/routes.php';
      foreach ($arr as $k => $v) {
         $this->add($k, $v);
      }
   }

   public function add($route, $params)
   {
      $route = '#^' . $route . '$#';
      $this->routes[$route] = $params;
   }

   public function match()
   {
      $uri = trim($_SERVER['REQUEST_URI'], '/');

      foreach ($this->routes as $route => $params) {
         if (preg_match($route, $uri, $matches)) {
            foreach ($matches as $key => $match) {
               if (!is_int($key)) {
                  $params[$key] = $match;
               }
            }
            $this->params = $params;
            return true;
         }
      }
      return false;
   }

   public function run()
   {
      if ($this->match()) {
         $class = 'Controllers\\' . ucfirst($this->params['controller']) . 'Controller';
         $action = $this->params['action'] . 'Action';

         if (class_exists($class) && method_exists($class, $action)) {
            $controller = new $class($this->params);
            $controller->$action();
         }
      }
   }
}
