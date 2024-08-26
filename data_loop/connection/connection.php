<?php
  function connect () {
    $host = 'localhost';
    $user = 'root';
    $password = '1q!2w@3e#';
    $db = 'php_practice';

    $conn = new mysqli ($host, $user, $password, $db);

    if ($conn->connect_error) {
      echo $conn->connect_error;
    } else {
      return $conn;
    }
  }
?>