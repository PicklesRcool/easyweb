<?php  // verify_login.php 

include '../db_utils.php';

$username = $_REQUEST['name'];
$userpass = $_REQUEST['pass'];

if (DbOpenCon($username, $userpass)) {
  header("Location: ../task-choise");
}
else {
  header("Location: login_again.html");
}

?>
