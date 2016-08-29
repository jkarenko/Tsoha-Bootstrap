<?php

class UserController extends BaseController{

  public static function show_login(){
    View::make('/user/login.html');
  }

  public static function handle_login(){
    $params = $_POST;

    $user = Person::authenticate_user($params['username'], $params['password']);

    if(!$user){
      View::make('user/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana.', 'username' => $params['username']));
    }else{
      $_SESSION['user'] = $user->id;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $user->name . '!'));
    }
  }

  public static function logout(){
    $_SESSION['user'] = null;
    Redirect::to('/ride', array('message' => 'Olet kirjautunut ulos!'));
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
