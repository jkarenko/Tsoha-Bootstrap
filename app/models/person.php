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

    public static function get_person_rides($id){
      $query = DB::connection()->prepare("select kyyti.id as id, from_place, to_place, depart_time, name from kyyti
                                          join person_kyyti on kyyti.id = person_kyyti.kyyti_id
                                          join person on person_kyyti.person_id = person.id
                                          where person.id = :id");
      $query->execute(array('id' => $id));
      $rows = $query->fetchAll();
      if($rows){
        $rides = array();
        foreach($rows as $row){
          $rides[] = Array(
            'id' => $row['id'],
            'from_place' => $row['from_place'],
            'to_place' => $row['to_place'],
            'depart_time' => $row['depart_time'],
            'name' => $row['name']
          );
        }
        return $rides;
      }
    }


  }
