<?php
    
    require 'app/models/Kayttaja.php';
    class KayttajaController extends BaseController{
      
    public static function home(){
        View::make('home.html');
    }  
      
    public static function login(){
        View::make('login.html');
    }

    public static function omat_varaukset(){
        View::make('omat_varaukset.html');
    }
    
  }