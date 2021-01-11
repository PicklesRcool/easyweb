<?php  // db_add_utils.php

function DbAddScore($conn, $student_id, $task_id, $score, $time_start, $duration) {
  $query_str = "INSERT INTO `Score`(`id_student`, `id_task`, `score`, `time_start`, `duration_ms`) 
                            VALUES ($student_id,  $task_id,  $score, '$time_start', $duration)";

  $query_result = mysqli_query($conn, $query_str);

  if (!$query_result) {
    echo "[MySql][ERROR]: " . mysqli_error($conn) . "<br>";
    exit();
  }
}

?>
