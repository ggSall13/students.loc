<?php

namespace Controllers;

use Core\Controller;

class MainController extends Controller
{
   public function mainAction()
   {

      // для пагинации 
      $total = $this->model->getUsersCount();

      $maxUsers = 50;

      $pages = ceil($total / $maxUsers);

      $currentPage = isset($this->route['page']) ? $this->route['page'] : 1;

      $offset = $maxUsers * ($currentPage - 1);

      $users = $this->model->getAllUsers($offset, $maxUsers);

      if (isset($this->route['sort'])) {
         $users = $this->model->getAllUsersSort($this->route['sort'], $offset, $maxUsers);
      }

      if (isset($this->route['desc'])) {
         $users = $this->model->getAllUsersSortDesc($this->route['sort'], $offset, $maxUsers);
      }
      $title = 'Главная';
      require MAIN . '/main.php';
   }

   public function searchAction()
   {
      $users = $this->model->getUsersLike($_POST['search']);

      $title = 'Поиск';
      require MAIN . '/search.php';
   }
}
