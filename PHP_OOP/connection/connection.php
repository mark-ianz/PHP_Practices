<?php

  function connect () {
    $host = 'localhost';
    $user = 'root';
    $password = '1q!2w@3e#';
    $db = 'student_system';

    $conn = new mysqli($host, $user, $password, $db);

    if ($conn->error) {
      echo "Connection Error";
    } else {
      return $conn;
    }
  }

?>