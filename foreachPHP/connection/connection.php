<?php
  function connection () {
    try {
      $host = 'localhost';
      $user = 'root';
      $pw = '192168110123';
      $db = 'test';
    
      $conn = new mysqli ($host, $user, $pw, $db);

      return $conn;

    } catch (mysqli_sql_exception) {
      echo "Connection Error!";
    }
  }
?>