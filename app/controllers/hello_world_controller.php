<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Etusivu';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      // echo 'Hello World!';
      View::make('helloworld.html');
      }
  }
