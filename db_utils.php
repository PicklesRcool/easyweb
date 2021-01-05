<?php

namespace EasyWeb

function DbOpenCon(string $dbuser, string $dbpass) {
  $dbhost = "localhost";
  $db     = "easyweb";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);
  
  // Check connection
  if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    return false;
  }

  echo "Connected successfully";
  return true;
}
 
function DbCloseCon($conn) {
  $conn->close();
}

include 'db_get_utils.php';
include 'db_add_utils.php';

?>
