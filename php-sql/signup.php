<?php
  include ("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
</head>
<body>
  <form action="<?php $_SERVER ["PHP_SELF"] ?>" method="post">
    <h1>
      Register
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
    <br>
    <br>
    <label for="confirm-password">
      Confirm password:
    </label>
    <input type="password" name="confirm-password">
    <input type="submit" value="Sign up!" name="signup">
    <p>
      Already have an account?
      <a href="./login.php">Login</a>
    </p>
  </form>
</body>
</html>

<?php
  if (isset($_POST ["signup"])) {

    if (!empty ($_POST ["username"]) && !empty ($_POST ["password"])) {
      if (strlen($_POST ["password"]) < 8) {
        echo"<p>Password must be at least 8 characters long.</p>";
      }

      else if ($_POST ["password"] !== $_POST ["confirm-password"]) {
        echo "<p>Password is not match.</p>";
      }

      else {
        
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = password_hash($_POST ["password"], PASSWORD_DEFAULT);
      
        $sql = "INSERT INTO users (user, password) VALUES ('$username', '$password')";
      
        try {
          mysqli_query($conn, $sql);
        }
        catch (mysqli_sql_exception) {
          echo "<p>That username is taken.</p>";
          return;
        }
        echo "<p>You successfully registered.</p>";
      }
    }
    else if (empty ($_POST ["username"])) {
      echo "<p>Please enter a username.</p>";
    }
    else if (empty ($_POST ["password"])) {
      echo "<p>Please enter a password.</p>";
    }
  }
  mysqli_close($conn);
?>  
