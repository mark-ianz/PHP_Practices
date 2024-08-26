<?php
  function test () {
    include_once ('./connection.php');
    $conn = connect();

    $sql = "SELECT * FROM users ORDER BY rand() LIMIT 1";
    $user = $conn->query($sql) or die ($conn->error);
    $row = $user->fetch_assoc();
    return $row;
  }

  echo json_encode(test());
?>