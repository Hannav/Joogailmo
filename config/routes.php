<?php

  $routes->get('/', function() {
    KayttajaController::login();
  });

  $routes->get('/login', function() {
    KayttajaController::login();
  });
  
  $routes->get('/omat_varaukset', function() {
    KayttajaController::omat_varaukset();
  });
  
  $routes->get('/kalenteri', function() {
    TuntiController::kalenteri();
  });
  
  $routes->get('/helloworld', function() {
    HelloWorldController::sandbox();
  });