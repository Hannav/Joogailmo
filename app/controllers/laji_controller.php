<?php
    
    require 'app/models/Laji.php';
    class LajiController extends BaseController{

        public static function lajit(){
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
            // Alustetaan Game-olio annetulla id:llä
            $game = new Game(array('id' => $id));
            // Kutsutaan Game-malliluokan metodia destroy, joka poistaa pelin sen id:llä
            $game->destroy();

            // Ohjataan käyttäjä pelien listaussivulle ilmoituksen kera
            Redirect::to('/game', array('message' => 'Peli on poistettu onnistuneesti!'));
        } 
        */
    }