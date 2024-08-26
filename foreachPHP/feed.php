<?php
  include_once ('./connection/connection.php');
  
  $conn = connection();

  $sql = "SELECT * FROM movies";

  $movies = $conn->query($sql) or die ($conn->error);
  $row = $movies->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/general.css">
  <link rel="stylesheet" href="./css/header.css">
  <title>Document</title>
</head>
<body>
  <?php
    include ('./include/header.php')
  ?>
  <?php
    do {
      echo $row ['id'].". ".$row ['movie_title']."<br>";
    } while ($row = $movies->fetch_assoc());
  ?>
</body>
</html>