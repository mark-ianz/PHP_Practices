<?php
  function validateEmail ($emailInput) {
    include_once ('./connection.php');
    $conn = connect();
    
    $sql = "SELECT * FROM users WHERE email = '$emailInput'";
    $users = $conn->query($sql) or die ($conn->error);

    if ($users->num_rows > 0) return true;
  }

?>