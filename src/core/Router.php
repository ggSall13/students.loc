<?php

namespace Core;

class Router
{
   public $routes;

   public function __construct()
   {
      $arr = require CONFIG . '/routes.php';
      foreach ($arr as $k => $v) {
         $this->add($k, $v);
      }
   }

   private function add($route, $params)
   {
      $this->routes[$route] = $params;
   }

   public function run()
   {
      $uri = $_GET['page'] ?? trim($_SERVER['REQUEST_URI'], '/');

      if ($this->routes[$uri]) {
         $controller = "Controllers\\" . ucfirst($this->routes[$uri]['controller']) . 'Controller';
         $action = $this->routes[$uri]['action'] . 'Action';

         if (class_exists($controller) && method_exists($controller, $action)) {
            $class = new $controller($this->routes[$uri]);
            $class->$action();
         }
      }
   }
}
