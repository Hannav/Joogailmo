<?php

  $routes->get('/', function() {
    KayttajaController::home();
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
  
  $routes->get('/muokkaa', function() {
    TuntiController::muokkaa();
  });
    
   $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });