<?php

    class Kayttaja extends BaseModel{
        
        //Tee 2 erilaista käyttäjää: ylläpitäjä ja asiakas: $yllapitaja!!
        //käyttäjän luominen!! käyttäjän tietojen muokkaus, käyttäjän poistaminen
        //$sposti?? -> käyttäjätunnus?
        //Yp luo vai rekistetöidytäänkö?
        
        public $id, $nimi, $salasana;
        
        public function __construct($attributes){
            parent::__construct($attributes);
            $this->validators = array('validoi_nimi', 'validoi_salasana');
        }
/*        
        public function validaattorit(){
            foreach($rows as $row){
            }
        }
*/
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
                //'yllapitaja' => $row[yllapitaja],
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
                //'yllapitaja' => $row[yllapitaja],
            ));

            return $kayttaja;
            }

        return null;
        }
 
        public static function authenticate($nimi, $salasana){
            $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE nimi = :nimi AND salasana = :salasana LIMIT 1');
            $query->execute(array('nimi' => $nimi, 'salasana' => $salasana));
            $row = $query->fetch();
            //Kint::dump($row);
            if($row){
                return  $kayttaja = new Kayttaja(array(
                        'id' => $row['id'],
                        'nimi' => $row['nimi'],
                        'salasana' => $row['salasana'],
                        //'yllapitaja' => $row['yllapitaja'],
                ));
            }else{
                // Käyttäjää ei löytynyt, palautetaan null
                return null;
            }
        }
        
        /* static?
         public function destroy(){
             //...
         }
         */
}