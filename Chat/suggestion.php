<?php
  if (isset ($_POST ['suggestion'])) {
    include_once ('./connection.php');
    $conn = connect();

    $input = $_POST['suggestion'];

    if (!empty ($input)) {
      $sql = "SELECT * FROM users WHERE first_name LIKE '$input%'";
      $user = $conn->query($sql) or die ($conn->error);
      $row = $user->fetch_assoc();
      
      if ($user->num_rows <= 0) {
        echo "<p>No result.</p>";
      } else {
        do {
          echo "<p>".$row ['first_name']."</p>";
        } while ($row = $user->fetch_assoc());
      }

    }
    
  }
?>