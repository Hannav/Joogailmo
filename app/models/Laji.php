<?php

    //haku myös lajeittain

    class Laji extends BaseModel{

        public $id, $nimi, $kuvaus;
        
        public function __construct($attributes){
            parent::__construct($attributes);
        }
        
        public static function all(){
            $query = DB::connection()->prepare('SELECT * FROM Laji');
            $query->execute();
            $rows = $query->fetchAll();
            $lajit = array();

            foreach($rows as $row){
            $lajit[] = new Laji(array(
            'id' => $row['id'],
            'nimi' => $row['nimi'],
            'kuvaus' => $row['kuvaus'],
            ));
            }

        return $lajit;
        }
        
        public static function find($id){
            $query = DB::connection()->prepare('SELECT * FROM Laji WHERE id = :id LIMIT 1');
            $query->execute(array('id' => $id));
            $row = $query->fetch();

            if($row){
            $laji = new Laji(array(
            'id' => $row['id'],
            'nimi' => $row['nimi'],
            'kuvaus' => $row['kuvaus'],
            ));

            return $laji;
            }

        return null;
        }

}