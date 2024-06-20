<?php

namespace Models;

use Core\Model;

class Main extends Model
{
   public function getAllUsers($offset, $max)
   {
      return $this->db->row("SELECT * FROM users LIMIT {$offset}, {$max}");
   }

   public function getAllUsersSort($fieldName, $offset, $max)
   {
      return $this->db->row("SELECT * FROM users ORDER by $fieldName LIMIT {$offset}, {$max}");
   }

   public function getAllUsersSortDesc($fieldName, $offset, $max)
   {
      return $this->db->row("SELECT * FROM users ORDER by $fieldName DESC LIMIT {$offset}, {$max}");
   }

   public function getUsersLike($fieldName)
   {
      $params = [
         'fieldName' => $fieldName,
      ];

      return $this->db->row("SELECT * FROM users WHERE name LIKE :fieldName OR lastName LIKE :fieldName
      OR grade LIKE :fieldName", $params);
   }

   public function getUsersCount()
   {
      return $this->db->column("SELECT COUNT(*) FROM users");
   }
}
