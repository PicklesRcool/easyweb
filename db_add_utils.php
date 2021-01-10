<?php

include_once 'easyweb_data.php';

function DbAddDifficulty($conn, $diff) {
  $query_str = "INSERT INTO Difficulty (name) 
                VALUES ($diff->name)";

  if (mysqli_query($conn, $query_str)) {
    echo "New difficulty record created successfully";
  } else {
    echo "Error: " . $query_str . "<br>" . mysqli_error($conn);
  }
}

function DbAddSection($conn, $sect) {
  $query_str = "INSERT INTO Section (name) 
                VALUES ($sect->name)";

  if (mysqli_query($conn, $query_str)) {
    echo "New section record created successfully";
  } else {
    echo "Error: " . $query_str . "<br>" . mysqli_error($conn);
  }
}

function DbAddTask($conn, $task) {
  $query_str = "INSERT INTO Task (id_sect, id_diff, name, descr, answer) 
                VALUES ($task->id_section, $task->id_difficulty, $task->name, $task->descr, $task->answer)";

  if (mysqli_query($conn, $query_str)) {
    echo "New task record created successfully";
  } else {
    echo "Error: " . $query_str . "<br>" . mysqli_error($conn);
  }
}

function DbAddStudent($conn, $stud) {
  $query_str = "INSERT INTO Student (name, surname, email, passw) 
                VALUES ($stud->name, $stud->surname, $stud->email, $stud->passw)";

  if (mysqli_query($conn, $query_str)) {
    echo "New student record created successfully";
  } else {
    echo "Error: " . $query_str . "<br>" . mysqli_error($conn);
  }
}

?>
