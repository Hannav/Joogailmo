<?php
    
    require 'app/models/Tunti.php';
    class TuntiController extends BaseController{

    public static function kalenteri(){
        //*Tulevat* tunnit kalenterista
        $tunnit = Tunti::all();
        View::make('kalenteri.html', array('tunnit' => $tunnit));
    }
    
    public static function muokkaaTuntia(){
        View::make('muokkaa_tuntia.html');
    }
    
    public static function luoTunti(){
        $params = $_POST;
   //     $muuttuja = lajiId($params['laji']);
        $tunti = new Tunti(array(
            'pvm' => $params['pvm'],
            'klo' => $params['klo'],
            'laji_id' => $params['laji'],
     //       'laji_id' => $muuttuja,
            'kesto' => $params['kesto'],
            'max_varaukset' => $params['max_varaukset']
        ));
        
        $errors = array_merge($errors, $validator_errors);
        
        $tunti->save();
        
        //Redirect::to('/kalenteri');
        
    }
    /*
    public static function lajiId($laji) {
        //tietokantakysely
        'id_selvitys' = 
        
    }
  */
    //nimi muutettu (aiemmin lisaa)
    public static function lisaaTunti(){
        View::make('lisaa_tunti.html');
        
    }
    
}