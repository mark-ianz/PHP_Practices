<?php
  function connect () {
    $host = 'localhost';
    $user = 'root';
    $password = '1q!2w@3e#';
    $db = 'chat';

    $conn = new mysqli($host, $user, $password, $db);

    if ($conn->error) {
      echo "Connection Error:".$conn->error;
    } else {
      return $conn;
    }
  }
?>