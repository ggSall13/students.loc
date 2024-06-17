<?php

namespace Controllers;

use Core\Controller;
use stdClass;

class AccountController extends Controller
{
   public function registerAction()
   {
      $error = '';
      if (!empty($_POST)) {
         if ($this->model->validateReg($_POST)) {
            $error .= $this->model->error;
         } elseif ($this->model->isEmailExists($_POST['email'], 'reg')) {
            $error .= $this->model->error;
         } else {
            $this->model->register($_POST);
            header('Location: /login');
         }
      }
      $title = 'Регистрация';
      require ACCOUNT . '/register.php';
   }

   public function loginAction()
   {
      $error = '';
      if (!empty($_POST)) {
         if ($this->model->checkLogin($_POST['email'], $_POST['password'])) {
            $error .= $this->model->error;
         }
         header('Location: /profile');
      }
      $title = 'Логин';
      require ACCOUNT . '/login.php';
   }

   public function profileAction()
   {
      if (!isset($_COOKIE['account'])) {
         header('Location: /register');
      }
      $account = json_decode($_COOKIE['account']);
      $error = '';
      $title = 'Профиль';
      require ACCOUNT . '/profile.php';
   }
}
