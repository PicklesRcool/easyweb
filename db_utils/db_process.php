<?php  // db_process.php

function EvaluateTask($solution, $etalon, $duration, $max_mark) {
  similar_text($etalon, $solution, $solution_coef);
  
  $solution_coef = $solution_coef / 100.0;

  $too_slow_coef = ($duration <= 180000) ? 1 : 180000.0 / $duration;

  $final_coef = $solution_coef * $too_slow_coef;

  $mark = $max_mark * $final_coef;

  return round($mark);
}

?>