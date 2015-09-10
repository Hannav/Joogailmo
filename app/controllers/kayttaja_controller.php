<?php

  class KayttajaController extends BaseController{

    public static function login(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
    }

    public static function omat_varaukset(){
      // Testaa koodiasi täällä
      View::make('helloworld.html');
    }
  }
