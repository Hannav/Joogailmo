<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/login', function() {
    KayttajaController::login();
  });
  
  $routes->get('/varauskalenteri', function() {
    HelloWorldController::sandbox();
  });
  
  $routes->get('/omat_varaukset', function() {
    HelloWorldController::sandbox();
  });