<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="index.php " method="post">
    <label for="username">
      Username:
    </label>
    <input type="text" name="username-input">
    <br>
    <br>
    <label for="password">
      Password:
    </label>
    <input type="password" name="password-input">
    <br>
    <br>
    <input type="submit" value="Login" name="login">
  </form>
  <br>
</body>
</html>
<?php
  if (isset($_POST ["login"])) {
    $usernameInput = $_POST ["username-input"];
    $passwordInput = $_POST ["password-input"];

    if (!empty ($usernameInput) && !empty ($passwordInput)) {
      $_SESSION ["username"] = $usernameInput;
      $_SESSION ["password"] = $passwordInput;
      echo"Your username is: $usernameInput"."<br>";
      echo"Your password is: $passwordInput"."<br>";
      header ("Location: home.php");
    }
    else {
      echo"Please input the missing field.";
    }
  }
  echo $_SERVER ["PHP_SELF"];
?>