<?php  // verify_login.php 

include '../db_utils.php';

$conn = DbOpenCon($secret_login, $secret_passw);
DbSelectDatabase($conn, "easyweb");

if (VerifyLogin($conn, $username, $userpass)) {
  header("Location: ../task-choise/task-choise.html");
}
else {
  header("Location: login.html");
}

$username = $_REQUEST['name'];
$userpass = $_REQUEST['pass'];

?>
