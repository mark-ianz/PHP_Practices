<?php

  include_once ('./connection.php');
  $conn = connect();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>image upload</title>
</head>
<body>
  <form action="<?php $_SERVER ['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <label for="username">
      Username
    </label>
    <input type="text" name="username">
    <br>
    <br>
    <label for="profile-pic">
      Profile Picture
    </label>
    <input type="file" name="profile-pic" required>
    <input type="submit" name="submit" value="Submit!">
  </form>
</body>
</html>

<?php
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $file = $_FILES['profile-pic'];
    
    $file_name = $file['name'];
    $file_tmp_name = $file['tmp_name'];

    $name_seperate = explode('.', $file_name);
    $file_extension = end($name_seperate);
    $allowed_extension = ['jpeg', 'jpg', 'png'];

    $image_name = "";
    if (!(in_array($file_extension, $allowed_extension))) {
      echo "Only JPG/JPEG/PNG files are accepted.";
      return;
    } else {
      $image_name = strtoupper("IMG_".uniqid()).".".$file_extension;
    }

    $upload_image = 'images/'.$image_name;
    move_uploaded_file($file_tmp_name, $upload_image);
    $sql = "INSERT INTO `registration` (`id`, `username`, `profile-pic`) 
      VALUES (NULL, '$username', '$upload_image');";

    $result = $conn->query($sql) or die ($conn->error);

    header("Location: ./output.php");
  }

?>