<?php

    class Tunti extends BaseModel{

        //yhdistelmätunnit mahdollisia: jooga + tre: tunnilla monta lajia, poiketen alkup. suunnitelmasta
        //käyttöliittymässä: valikko jossa listattuna olemassa olevat lajit eli ei tarvitse kirjoittaa
        //oikein, muuta tiedot syötettäviä
        //$validators base modelissa
        //$osallistujat !! pitää näkyä ylläpitäjälle
        
        public $id, $laji_id, $pvm, $klo, $kesto, $max_varaukset;
        
        public function __construct($attributes){
        
            parent::__construct($attributes);
            $this->validators = array('validoi_pvm', 'validoi_klo', 'validoi_kesto', 'validoi_max_varaukset');
        }
        
        public static function all(){
            
            $query = DB::connection()->prepare('SELECT * FROM Tunti');
            $query->execute();
            $rows = $query->fetchAll();
            $tunnit = array();
        

            foreach($rows as $row){
                $tunnit[] = new Tunti(array(
                    'id' => $row['id'],
                    'laji_id' => $row['laji_id'],
                    'pvm' => $row['pvm'],
                    'klo' => $row['klo'],
                    'kesto' => $row['kesto'],
                    'max_varaukset' => $row['max_varaukset'],
                ));
            }

        return $tunnit;
        }

        public static function find($id){
            $query = DB::connection()->prepare('SELECT * FROM Tunti WHERE id = :id LIMIT 1');
            //en tajuu mikä tää on:
            $query->execute(array('id' => $id));
            $row = $query->fetch();

            if($row){
            $tunti = new Tunti(array(
                'id' => $row['id'],
                'pvm' => $row['pvm'],
                'klo' => $row['klo'],
                'laji_id' => $row['laji_id'],   
                'kesto' => $row['kesto'],
                'max_varaukset' => $row['max_varaukset'],
            ));

            return $tunti;
            }

        return null;
        }
        
        public function save(){
        
            $query = DB::connection()->prepare('INSERT INTO Tunti (pvm, klo, laji_id, kesto, max_varaukset) VALUES (:pvm, :klo, :laji_id, :kesto, :max_varaukset) RETURNING id');
            $query->execute(array('pvm' => $this->pvm, 'klo' => $this->klo, 'laji_id' => $this->laji_id, 'kesto' => $this->kesto, 'max_varaukset' => $this->max_varaukset));
            $row = $query->fetch();
            $this->id = $row['id'];
            
            /*Kint::trace();
            Kint::dump($row);*/
        
        }
        
        /* static?
         public function destroy(){
             //...
         }
         */

}