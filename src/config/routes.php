<?php

return [
   '' => [
      'controller' => 'main',
      'action' => 'main'
   ],

   'register' => [
      'controller' => 'account',
      'action' => 'register'
   ],

   'login' => [
      'controller' => 'account',
      'action' => 'login',
   ],
   'profile' => [
      'controller' => 'account',
      'action' => 'profile',
   ],

   'change' => [
      'controller' => 'account',
      'action' => 'change',
   ],

   'reset/(?P<token>\w+)' => [
      'controller' => 'account',
      'action' => 'reset',
   ],

   'logout' => [
      'controller' => 'account',
      'action' => 'logout',
   ],
];
