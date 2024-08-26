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
  <form action="<?php $_SERVER ["PHP_SELF"]?>" method="post">
    <h1>
      Register form:
    </h1>
    <label for="create-username">
      Create a username:
    </label>
    <input type="text" name="create-username">
    <br>
    <br>
    <label for="create-password">
      Create a password:
    </label>
    <input type="password" name="create-password">
    <input type="submit" value="Create" name="submit">
    <button name="login">
      Login
    </button>
  </form>
</body>
</html>
<?php
  if (isset ($_POST["submit"])) {
    if (empty ($_POST ["create-username"])) {
      echo"Please type a username.";
    }
    else if (empty ($_POST ["create-password"])) {
      echo"Please type a password.";
    }
    else {
      $_SESSION ["username"] = $_POST ["create-username"];
      $_SESSION ["password"] = $_POST ["create-password"];
      header("Location: login.php");
    }
  }
  if (isset ($_POST["login"])) {
    header("Location: login.php");
  }
?>