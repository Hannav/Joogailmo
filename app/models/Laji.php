<?php

    //haku myös lajeittain

    class Laji extends BaseModel{

        public $id, $nimi, $kuvaus, $validators;
        
        public function __construct($attributes){
            parent::__construct($attributes);
            $this->validators = array('validoi_nimi', 'validoi_kuvaus');
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

        public function save(){
            $query = DB::connection()->prepare('INSERT INTO Laji (nimi, kuvaus) VALUES (:nimi, :kuvaus) RETURNING id');
            $query->execute(array('nimi' => $this->nimi, 'kuvaus' => $this->kuvaus));
            $row = $query->fetch();
            $this->id = $row['id'];
            
            /*Kint::trace();
            Kint::dump($row);*/
        
        }
        
        public function validate_name(){
            $errors = array();
            if($this->nimi == '' || $this->nimi == null){
                $errors[] = 'Nimi ei saa olla tyhjä!';
            }
            if(strlen($this->nimi) < 3){
                $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
            }

            return $errors;
        }
        
        /* static?
         * 
         public function destroy(){
             //...
         }
         */
}