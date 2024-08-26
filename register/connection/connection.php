<?php
  function connect () {
    $host = 'localhost';
    $user = 'root';
    $password = '1q!2w@3e#';
    $db = 'image-upload';

    $conn = new mysqli($host, $user, $password, $db) or die ($conn->error);

    if ($conn->error) {
      echo "RERO";
    } else {
      return $conn;
    }
  }
?>