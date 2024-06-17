<?php

namespace Core\Database;

use PDO;
use PDOException;

class Db
{
   private $config;
   private $pdo;

   public function __construct()
   {
      $config = require CONFIG . '/db.php';

      try {
         $this->pdo = new PDO(
            "mysql:host={$config['dbHost']};dbname={$config['dbName']}",
            $config['dbUser'],
            $config['dbPass'],
            $config['options'],
         );
      } catch (PDOException) {
         require VIEWS . '/errors/404.php';
      }
   }

   public function query($sql, $params = [])
   {
      $stmt = $this->pdo->prepare($sql);
      if ($params) {
         foreach ($params as $k => $v) {
            $stmt->bindValue($k, $v);
         }
      }
      $stmt->execute();
      return $stmt;
   }

   public function row($sql, $params = [])
   {
      $stmt = $this->query($sql, $params);
      return $stmt->fetchAll();
   }

   public function column($sql, $params = [])
   {
      $stmt = $this->query($sql, $params);
      return $stmt->fetchColumn();
   }
}
