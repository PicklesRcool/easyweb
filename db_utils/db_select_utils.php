<?php  // db_select_utils.php

function DbSelectTask($conn, $sect_id, $diff_id) {
  $query_str = "SELECT * FROM Task WHERE id_sect=$sect_id AND id_diff=$diff_id";

  $tasks = array();

  $query_result = mysqli_query($conn, $query_str);

  if (!$query_result) {
    echo "[MySql][ERROR]: " . mysqli_error($conn) . "<br>";
    exit();
  }

  if (mysqli_num_rows($query_result) == 0) {
    echo "[MySql][WARNING]: Failed to get any tasks of this section and difficulty!<br>";
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

  $rand_index = rand(0, count($tasks) - 1);

  return $tasks[$rand_index];
}

?>
