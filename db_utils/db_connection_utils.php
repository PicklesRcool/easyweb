<?php  // db_connection_utils.php

function DbOpenCon() {
  $dbhost       = "localhost";
  $secret_login = "Volodia";
  $secret_passw = "44845Volodia";
  $db           = "easyweb";

  // Create connection
  $conn = new mysqli($dbhost, $secret_login, $secret_passw, $db);
  
  // Check connection
  if ($conn->connect_error) {
    echo "[MySql][ERROR]: Connection failed: " . $conn->connect_error . "<br>";
  } else {
    echo "[MySql][INFO]: Connected successfully!<br>";
  }

  return $conn;
}

function DbSelectDatabase($conn, $dbname) {
  $query_str = "USE " . $dbname;

  $query_result = mysqli_query($conn, $query_str);

  if (!$query_result) {
    echo "[MySql][ERROR]: " . mysqli_error($conn) . "<br>";
  }
} 
 
function DbCloseCon($conn) {
  $conn->close();
}

?>
