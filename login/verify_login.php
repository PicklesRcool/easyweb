<?php  // verify_login.php 

include '../db_utils.php';

$username = $_REQUEST['name'];
$userpass = $_REQUEST['pass'];

$conn = DbOpenCon($secret_login, $secret_passw);

if (VerifyLogin($conn, $username, $userpass)) {
  header("Location: ../task-choise");
}
else {
  header("Location: login_again.html");
}

?>
