<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="sanitize-validate.php" method="post">
    <label for="age">
      Age:
    </label>
    <br>
    <input type="text" name="age">
    <br>
    <label for="email">
      Email:
    </label>
    <br>
    <input type="text" name="email">
    <input type="submit"  name="login" value="login">
  </form>
</body>
</html>
<?php
  if (isset($_POST ['login'])) {
    if (empty ($_POST ['age']) || empty ($_POST ['email'])) {
      echo"Please input the missing field.";
      return;
    }

    $age = filter_input (INPUT_POST, 'age', FILTER_VALIDATE_INT);

    $email = filter_input (INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if (empty($age)) {
      echo"That number wasn't valid.".'<br>';
    }
    else {
      echo"You are $age years old.".'<br>';
    }

    if (empty($email)) {
      echo"That email wasn't valid.".'<br>';
    }
    else {
      echo"Your email is: $email".'<br>';
    }
  }
?>