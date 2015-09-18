<?php

    $routes->get('/', function() {
        KayttajaController::home();
    });

    $routes->get('/login', function() {
        KayttajaController::login();
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
        TuntiController::lisaa();
    });

//kesken!!! miten
    $routes->post('/lisaa_tunti', function() {
        TuntiController::luoTunti();
    });
    
    $routes->get('/muokkaa', function() {
        TuntiController::muokkaa();
    });
    
    $routes->get('/hiekkalaatikko', function() {
        HelloWorldController::sandbox();
    });
    
/*

});
// Määritetään reitti game/:id vasta tässä, jottei se mene sekaisin reitin game/new kanssa
  
// Etusivu (pelien listaussivu)
$routes->get('/', function(){
  GameController::index();
});
// Pelien listaussivu
$routes->get('/game', function(){
  GameController::index();
});

// Pelin esittelysivu
$routes->get('/game/:id', function($id){
  GameController::show($id);
});
*/