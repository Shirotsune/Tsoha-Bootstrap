<?php

  $routes->get('/login', function(){
    UserController::Login();
  });

  $routes->post('/login', function(){
    UserController::handle_login();
  });

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
