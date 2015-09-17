<?php
    
    require 'app/models/Tunti.php';
    class TuntiController extends BaseController{

    public static function kalenteri(){
        //*Tulevat* tunnit kalenterista
        $tunnit = Tunti::all();
        View::make('kalenteri.html', array('tunnit' => $tunnit));
    }
    
    public static function muokkaa(){
        View::make('muokkaa.html');
    }
    
    public static function lisaa(){
        View::make('lisaa.html');
        $params = $_POST;
        $tunti = new Tunti(array(
        'aika' => $params['aika'],
        'laji_id' => $params['laji_id'],
        'kesto' => $params['kesto'],
        'max_varaukset' => $params['max_varaukset']
    ));
        
        $tunti->save();
        
        //Redirect::to('/kalenteri' . $tunti->id, array('message' => 'Tunti lisätty!'));
    }
    
}