<?php

namespace Core;

abstract class Controller
{
   protected $route;
   private $acl;
   protected $model;

   public function __construct($route)
   {
      $this->route = $route;
      $this->model = $this->loadModel();

      if (!$this->checkAsl()) {
         $this->showError(404);
      }
   }

   public function loadModel()
   {
      $path = 'Models\\' . ucfirst($this->route['controller']);

      if (class_exists($path)) {
         return new $path;
      }
   }

   public function checkAsl()
   {
      if ($this->isAsl('all')) {
         return true;
      } elseif (isset($_COOKIE['account']) && $this->isAsl('register')) {
         return true;
      }
      return false;
   }

   public function isAsl($key)
   {
      $this->acl = require CONFIG . '/acl.php';
      return in_array($this->route['action'], $this->acl[$key]);
   }

   public function showError($code)
   {
      http_response_code($code);
      require VIEWS . '/errors/' . $code . '.php';
      die();
   }
}
