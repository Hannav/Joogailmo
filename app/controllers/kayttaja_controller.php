<?php

    //require 'app/models/Kayttaja.php'; ??

    class KayttajaController extends BaseController{
      
    public static function home(){
        View::make('home.html');
    }  
      
    public static function login(){
        View::make('login.html');
    }
    
    public static function handle_login(){
        $params = $_POST;
        
        //Fatal error: Class 'User' not found in /home/hvuorivi/htdocs/tsoha/app/controllers
        ///kayttaja_controller.php on line 18
        $user = User::authenticate($params['username'], $params['salasana']);
        
        /*
        $query = DB::connection()->prepare('SELECT * FROM Player WHERE name = :name AND password = :password LIMIT 1', array('name' => $name, 'password' => $password));
        $query->execute();
        $row = $query->fetch();
        if($row){
        // Käyttäjä löytyi, palautetaan löytynyt käyttäjä oliona
        }else{
        // Käyttäjää ei löytynyt, palautetaan null
        }
        */
        
        if(!user){
            View::make('user/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana', 'kayttajatunnus' => $params[kayttajatunnus]));
        }else{
            $_SESSION['user'] = $user->id;
            
            //Redirect::to('/', array('message' => 'Tervetuloa' . $user->name . '!'));
        }
    }

    public static function omat_varaukset(){
        View::make('omat_varaukset.html');
    }
    
  }