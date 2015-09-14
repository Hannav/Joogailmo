<?php

    class Tunti extends BaseModel{
        
        //miten erikseen tauluun pvm ja klo jos vain yksi 'aika'??
        public $id, $laji_id, $aika, $kesto, $max_varaukset;
        
        public function __construct($attributes){
        parent::__construct($attributes);
        }
        
        public static function all(){
            // Alustetaan kysely tietokantayhteydellämme
            $query = DB::connection()->prepare('SELECT * FROM Tunti');
            // Suoritetaan kysely
            $query->execute();
            // Haetaan kyselyn tuottamat rivit
            $rows = $query->fetchAll();
            $tunnit = array();

           // Käydään kyselyn tuottamat rivit läpi
            foreach($rows as $row){
            // Tämä on PHP:n hassu syntaksi alkion lisäämiseksi taulukkoon :)
            $tunnit[] = new Tunti(array(
            'id' => $row['id'],
            'laji_id' => $row['laji_id'],
            'aika' => $row['aika'],
            'kesto' => $row['kesto'],
            'max_varaukset' => $row['max_varaukset'],
            ));
            }

        return $tunnit;
        }

        public static function find($id){
            $query = DB::connection()->prepare('SELECT * FROM Tunti WHERE id = :id LIMIT 1');
            $query->execute(array('id' => $id));
            $row = $query->fetch();

            if($row){
            $tunti = new Tunti(array(
            'id' => $row['id'],
            'laji_id' => $row['laji_id'],
            'aika' => $row['aika'],
            'kesto' => $row['kesto'],
            'max_varaukset' => $row['max_varaukset'],
            ));

            return $tunti;
            }

        return null;
        }

}