<?php

  class KayttajaController extends BaseController{

    public static function login(){
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        View::make('login.html');
    }

    public static function omat_varaukset(){
        // Testaa koodiasi täällä
        View::make('omat_varaukset.html');
    }
  }