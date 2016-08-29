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
      $query = DB::connection()->prepare("select kyyti.id as id, from_place, to_place, depart_time, name from kyyti
                                          left join person_kyyti
                                          on kyyti.id = person_kyyti.kyyti_id
                                          left join person
                                          on person_kyyti.person_id = person.id
                                          where kyyti.id = :id");
      $query->execute(array('id' => $id));
      $rows = $query->fetchAll();

      if($rows){
        $ride[] = new Ride(Array(
          'id' => $rows[0]['id'],
          'from_place' => $rows[0]['from_place'],
          'to_place' => $rows[0]['to_place'],
          'depart_time' => $rows[0]['depart_time'],
          'people' => ''
        ));
        $people = '';
        foreach($rows as $row){
          $people = $people . $row['name'] . "\n";
        }
        $ride['people'] = $people;
        // Kint::dump($ride);

        return $ride;
      }
    }

    public function save(){
      $query = DB::connection()->prepare('insert into kyyti (from_place, to_place, depart_time) values(:from_place, :to_place, :depart_time) returning id');
      $query->execute(array('from_place' => $this->from_place, 'to_place' => $this->to_place, 'depart_time' => $this->depart_time));
      $row = $query->fetch();
      $this->id = $row['id'];
    }

    public function update(){
      $query = DB::connection()->prepare('update kyyti set from_place=:from_place, to_place=:to_place, depart_time=:depart_time where id=:id');
      $query->execute(array('from_place' => $this->from_place, 'to_place' => $this->to_place, 'depart_time' => $this->depart_time, 'id' => $this->id));
    }

    public function destroy(){
      $query = DB::connection()->prepare('delete from kyyti where id=:id');
      $query->execute(array('id' => $this->id));
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
      if(!DateTime::createFromFormat('Y-m-d H:i:s', $this->depart_time)){
        $errors[] = "Virheellinen päivämäärä.";
      }
      return $errors;
    }

    public function join($id){
      $user_id = $_SESSION['user'];
      $query = DB::connection()->prepare('insert into person_kyyti (person_id, kyyti_id) values(:user_id, :ride_id)');
      $query->execute(array('user_id' => $user_id, 'ride_id' => $id));
    }

  }
