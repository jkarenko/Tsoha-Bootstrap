<?php

function check_logged_in(){
  BaseController::check_logged_in();
}

$routes->get('/', function(){
  RideController::list_rides();
});

$routes->get('/hiekkalaatikko', function(){
  HelloWorldController::sandbox();
});


// ride
$routes->get('/ride/new', 'check_logged_in', function(){
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

$routes->post('/ride', 'check_logged_in', function(){
  RideController::create();
});

$routes->get('/ride/:id/edit', 'check_logged_in', function($id){
  RideController::edit($id);
});

$routes->post('/ride/:id', 'check_logged_in', function($id){
  RideController::update($id);
});

$routes->post('/ride/:id/delete', 'check_logged_in', function($id){
  RideController::destroy($id);
});


// user
$routes->get('/user/login', function(){
  UserController::show_login();
});

$routes->post('/user/login', function(){
  UserController::handle_login();
});

$routes->post('/user/logout', function(){
  UserController::logout();
});

$routes->get('/user/list', 'check_logged_in', function(){
  UserController::list_users();
});

$routes->get('/users', 'check_logged_in', function(){
  UserController::list_users();
});

$routes->get('/user/:id', 'check_logged_in', function($id){
  // UserController::find_by_id($id);
  UserController::get_person_rides($id);
});
