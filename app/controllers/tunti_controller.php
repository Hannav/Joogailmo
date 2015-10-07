<?php
    
    require 'app/models/Tunti.php';
    class TuntiController extends BaseController{

    public static function kalenteri(){
        //*Tulevat* tunnit kalenterista
        $tunnit = Tunti::all();
        View::make('kalenteri.html', array('tunnit' => $tunnit));
    }
    
    public static function muokkaaTuntia(){
        View::make('muokkaa_tuntia.html');
    }
    
    public static function luoTunti(){
        $params = $_POST;
   //     $muuttuja = lajiId($params['laji']);
        $tunti = new Tunti(array(
            'pvm' => $params['pvm'],
            'klo' => $params['klo'],
            'laji_id' => $params['laji'],
     //       'laji_id' => $muuttuja,
            'kesto' => $params['kesto'],
            'max_varaukset' => $params['max_varaukset']
        ));
        
        $errors = array_merge($errors, $validator_errors);
        
        $tunti->save();
        
        //Redirect::to('/kalenteri');
        
    }
    /*
    public static function lajiId($laji) {
        //tietokantakysely
        'id_selvitys' = 
        
    }
  */
    //nimi muutettu (aiemmin lisaa)
    public static function lisaaTunti(){
        View::make('lisaa_tunti.html');
        
    }
    
    public static function edit($id){
        $game = Game::find($id);
        View::make('game/edit.html', array('attributes' => $game));
    }

    // Pelin muokkaaminen (lomakkeen käsittely)
    public static function update($id){
        $params = $_POST;

        $attributes = array(
            'id' => $id,
            'name' => $params['name'],
            'played' => $params['played'],
            'published' => $params['published'],
            'description' => $params['description']
        );

        // Alustetaan Game-olio käyttäjän syöttämillä tiedoilla
        $game = new Game($attributes);
        $errors = $game->errors();

        if(count($errors) > 0){
            View::make('game/edit.html', array('errors' => $errors, 'attributes' => $attributes));
        }else{
            // Kutsutaan alustetun olion update-metodia, joka päivittää pelin tiedot tietokannassa
            $game->update();

        //Redirect::to('/game/' . $game->id, array('message' => 'Peliä on muokattu onnistuneesti!'));
        }
      }

    // Pelin poistaminen
    public static function destroy($id){
        $tunti = new Tunti(array('id' => $id));
        $tunti->destroy();

        //Redirect::to('/game', array('message' => 'Peli on poistettu onnistuneesti!'));
  }
    
}