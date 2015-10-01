<?php

    require 'app/models/Kayttaja.php';
    class KayttajaController extends BaseController{
      
    public static function home(){
        View::make('home.html');
    }  
      
    public static function login(){
        View::make('login.html');
    }
    
    public static function handle_login(){
        $params = $_POST;
        
        $kayttaja = Kayttaja::authenticate($params['nimi'], $params['salasana']);
        
        //??
        if(!$kayttaja){
            View::make('kalenteri.html', array('error' => 'Väärä käyttäjätunnus tai salasana', 'nimi' => $params['nimi']));
        }else{
            $_SESSION['kayttaja'] = $kayttaja->id;
            
            //Redirect::to('/', array('message' => 'Tervetuloa' . $kayttaja->nimi . '!'));
        }
    }

    public static function omat_varaukset(){
        View::make('omat_varaukset.html');
    }
    
  }