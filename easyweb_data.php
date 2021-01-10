<?php 

class Difficulty {
  public $id;
  public $name;
}

class Section {
  public $id;
  public $name;
}

class Task {
  public $id;
  public $id_section;
  public $id_difficulty;
  public $name;
  public $descr;
  public $answer;
}

class Student {
  public $id;
  public $name;
  public $surname;
  public $email;
  public $passw;
}

class Score {
  public $id;
  public $id_student;
  public $id_task;
  public $score;
  public $time_start;
  public $time_end;
}

?>
