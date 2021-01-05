<?php

namespace EasyWeb

$secret_login = "Volodia";
$secret_passw = "44845Volodia";

function DbOpenCon($dbuser, $dbpass) {
  $dbhost = "localhost";
  $db     = "easyweb";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);
  
  // Check connection
  if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
  } else {
    echo "Connected successfully";
  }

  return $conn;
}
 
function DbCloseCon($conn) {
  $conn->close();
}

include 'db_get_utils.php';
include 'db_add_utils.php';

function VerifyLogin($conn, $entered_name, $entered_passw) {
  $users = DbGetAllStudents($conn)

  foreach ($users as $user) {
    if ($user->name == $entered_name && $user->passw == $entered_passw) {
      return true;
    }
  }

  return false;
}

?>
