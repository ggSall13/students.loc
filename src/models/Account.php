<?php

namespace Models;

use Core\Model;

class Account extends Model
{
   public $error = '';

   public function validateReg($post)
   {
      // проверка на заполненость полей

      // foreach ($post as $value) {
      //    if ($value == '') {
      //       $this->error = 'Введите все поля';
      //       return true;
      //    }
      // }

      if ($this->validateFieldsReg($post)) {
         return true;
      }

      return false;
   }

   public function validateFieldsProfile($name, $lastName)
   {
      if (
         $this->checkName($name) ||
         $this->checkLastName($lastName)
      ) {
         return true;
      } else {
         return false;
      }
   }

   public function validateFieldsReg($post)
   {
      // Иннициализация переменных
      $name = $post['name'];
      $lastName = $post['lastName'];
      $email = $post['email'];
      $groupName = $post['groupName'];
      $yearBirth = $post['yearBirth'];
      $gender = $post['gender'];
      $password = $post['password'];
      $rePassword = $post['rePassword'];

      // валидация полей
      if (
         $this->checkName($name) ||
         $this->checkLastName($lastName) ||
         $this->checkEmail($email) ||
         $this->checkGroupName($groupName) ||
         $this->checkYearBirth($yearBirth) ||
         $this->checkPasswords($password, $rePassword)
      ) {
         return true;
      } else {
         return false;
      }
   }


   public function checkEmail($email)
   {
      if (!str_contains($email, '@') && !str_contains($email, '.')) {
         $this->error = 'Некорректный Email';
         return true;
      }
      return false;
   }

   public function checkName($name)
   {
      if (mb_strlen($name) < 2 || mb_strlen($name) > 70) {
         $this->error = 'Имя должно быть больше 2 и меньше 70 символов, а у вас ' . mb_strlen($name);
         return true;
      }
      return false;
   }

   public function checkLastName($lastName)
   {
      if (mb_strlen($lastName) < 2 || mb_strlen($lastName) > 70) {
         $this->error = 'Фамилия должна быть больше 2 и меньше 70 символов, а у вас ' . mb_strlen($lastName);
         return true;
      }
      return false;
   }

   public function checkYearBirth($yearBirth)
   {
      if (strlen($yearBirth) >= 5 || $yearBirth >= date('Y') || !is_numeric($yearBirth)) {
         $this->error = 'Введите корректный возраст';
         return true;
      }
      return false;
   }

   public function checkGroupName($groupName)
   {
      if (mb_strlen($groupName) >= 6 || mb_strlen($groupName) <= 2) {
         $this->error = 'Введите корректное название группы';
         return true;
      }
      return false;
   }

   public function checkPasswords($password, $rePassword)
   {

      if (strlen($password) < 6) {
         $this->error = 'Паароль должен быть больше 6 символов';
         return true;
      }

      if ($password == '' || $password !== $rePassword) {
         $this->error = 'Пароли не совпадают';
         return true;
      }
      return false;
   }

   // проверка на сущестование email
   public function isEmailExists($email)
   {
      $params = ['email' => $email];
      $emailExist = $this->db->column("SELECT id FROM users WHERE email = :email", $params);

      if ($emailExist) {
         $this->error = 'Почта уже существует';
         return true;
      }
      return false;
   }

   //создание токена для смены почты
   public function createToken()
   {
      return substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrsntyvwxyz", 25)), 0, 25);
   }

   // Регистрация пользователя(Запись в БД)
   public function register($post)
   {
      $params = [
         'name' => $post['name'],
         'lastName' => $post['lastName'],
         'email' => $post['email'],
         'groupName' => $post['groupName'],
         'yearBirth' => $post['yearBirth'],
         'gender' => $post['gender'],
         'password' => password_hash($post['password'], PASSWORD_DEFAULT),
         'grade' => rand(0, 300),
      ];

      $this->db->query(
         "INSERT INTO users SET email = :email, name = :name, lastName = :lastName, password = :password, 
         yearBirth = :yearBirth, gender = :gender, groupName = :groupName, grade = :grade",
         $params
      );
   }

   // Вход в аккаунт
   public function checkLogin($email, $password)
   {
      $params = ['email' => $email];

      $account = $this->db->row("SELECT * FROM users WHERE email = :email", $params)[0];

      if ($email == '' || $password == '') {
         $this->error = 'Заполните все поля';
         return true;
      }

      // Если password_verify выдает true переводим его в false и наоборот
      if (!password_verify($password, $account['password'])) {
         $this->error = 'Неправильная почта или пароль';
         return true;
      } else {
         setcookie('account', json_encode($account), time() + 60 * 60 * 60 * 24 * 1000, '/');
         return false;
      }
   }

   public function prepareEmailToChange($email)
   {
      $token = $this->createToken();
      $params = [
         'token' => $token,
         'email' => $email
      ];

      $this->db->query("UPDATE users SET token = :token WHERE email = :email", $params);
      mail($email, 'Change Email', 'Зайдите для смены почты:' . PATH_URL . 'reset/' . $token);
   }

   public function isExistToken($email)
   {
      $params = ['email' => $email];

      $userToken = $this->db->column("SELECT token FROM users WHERE email = :email", $params);

      if (!$userToken) {
         return true;
      }
   }

   public function changeEmail($email, $id)
   {
      $params = [
         'email' => $email,
         'id' => $id,
      ];

      $this->db->query("UPDATE users SET email = :email, token = '' WHERE id = :id", $params);
      setcookie('account', '', time() - 3600);

      $params = [
         'id' => $id,
      ];
      $account = $this->db->row("SELECT * FROM users WHERE id = :id", $params)[0];
      setcookie('account', json_encode($account), time() + 60 * 60 * 60 * 24 * 1000, '/');
   }

   public function updateProfile($post, $id)
   {
      $params = [
         'name' => $post['name'],
         'lastName' => $post['lastName'],
         'id' => $id,
      ];

      $this->db->query("UPDATE users SET name = :name, lastName = :lastName WHERE id = :id", $params);
      setcookie('account', '', time() - 3600);

      $params = [
         'id' => $id
      ];

      $account = $this->db->row("SELECT * FROM users WHERE id = :id", $params)[0];
      setcookie('account', json_encode($account), time() + 60 * 60 * 60 * 24 * 1000, '/');
   }
}
