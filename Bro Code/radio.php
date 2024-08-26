<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="radio.php" method="post">
    <p>
      Please select your college course:
    </p>
    <input type="radio" name="college-course" value="Bachelor of Science in Information Technology">
    <label for="Bachelor of Science in Information Technology">
      Bachelor of Science in Information Technology
    </label>
    <br>
    <input type="radio" name="college-course" value="Bachelor of Early Education">
    <label for="Bachelor of Early Education">
      Bachelor of Early Education
    </label>
    <br>
    <input type="radio" name="college-course" value="Bachelor of Science in Entrepreneurship">
    <label for="Bachelor of Science in Entrepreneurship">
      Bachelor of Science in Entrepreneurship
    </label>
    <br>
    <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>
<?php
  if (isset($_POST ['submit'])) {
    if (isset ($_POST ['college-course'])) {
      $college_course = $_POST ['college-course'];
      echo "Your college course is <b>{$college_course}</b>.";
    }
    else {
      echo'Please select your college course.';
    }
  }
?> 