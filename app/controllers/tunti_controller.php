<?php

  class TuntiController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      View::make('helloworld.html');
    }
  }