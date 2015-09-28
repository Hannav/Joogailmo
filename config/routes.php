<?php

    $routes->get('/', function() {
        KayttajaController::home();
    });

    $routes->get('/login', function() {
        KayttajaController::login();
    });
    
    $routes->post('/login', function() {
        KayttajaController::handle_login();
    });
    
    $routes->get('/lajit', function(){
        LajiController::lajit();
    });
    
    $routes->get('/lisaa_laji', function(){
        LajiController::lisaaLaji();
    });
    
    $routes->post('/lisaa_laji', function(){
        LajiController::luoLaji();
    });
  
    $routes->get('/omat_varaukset', function() {
        KayttajaController::omat_varaukset();
    });
  
    $routes->get('/kalenteri', function() {
        TuntiController::kalenteri();
    });
  
    $routes->get('/lisaa_tunti', function() {
        TuntiController::lisaaTunti();
    });

    $routes->post('/lisaa_tunti', function() {
        TuntiController::luoTunti();
    });
    
    $routes->get('/muokkaa_tuntia', function() {
        TuntiController::muokkaaTuntia();
    });
    
    $routes->get('/hiekkalaatikko', function() {
        HelloWorldController::sandbox();
    });