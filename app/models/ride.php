<?php

  class Ride extends BaseModel{

    public $id, $from_place, $to_place, $depart_time;

    public function __construct($attributes){
      parent::__construct($attributes);
      $this->validators = array('validate_from_place', 'validate_to_place', 'validate_depart_time');
    }

    public static function all(){
      $query = DB::connection()->prepare('select * from kyyti');
      $query->execute();
      $rows = $query->fetchAll();
      $rides = array();
      foreach($rows as $row){
        $rides[] = new Ride(Array(
          'id' => $row['id'],
          'from_place' => $row['from_place'],
          'to_place' => $row['to_place'],
          'depart_time' => $row['depart_time'],
        ));
      }
      return $rides;
    }

    public static function find_by_id($id){
      $query = DB::connection()->prepare('select * from kyyti where id = :id limit 1');
      $query->execute(array('id' => $id));
      $row = $query->fetch();
      if($row){
        $ride[] = new Ride(Array(
          'id' => $row['id'],
          'from_place' => $row['from_place'],
          'to_place' => $row['to_place'],
          'depart_time' => $row['depart_time'],
        ));
        return $ride;
      }
    }

    public function save(){
      $query = DB::connection()->prepare('insert into kyyti (from_place, to_place, depart_time) values(:from_place, :to_place, :depart_time) returning id');
      $query->execute(array('from_place' => $this->from_place, 'to_place' => $this->to_place, 'depart_time' => $this->depart_time));
      $row = $query->fetch();
      $this->id = $row['id'];
    }


    public function validate_from_place() {
      return $this->validate_string($this->from_place);
    }

    public function validate_to_place() {
      return $this->validate_string($this->to_place);
    }

    public function validate_string($str){
      $errors = array();
      if($str == '' || $str == null){
        $errors[] = 'Tyhjä merkkijono.';
      }
      return $errors;
    }

    public function validate_depart_time(){
      $errors = array();
      if(!DateTime::createFromFormat('Y-m-d H:i', $this->depart_time)){
        $errors[] = "Virheellinen päivämäärä.";
      }
      return $errors;
    }

  }
