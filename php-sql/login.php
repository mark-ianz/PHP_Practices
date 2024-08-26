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
    <input type="submit" value="Login" name="login">
    <p>
      Don't have an account?
      <a href="./signup.php">Create now!</a>
    </p>
  </form>
</body>
</html>
<?php
  if (isset($_POST ["login"])) {
    $username = $_POST ["username"];
    $password = $_POST ["password"];
    require_once "database.php";
    $sql = 'SELECT * FROM users WHERE user = ';

    $result = mysqli_query($conn, $sql);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    print_r($users); 

    mysqli_close ($conn);
  }
?>