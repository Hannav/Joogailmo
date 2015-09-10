<?php

  class TuntiController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
    }

       public static function kalenteri(){
      // Testaa koodiasi täällä
      View::make('kalenteri.html');
    }
    
    public static function sandbox(){
      // Testaa koodiasi täällä
      View::make('helloworld.html');
    }
}