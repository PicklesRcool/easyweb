<?php  // db_login_utils.php 

include_once 'db_get_utils.php';

function VerifyLogin($conn, $entered_email, $entered_passw) {
  $users = DbGetAllStudents($conn);

  foreach ($users as $user) {
    if ($user->email == $entered_email && $user->passw == $entered_passw) {
      return true;
    }
  }

  return false;
}

?>
