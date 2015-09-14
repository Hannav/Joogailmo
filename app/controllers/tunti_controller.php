<?php

  class TuntiController extends BaseController{

    /*public static function index(){
   	  echo 'Tämä on etusivu!';
    }

    public static function kalenteri(){
      View::make('kalenteri.html');
    }*/
    
    public static function muokkaa(){
      View::make('muokkaa.html');
    }

    public static function kalenteri(){
    //*Tulevat* tunnit kalenterista
    $tunnit = Tunti::all();
    // Renderöidään views/game kansiossa sijaitseva tiedosto index.html muuttujan $games datalla
    View::make('kalenteri.html', array('tunnit' => $tunnit));
    }
    
}