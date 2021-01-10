<?php  // verify_login.php 

header("Location: ../task-choise/task-choise.html");

include '../db_utils.php';

header("Location: ../task-choise/task-choise.html");

$conn = DbOpenCon($secret_login, $secret_passw);

header("Location: ../task-choise/task-choise.html");

if (VerifyLogin($conn, $username, $userpass)) {
  header("Location: ../task-choise/task-choise.html");
}
else {
  header("Location: login.html");
}

$username = $_REQUEST['name'];
$userpass = $_REQUEST['pass'];

?>
