<?php

function DbOpenCon() {
  $dbhost       = "localhost";
  $secret_login = "Volodia";
  $secret_passw = "44845Volodia";
  $db           = "easyweb";

  // Create connection
  $conn = new mysqli($dbhost, $secret_login, $secret_passw, $db);
  
  // Check connection
  if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error . "<br>";
  } else {
    echo "Connected successfully!<br>";
  }

  return $conn;
}

function DbSelectDatabase($conn, $dbname) {
  $query_str = "USE " . $dbname;

  $query_result = mysqli_query($conn, $query_str);

  if (!$query_result) {
    echo "MySql error: " . mysqli_error($conn) . "<br>";
  }
}
 
function DbCloseCon($conn) {
  $conn->close();
}

include_once 'db_get_utils.php';
include_once 'db_add_utils.php';

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
