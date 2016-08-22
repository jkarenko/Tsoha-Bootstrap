<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	 //  View::make('home.html');
     echo 'Tämä on etusivu!';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      // echo 'Hello World!';
      $ride = new Ride(array(
        'from_place' => '',
        'to_place' => 'utsjoki',
        'depart_time' => '2017-01-01 12:42asd'
      ));
      $errors = $ride->errors();

      Kint::dump($errors);
      View::make('helloworld.html');
    }

    public static function ride(){
      View::make('ride/show.html');
    }
  }
