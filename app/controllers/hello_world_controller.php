<?php

  require 'app/models/spellbook.php';
  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Etusivu';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      // echo 'Hello World!';


      //View::make('helloworld.html');
      //$spellbooks = Spellbook::all();
      $spells = Spell::all();
      //Kint::dump($spellbooks);
      Kint::dump($spells);
      }
  }
