<?php

  class Person extends BaseModel{

    public $id, $name, $password, $is_admin;

    public function __construct($attributes){
      parent::__construct($attributes);
    }

    public static function all(){
      $query = DB::connection()->prepare('select * from person');
      $query->execute();
      $rows = $query->fetchAll();
      $persons = array();
      foreach($rows as $row){
        $persons[] = new Person(Array(
          'id' => $row['id'],
          'name' => $row['name'],
          'password' => $row['password'],
          'is_admin' => $row['is_admin'],
        ));
      }
      return $persons;
    }

    public static function find_by_id($id){
      $query = DB::connection()->prepare('select * from person where id = :id limit 1');
      $query->execute(array('id' => $id));
      $row = $query->fetch();
      if($row){
        $person = new Person(Array(
          'id' => $row['id'],
          'name' => $row['name'],
          'password' => $row['password'],
          'is_admin' => $row['is_admin']
        ));
        return $person;
      }
    }

    public static function authenticate_user($name, $password){
      $query = DB::connection()->prepare('SELECT id FROM person WHERE name = :name AND password = :password LIMIT 1');
      $query->execute(array('name' => $name, 'password' => $password));
      $row = $query->fetch();
      if($row){
        // Käyttäjä löytyi, palautetaan löytynyt käyttäjä oliona
        return self::find_by_id($row['id']);
      }else{
        // Käyttäjää ei löytynyt, palautetaan null
        return null;
      }
    }


  }
