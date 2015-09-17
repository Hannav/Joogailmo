<?php

    class Tunti extends BaseModel{
        
        //miten erikseen tauluun pvm ja klo jos vain yksi 'aika'??
        //yhdistelmätunnit: jooga + tre: tunnilla monta lajia, poiketen alkup. suunnitelmasta
        
        public $id, $laji_id, $aika, $kesto, $max_varaukset;
        
        public function __construct($attributes){
        parent::__construct($attributes);
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
        
        public function save(){
        
            // Lisätään RETURNING id tietokantakyselymme loppuun, niin saamme lisätyn rivin id-sarakkeen arvon
            $query = DB::connection()->prepare('INSERT INTO Tunti (aika, laji_id, kesto, max_varaukset) VALUES (:aika, :laji_id, :kesto, :max_varaukset) RETURNING id');
            // Muistathan, että olion attribuuttiin pääse syntaksilla $this->attribuutin_nimi
            $query->execute(array('aika' => $this->aika, 'laji_id' => $this->laji_id, 'kesto' => $this->kesto, 'max_varaukset' => $this->max_varaukset));
            // Haetaan kyselyn tuottama rivi, joka sisältää lisätyn rivin id-sarakkeen arvon
            $row = $query->fetch();
            // Asetetaan lisätyn rivin id-sarakkeen arvo oliomme id-attribuutin arvoksi
            $this->id = $row['id'];
            
            Kint::trace();
            Kint::dump($row);
        
        }

}