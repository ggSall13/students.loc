<?php

define("PATH_URL", 'http://students.loc/');
define("DIR_URL", $_SERVER['DOCUMENT_ROOT']);
define("VIEWS", DIR_URL . '/src/views');
define("ACCOUNT", DIR_URL . '/src/views/account');
define("MAIN", DIR_URL . '/src/views/main');
define("INCLUDES", DIR_URL . '/src/views/includes');
define("CONFIG", DIR_URL . '/src/config');

// function dd($data)
// {
//    echo '<pre>';
//    var_dump($data);
//    echo '</pre>';
//    die();
// }

// function dump($data)
// {
//    echo '<pre>';
//    var_dump($data);
//    echo '</pre>';
// }

function tte($data)
{
   echo '<pre>';
   print_r($data);
   echo '</pre>';
   die();
}

function tt($data)
{
   echo '<pre>';
   print_r($data);
   echo '</pre>';
}
