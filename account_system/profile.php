<?php
  if (!(isset ($_SESSION))) {
    session_start();
  }

  include_once ("./connection.php");
  $conn = connect();

  $id = $_GET ['id'];

  $sql = "SELECT * FROM account_system WHERE id = '$id'";
  $user = $conn->query($sql) or die ($conn->error);
  $row = $user->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Profile of <?php echo $row ['username']?></h1>
  <p>Username: <?php echo $row ['username']?></p>
  <p>Gender: <?php echo $row ['gender']?></p>
  <p>Birthdate: <?php echo $birthdate = ($row ['birthdate'])?></p>

  <?php 
    if (isset ($_SESSION ['id']) && $_SESSION ['id'] === $id) {
      echo "
        <a href=\"edit.php?id=$id\">
          Edit
        </a>
        <br>
      ";
    }
  ?>
  <a href="home.php">
    Go Back
  </a>
</body>
</html>