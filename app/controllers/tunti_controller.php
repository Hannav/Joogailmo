<?php

  class TuntiController extends BaseController{

    public static function index(){
   	  echo 'Tämä on etusivu!';
    }

    public static function kalenteri(){
      View::make('kalenteri.html');
    }
    
    public static function muokkaa(){
      View::make('muokkaa.html');
    }

}