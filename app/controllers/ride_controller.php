<?php

  class RideController extends BaseController {

    public static function show($id){
      View::make('ride/show.html');
    }

    public static function list_rides(){
      View::make('ride/list.html');
    }

    public static function create(){
      View::make('ride/create.html');
    }
  }
