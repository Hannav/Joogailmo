<?php
    
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
        
        }
        
        public function lisaaLaji() {
            View::make('lisaa_laji.html');            
        }
    }