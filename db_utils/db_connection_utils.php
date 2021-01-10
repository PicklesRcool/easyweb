<?php  // db_connection_utils.php

class Database {

  private static $db;
  private $conn;

  private function __construct() {
    $this->conn = new MySQLi("localhost", "Volodia", "44845Volodia", "easyweb");

    if ($conn->connect_error) {
      echo "[MySql][ERROR]: Connection failed: " . $conn->connect_error . "<br>";
    } else {
      //echo "[MySql][INFO]: Connected successfully!<br>";
    }
  }

  function __destruct() {
    $this->conn->close();
  }

  public static function getConnection() {
    if (self::$db == null) {
      self::$db = new Database();
    }

    return self::$db->conn;
  }
}

function DbSelectDatabase($conn, $dbname) {
  $query_str = "USE " . $dbname;

  $query_result = mysqli_query($conn, $query_str);

  if (!$query_result) {
    echo "[MySql][ERROR]: " . mysqli_error($conn) . "<br>";
  }
} 

?>
