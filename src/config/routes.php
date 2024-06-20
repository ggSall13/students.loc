<?php

return [
   '' => [
      'controller' => 'main',
      'action' => 'main'
   ],

   'sort/(?P<sort>\w+)' => [
      'controller' => 'main',
      'action' => 'main'
   ],

   'sort/(?P<sort>\w+)/(?P<desc>\w+)' => [
      'controller' => 'main',
      'action' => 'main'
   ],

   '(?P<page>\d+)' => [
      'controller' => 'main',
      'action' => 'main'
   ],

   'sort/(?P<sort>\w+)/(?P<page>\d+)' => [
      'controller' => 'main',
      'action' => 'main'
   ],

   'sort/(?P<sort>\w+)/(?P<desc>\w+)/(?P<page>\d+)' => [
      'controller' => 'main',
      'action' => 'main'
   ],

   'search' => [
      'controller' => 'main',
      'action' => 'search'
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
