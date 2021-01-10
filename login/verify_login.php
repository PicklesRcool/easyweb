<?php  // verify_login.php 

include_once '../db_utils.php';

$user_email = $_REQUEST['email'];
$user_pass  = $_REQUEST['pass'];

$conn = DbOpenCon($secret_login, $secret_passw);
DbSelectDatabase($conn, "easyweb");

if (VerifyLogin($conn, $user_email, $user_pass)) {
  header("Location: ../task-choise/task-choise.html");
}
else {
  header("Location: login.html");
}

?>
