<?php

  class BaseModel{
    protected $validators;

    public function __construct($attributes = null){
        foreach($attributes as $attribute => $value){
            if(property_exists($this, $attribute)){
                $this->{$attribute} = $value;
            }
        }
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();

      foreach($this->validators as $validator){
        // Kutsu validointimetodia tässä ja lisää sen palauttamat virheet errors-taulukkoon
      }

      return $errors;
    }

  }
