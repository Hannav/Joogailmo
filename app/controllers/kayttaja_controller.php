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
            
            Redirect::to('/kalenteri');
        }
    }

    public static function logout(){
        $_SESSION['kayttaja'] = null;
        echo'olet kirjautunut ulos';
        //Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
    }
    
    public static function omat_varaukset(){
        $user = self::get_user_logged_in();
        if(!$user){
            return null;
        }
        $user_id = $user->id;
        $varaukset = Varaus::find_by_user($user_id);
        View::make('omat_varaukset.html',  array('varaukset' => $varaukset));
    }
    
  }