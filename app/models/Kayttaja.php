<?php

    class Kayttaja extends BaseModel{
        
        //Tee 2 erilaista käyttäjää: ylläpitäjä ja asiakas!! $yllapitaja boolean?
        
        public $id, $nimi, $salasana;
        
        public function __construct($attributes){
        parent::__construct($attributes);
        }
        
        public static function all(){
            $query = DB::connection()->prepare('SELECT * FROM Kayttaja');
            $query->execute();
            $rows = $query->fetchAll();
            $kayttajat = array();

            foreach($rows as $row){
            $kayttajat[] = new Kayttaja(array(
            'id' => $row['id'],
            'nimi' => $row['nimi'],
            'salasana' => $row['salasana'],
            ));
            }

        return $kayttajat;
        }
        
        public static function find($id){
            $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id LIMIT 1');
            $query->execute(array('id' => $id));
            $row = $query->fetch();

            if($row){
            $kayttaja = new Kayttaja(array(
            'id' => $row['id'],
            'nimi' => $row['nimi'],
            'salasana' => $row['salasana'],
            ));

            return $kayttaja;
            }

        return null;
        }
  
}