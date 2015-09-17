<?php
    
    require 'app/models/Tunti.php';
    class TuntiController extends BaseController{

    /*public static function index(){
   	  echo 'Tämä on etusivu!';
    }

    public static function kalenteri(){
      View::make('kalenteri.html');
    }*/
    
     public static function lisaa(){
      View::make('lisaa.html');
    }
        
    public static function muokkaa(){
      View::make('muokkaa.html');
    }

    public static function kalenteri(){
    //*Tulevat* tunnit kalenterista
    $tunnit = Tunti::all();
    // Renderöidään views/game kansiossa sijaitseva tiedosto index.html muuttujan $games datalla
    View::make('kalenteri.html', array('tunnit' => $tunnit));
    }
    
    public static function mikaNimeksi(){
    // POST-pyynnön muuttujat sijaitsevat $_POST nimisessä assosiaatiolistassa
    $params = $_POST;
    // Alustetaan uusi Game-luokan olion käyttäjän syöttämillä arvoilla
    $tunti = new Tunti(array(
      'aika' => $params['aika'],
      'laji_id' => $params['laji_id'],
      'kesto' => $params['kesto'],
      'max_varaukset' => $params['max_varaukset']
    ));

    // Kutsutaan alustamamme olion save metodia, joka tallentaa olion tietokantaan
    $tunti->save();

    // Ohjataan käyttäjä lisäyksen jälkeen pelin esittelysivulle
    Redirect::to('/kalenteri/' . $tunti->id, array('message' => 'Tunti lisätty!'));
  }
    
}