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
      $attributes = array(
        'from_place' => $params['from_place'],
        'to_place' => $params['to_place'],
        'depart_time' => $params['depart_time'],
      );
      $ride = new Ride($attributes);

      $errors = $ride->errors();
      if(count($errors) == 0){
        $ride->save();
        Redirect::to('/ride/' . $ride->id, array('message' => 'kyyti lisätty'));
      }else{
        View::make('ride/new.html', array('errors' => $errors, 'attributes' => $attributes));
      }
    }

    public static function edit($id){
      $ride = Ride::find_by_id($id);
      View::make('ride/edit.html', array('ride' => $ride[0]));
    }

    public static function update($id){
      $params = $_POST;
      // Kint::dump($id);
      $attributes = array(
        'id' => $id,
        'from_place' => $params['from_place'],
        'to_place' => $params['to_place'],
        'depart_time' => $params['depart_time']
      );

      $ride = new Ride($attributes);
      $errors = $ride->errors();

      if(count($errors) > 0) {
        View::make('ride/edit.html', array('errors' => $errors, 'attributes' => $attributes));
      }else{
        $ride->update();
        Redirect::to('/ride/' . $ride->id, array('message' => 'Kyytiä muokattu.'));
      }
    }

    public static function destroy($id){
      $ride = new Ride(array('id' => $id));
      $ride->destroy();

      Redirect::to('/ride', array('message' => 'Kyyti poistettu.'));
    }
  }
