<?php

  $routes->get('/', function(){
    RideController::list_rides();
  });

  $routes->get('/hiekkalaatikko', function(){
    HelloWorldController::sandbox();
  });


// ride

$routes->get('/ride/create', function(){
  RideController::create();
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


// user
  $routes->get('/user/login.html', function(){
    UserController::show_login();
  });
