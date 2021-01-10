<?php  // verify_login.php 

include_once '../db_utils/db_utils.php';

$user_email = $_REQUEST['email'];
$user_pass  = $_REQUEST['pass'];

$conn = Database::getConnection();
DbSelectDatabase($conn, "easyweb");

if (VerifyLogin($conn, $user_email, $user_pass)) {
  header("Location: ../task-choise/task-choise.php");
}
else {
  header("Location: login.html");
}

?>
