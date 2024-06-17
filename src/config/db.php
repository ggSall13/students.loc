<?php

return [
   'dbHost' => 'localhost',
   'dbName' => 'student.loc',
   'dbUser' => 'root',
   'dbPass' => '',
   'options' => [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
   ],
];
