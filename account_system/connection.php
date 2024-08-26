<?php
  function connect () {
    $host = "localhost";
    $user = "root";
    $pass = "1q!2w@3e#";
    $db = "php_practice";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
      echo "Connection Error!";
    } else {
      return $conn;
    }
  }
?>