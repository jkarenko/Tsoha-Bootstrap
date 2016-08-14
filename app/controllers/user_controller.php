<?php

class UserController extends BaseController{

  public static function show_login(){
    View::make('/user/login.html');
  }

  public static function login($name, $password){
    echo "name: " . $name . ", password: " . $password;
  }

  public static function list_users(){
    $persons = Person::all();
    View::make('user/user_list.html', array('persons' => $persons));
    // Kint::dump($persons);
  }

  public static function find_by_id($id){
    $person = Person::find_by_id($id);
    // Kint::dump($person);
  }
}
