<?php

  class RideController extends BaseController {

    public static function show($id){
      $ride = Ride::find_by_id($id);
      // Kint::dump($ride);
      View::make('ride/show.html', array('ride' => $ride[0]));
    }

    public static function list_rides(){
      $rides = Ride::all();
      // Kint::dump($rides);
      View::make('ride/list.html', array('rides' => $rides));
    }

    public static function new_ride(){
      View::make('ride/new.html');
    }

    public static function create(){
      $params = $_POST;
      $ride = new Ride(Array(
        'from_place' => $params['from_place'],
        'to_place' => $params['to_place'],
        'depart_time' => $params['depart_time'],
      ));
      $ride->save();
      Redirect::to('/ride/' . $ride->id, array('message' => 'kyyti lisätty'));
    }
  }
