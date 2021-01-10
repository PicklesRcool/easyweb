<?php

include_once 'easyweb_data.php';

function DbGetAllDifficulties($conn) {
  $query_str = "SELECT * FROM Difficulty";
  $difficulties = array();

  $query_result = mysqli_query($conn, $query_str);

  if (mysqli_num_rows($query_result) == 0) {
    echo "Failed to get any difficulties from the database";
    return $difficulties;
  }

  while ($row = mysqli_fetch_assoc($query_result)) {
    $diff = new Difficulty();

    $diff->id   = $row["id"];
    $diff->name = $row["name"];
    
    $difficulties[] = $diff;
  }

  return $difficulties;
}

function DbGetAllSections($conn) {
  $query_str = "SELECT * FROM Section";
  $sections = array();

  $query_result = mysqli_query($conn, $query_str);

  if (mysqli_num_rows($query_result) == 0) {
    echo "Failed to get any section from the database";
    return $sections;
  }

  while ($row = mysqli_fetch_assoc($query_result)) {
    $sect = new Section();

    $sect->id   = $row["id"];
    $sect->name = $row["name"];
    
    $sections[] = $sect;
  }

  return $sections;
}

function DbGetAllTasks($conn) {
  $query_str = "SELECT * FROM Task";
  $tasks = array();

  $query_result = mysqli_query($conn, $query_str);

  if (mysqli_num_rows($query_result) == 0) {
    echo "Failed to get any tasks from the database";
    return $tasks;
  }

  while ($row = mysqli_fetch_assoc($query_result)) {
    $task = new Task();

    $task->id             = $row["id"];
    $task->id_section     = $row["id_sect"];
    $task->id_difficulty  = $row["id_diff"];
    $task->name           = $row["name"];
    $task->descr          = $row["descr"];
    $task->answer         = $row["answer"];

    $tasks[] = $task;
  }

  return $tasks;
}

function DbGetAllStudents($conn) {
  $query_str = "SELECT * FROM Student";
  $students = array();

  $query_result = mysqli_query($conn, $query_str);

  if (!$query_result) {
    echo "[MySql][ERROR]: " . mysqli_error($conn) . "<br>";
  }

  $row_num = mysqli_num_rows($query_result);

  if ($row_num == 0) {
    echo "[MySql][WARNING]: Failed to get any students from the database!<br>";
    return $students;
  }

  while ($row = mysqli_fetch_assoc($query_result)) {
    $stud = new Student();

    $stud->id       = $row['id'];
    $stud->name     = $row['name'];
    $stud->surname  = $row['surname'];
    $stud->email    = $row['email'];
    $stud->passw    = $row['passw'];
    
    $students[] = $stud;
  }

  return $students;
}

function DbGetAllScores($conn) {
  $query_str = "SELECT * FROM Score";
  $scores = array();

  $query_result = mysqli_query($conn, $query_str);

  if (mysqli_num_rows($query_result) == 0) {
    echo "Failed to get any scores from the database";
    return $scores;
  }

  while ($row = mysqli_fetch_assoc($query_result)) {
    $score = new Score();

    $score->id          = $row["id"];
    $score->id_student  = $row["id_student"];
    $score->id_task     = $row["id_task"];
    $score->score       = $row["score"];
    $score->time_start  = $row["time_start"];
    $score->time_end    = $row["time_end"];

    $scores[] = $score;
  }

  return $scores;
}

?>
