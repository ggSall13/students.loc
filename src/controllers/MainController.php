<?php

namespace Controllers;

use Core\Controller;

class MainController extends Controller
{
   public function mainAction()
   {
      $title = 'Главная';
      require MAIN . '/main.php';
   }
}
