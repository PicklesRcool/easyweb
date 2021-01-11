<?php  // db_get_utils.php
include_once 'easyweb_data.php';

function DbGetAllDifficulties($conn) {
  $query_str = "SELECT * FROM Difficulty";
  $difficulties = array();

  $query_result = mysqli_query($conn, $query_str);
  
  if (!$query_result) {
    echo "[MySql][ERROR]: " . mysqli_error($conn) . "<br>";
    exit();
  }

  if (mysqli_num_rows($query_result) == 0) {
    echo "[MySql][WARNING]: Failed to get any difficulties from the database!<br>";
    return $difficulties;
  }

  while ($row = mysqli_fetch_assoc($query_result)) {
    $diff = new Difficulty();

    $diff->id   = $row['id'];
    $diff->name = $row['name'];
    
    $difficulties[] = $diff;
  }

  return $difficulties;
}

function DbGetDifficultyById($conn, $id) {
  $difficulties = DbGetAllDifficulties($conn);

  foreach ($difficulties as $diff) {
    if ($diff->id == $id) {
      return $diff;
    }
  }

  echo "[MySql][WARNING]: Failed to find difficulty with given id!<br>";
  return false;
}

function DbGetAllSections($conn) {
  $query_str = "SELECT * FROM Section";
  $sections = array();

  $query_result = mysqli_query($conn, $query_str);

  if (!$query_result) {
    echo "[MySql][ERROR]: " . mysqli_error($conn) . "<br>";
    exit();
  }

  if (mysqli_num_rows($query_result) == 0) {
    echo "[MySql][WARNING]: Failed to get any sections from the database!<br>";
    return $sections;
  }

  while ($row = mysqli_fetch_assoc($query_result)) {
    $sect = new Section();

    $sect->id   = $row['id'];
    $sect->name = $row['name'];
    
    $sections[] = $sect;
  }

  return $sections;
}

function DbGetSectionById($conn, $id) {
  $sections = DbGetAllSections($conn);

  foreach ($sections as $sect) {
    if ($sect->id == $id) {
      return $sect;
    }
  }

  echo "[MySql][WARNING]: Failed to find section with given id!<br>";
  return false;
}

function DbGetAllTasks($conn) {
  $query_str = "SELECT * FROM Task";
  $tasks = array();

  $query_result = mysqli_query($conn, $query_str);

  if (!$query_result) {
    echo "[MySql][ERROR]: " . mysqli_error($conn) . "<br>";
    exit();
  }

  if (mysqli_num_rows($query_result) == 0) {
    echo "[MySql][WARNING]: Failed to get any tasks from the database!<br>";
    return $tasks;
  }

  while ($row = mysqli_fetch_assoc($query_result)) {
    $task = new Task();

    $task->id             = $row['id'];
    $task->id_section     = $row['id_sect'];
    $task->id_difficulty  = $row['id_diff'];
    $task->name           = $row['name'];
    $task->descr          = $row['descr'];
    $task->answer         = $row['answer'];

    $tasks[] = $task;
  }

  return $tasks;
}

function DbGetTaskById($conn, $id) {
  $tasks = DbGetAllTasks($conn);

  foreach ($tasks as $task) {
    if ($task->id == $id) {
      return $task;
    }
  }

  echo "[MySql][WARNING]: Failed to find task with given id!<br>";
  return false;
}

function DbGetAllStudents($conn) {
  $query_str = "SELECT * FROM Student";
  $students = array();

  $query_result = mysqli_query($conn, $query_str);

  if (!$query_result) {
    echo "[MySql][ERROR]: " . mysqli_error($conn) . "<br>";
    exit();
  }

  if (mysqli_num_rows($query_result) == 0) {
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

function DbGetStudentById($conn, $id) {
  $students = DbGetAllStudents($conn);

  foreach ($students as $stud) {
    if ($stud->id == $id) {
      return $stud;
    }
  }

  echo "[MySql][WARNING]: Failed to find student with given id!<br>";
  return false;
}

function DbGetAllScores($conn) {
  $query_str = "SELECT * FROM Score";
  $scores = array();

  $query_result = mysqli_query($conn, $query_str);

  if (!$query_result) {
    echo "[MySql][ERROR]: " . mysqli_error($conn) . "<br>";
    exit();
  }

  if (mysqli_num_rows($query_result) == 0) {
    echo "[MySql][WARNING]: Failed to get any scores from the database!<br>";
    return $scores;
  }

  while ($row = mysqli_fetch_assoc($query_result)) {
    $score = new Score();

    $score->id          = $row['id'];
    $score->id_student  = $row['id_student'];
    $score->id_task     = $row['id_task'];
    $score->score       = $row['score'];
    $score->time_start  = $row['time_start'];
    $score->time_end    = $row['time_end'];

    $scores[] = $score;
  }

  return $scores;
}

function DbGetScoreById($conn, $id) {
  $scores = DbGetAllScores($conn);

  foreach ($scores as $score) {
    if ($score->id == $id) {
      return $score;
    }
  }

  echo "[MySql][WARNING]: Failed to find score with given id!<br>";
  return false;
}

?>
