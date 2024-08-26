<?php
  function validateUsername ($usernameInput) {
    include_once ('./connection.php');
    $conn = connect();
    
    $sql = "SELECT * FROM users WHERE username = '$usernameInput'";
    $users = $conn->query($sql) or die ($conn->error);
    $row = $users->fetch_assoc();

    if ($users->num_rows > 0) return true;
    

    
  }

?>