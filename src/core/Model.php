<?php

namespace Core;

use Core\Database\Db;

abstract class Model
{
   protected $db;

   public function __construct()
   {
      $this->db = new Db();
   }
}
