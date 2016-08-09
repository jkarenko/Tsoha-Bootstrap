<?php

class UserController extends BaseController{

  public static function show_login(){
    View::make('/user/login.html');
  }

  public static function login($name, $password){
    echo "name: " . $name . ", password: " . $password;
  }
}
