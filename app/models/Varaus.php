<?php

    class Varaus extends BaseModel{

        public $id, $kayttaja_id, $tunti_id;
        
        public function __construct($attributes){
        parent::__construct($attributes);
        }
        
        public static function all(){
            // Alustetaan kysely tietokantayhteydellämme
            $query = DB::connection()->prepare('SELECT * FROM Game');
            // Suoritetaan kysely
            $query->execute();
            // Haetaan kyselyn tuottamat rivit
            $rows = $query->fetchAll();
            $varaukset = array();

           // Käydään kyselyn tuottamat rivit läpi
            foreach($rows as $row){
            // Tämä on PHP:n hassu syntaksi alkion lisäämiseksi taulukkoon :)
            $varaukset[] = new Varaus(array(
            'id' => $row['id'],
            'kayttaja_id' => $row['kayttaja_id'],
            'tunti_id' => $row['tunti_id'],
            ));
            }

        return $varaukset;
        }
        
        public static function find($id){
            $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id LIMIT 1');
            $query->execute(array('id' => $id));
            $row = $query->fetch();

            if($row){
            $varaus = new Varaus(array(
            'id' => $row['id'],
            'kayttaja_id' => $row['kayttaja_id'],
            'tunti_id' => $row['tunti_id'],
            ));

            return $varaus;
            }

        return null;
        }

}