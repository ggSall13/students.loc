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
      $error = '';
      if (!isset($_COOKIE['account'])) {
         header('Location: /register');
      }

      if (!empty($_POST)) {
         if ($this->model->validateFieldsProfile($_POST['name'], $_POST['lastName'])) {
            $error .= $this->model->error;
         } else {
            $this->model->updateProfile($_POST, $this->getCookieAccount()->id);
            header('Location: /profile');
         }
      }

      $account = $this->getCookieAccount();
      $title = 'Профиль';
      require ACCOUNT . '/profile.php';
   }

   public function logoutAction()
   {
      setcookie('account', '', time() - 3600, '/');
      header('Location: /');
   }

   private function getCookieAccount()
   {
      return json_decode($_COOKIE['account']);
   }

   public function changeAction()
   {
      $error = '';
      if (!empty($_POST)) {
         if ($_POST['email'] != $this->getCookieAccount()->email) {
            $error .= 'Введите свою почту';
         } else {
            $this->model->prepareEmailToChange($_POST['email']);
            $error = 'На почту придет код для смены email';
         }
      }
      $title = 'Поменять почту';
      require ACCOUNT . '/change.php';
   }

   public function resetAction()
   {
      if ($this->model->isExistToken($this->getCookieAccount()->email)) {
         header('Location: /');
      }

      if (!empty($_POST)) {
         $this->model->changeEmail($_POST['email'], $this->getCookieAccount()->id);
         header('Location: /profile');
      }
      $title = 'Поменять почту';
      require ACCOUNT . '/reset.php';
   }
}
