<?php

$routes->get('/', function(){
  RideController::list_rides();
});

$routes->get('/hiekkalaatikko', function(){
  HelloWorldController::sandbox();
});


// ride
$routes->get('/ride/new', function(){
  RideController::new_ride();
});

$routes->get('/ride/:id', function($id){
  RideController::show($id);
});

$routes->get('/ride', function(){
  RideController::list_rides();
});

$routes->get('/rides', function(){
  RideController::list_rides();
});

$routes->post('/ride', function(){
  RideController::create();
});


// user
$routes->get('/user/login', function(){
  UserController::show_login();
});

$routes->get('/user/list', function(){
  UserController::list_users();
});

$routes->get('/user/:id', function($id){
  UserController::find_by_id($id);
});
