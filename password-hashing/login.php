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
  <form action="<?php $_SERVER ["PHP_SELF"] ?>" method="post">
    <h1>
      Login
    </h1>
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
    <input type="submit" value="Login" name="submit">
    <button name="register">
      Register
    </button>
  </form>
</body>
</html>
<?php
  if (isset ($_POST ["submit"])) {
    $username = $_SESSION ["username"];
    $password = $_SESSION ["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    if (password_verify($_POST ["password"], $hash) && $username === $_POST ["username"]) {
      echo"You successfully logged in!". "<br>";
    }
    else {
      echo"Incorrect username or password.". "<br>";
    }
  }
  if (isset($_POST ["register"])) {
    header("Location: register.php");
  }
?>