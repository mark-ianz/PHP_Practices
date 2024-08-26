<?php
  include_once ('./connection/connection.php');
  $conn = connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="<?php $_SERVER ['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <label for="username">
      Username:
    </label>
    <input type="text" name="username">
    <br>
    <br>
    <label for="password">
      Password:
    </label>
    <input type="password" name="password">
    <br>
    <br>
    <label for="birth-date">
      Birthdate
    </label>
    <input type="date" name="birth-date">
    <br>
    <br>
    <label for="profile-pic">
      Upload a profile picture
    </label>
    <br>
    <input type="file" name="profile-pic">
    <br>
    <br>
    <input type="submit" name="submit" value="Register">
  </form>
</body>
</html>

<?php
  if (isset ($_POST ['submit'])) {
    $username = $_POST ['username'];
    $password = password_hash($_POST ['password'], PASSWORD_DEFAULT);
    $birth_date = $_POST ['birth-date'];
    $profile_picture = $_FILES ['profile-pic'];

    $image_name = $profile_picture ['name'];
    $image_tmp_name = $profile_picture ['tmp_name'];

    $name_seperator = explode('.', $image_name);
    $image_type = end($name_seperator);
    $allowed_extension = ['jpeg', 'jpg', 'png'];

    if (in_array($image_type, $allowed_extension)) {
      $image_name = "PF_PIC_".strtoupper(uniqid()).'.'.$image_type;
      $upload_image = "images/".$image_name;
      move_uploaded_file($image_tmp_name,$upload_image);

      $sql = "INSERT INTO `registration` (`id`, `username`, `password`, `birth_date`, `profile_picture`, `registration_date`) 
        VALUES (NULL, '$username', '$password', '$birth_date', '$upload_image', 'current_timestamp()')";

      $conn->query($sql) or die ($conn->error);
    } else {
      echo "<p>Only JPEG/JPG/PNG files are allowed.</p>";
    }

  }
?>