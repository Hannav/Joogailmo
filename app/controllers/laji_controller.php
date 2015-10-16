<?php
    
    //Lajia ei tarvitse muokata, ainoastaan luoda, poistaa; Tuntia ja Käyttäjää luoda, muokata, poistaa
    require 'app/models/Laji.php';
    class LajiController extends BaseController{

        public static function lajit(){
            self::check_logged_in();
            $lajit = Laji::all();
            View::make('lajit.html', array('lajit' => $lajit));
        }
    
        public function luoLaji() {
            $params = $_POST;
            $laji = new Laji(array(
                'nimi' => $params['nimi'],
                'kuvaus' => $params['kuvaus'],
            ));
        
            $laji->save();
        
            Redirect::to('/lajit');
        }
        
        public function lisaaLaji() {
            View::make('lisaa_laji.html');            
        }
        
        /*
        public static function destroy($id){
            $laji = new Laji(array('id' => $id));
            // Kutsutaan Laji-malliluokan metodia destroy, joka poistaa pelin sen id:llä
            $laji->destroy();

            // Ohjataan käyttäjä pelien listaussivulle ilmoituksen kera
            Redirect::to('/game', array('message' => 'Peli on poistettu onnistuneesti!'));
        } 
        */
    }