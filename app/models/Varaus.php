<?php

    class Varaus extends BaseModel{

        public $id, $kayttaja_id, $tunti_id;
        
        public function __construct($attributes){
        parent::__construct($attributes);
        }
        
        public static function all(){
            $query = DB::connection()->prepare('SELECT * FROM Varaus');
            $query->execute();
            $rows = $query->fetchAll();
            $varaukset = array();

            foreach($rows as $row){
            $varaukset[] = new Varaus(array(
                'id' => $row['id'],
                'kayttaja_id' => $row['kayttaja_id'], //user_logged_in_id??
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