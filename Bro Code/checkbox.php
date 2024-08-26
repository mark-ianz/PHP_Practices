<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="checkbox.php" name="colors" method="post">
    <p>
      Select your favorite colors:
    </p>
    <input type="checkbox" name="red" value="Red">
    <label for="red">
      Red
    </label>
    <br>
    <input type="checkbox" name="blue" value="Blue">
    <label for="blue">
      Blue
    </label>
    <br>
    <input type="checkbox" name="black" value="Black">
    <label for="black">
      Black
    </label>
    <br>
    <input type="checkbox" name="green" value="Green">
    <label for="green">
      Green
    </label>
    <br>
    <input type="checkbox" name="yellow" value="Yellow">
    <label for="yellow">
      Yellow
    </label>
    <br>
    <input type="checkbox" name="khaki" value="Khaki">
    <label for="khaki">
      Khaki
    </label>
    <br>
    <input type="checkbox" name="maroon" value="Maroon">
    <label for="maroon">
      Maroon
    </label>
    <br>
    <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>
<?php
  if (isset($_POST ['submit'])) {
    $favorite_colors = array ();
    if (isset($_POST ['red'])) {
      array_push($favorite_colors, 'Red');
    }
    if (isset($_POST ['blue'])) {
      array_push($favorite_colors, 'Blue');
    }
    if (isset($_POST ['black'])) {
      array_push($favorite_colors, 'Black');
    }
    if (isset($_POST ['green'])) {
      array_push($favorite_colors, 'Green');
    }
    if (isset($_POST ['yellow'])) {
      array_push($favorite_colors, 'Yellow');
    }
    if (isset($_POST ['khaki'])) {
      array_push($favorite_colors, 'Khaki');
    }
    if (isset($_POST ['maroon'])) {
      array_push($favorite_colors, 'Maroon');
    }
    else {
      echo"Please make a selection.";
      return;
    }
    echo"Your favorite color/s are:".'<br>';
    foreach ($favorite_colors as $color) {
      echo "&#8226; $color".'<br>';
    } 
  }
?>