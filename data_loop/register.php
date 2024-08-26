<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  include_once ('./connection/connection.php');

  $conn = connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/register.css">
  <title>Document</title>
</head>
<body>
  <h1>
    Register
  </h1>
  <form action="<?php $_SERVER ['PHP_SELF'] ?>" method="post" class="register-form">
    <div class="input-container">
      <label for="username">
        Username:
      </label>
      <input type="text" name="username">
    </div>
    <div class="input-container">
      <label for="password">
        Password:
      </label>
      <input type="password" name="password">
    </div>
    <div class="input-container">
      <label for="gender-select">
        Gender:
      </label>
      <select name="gender-select">
        <option value="Male">
          Male
        </option>
        <option value="Female">
          Female
        </option>
      </select>
    </div>
    <div class="input-container">
      <label for="birthdate">
        Birthdate:
      </label>
      <input type="date" name="birthdate">
    </div>
    <input type="submit" value="Register" name="submit" class="submit-button">
  </form>
</body>
</html>
<?php
  if (isset ($_POST ['submit'])) {
    try {
      $username = $_POST ['username'];
      $password = password_hash($_POST ['password'], PASSWORD_DEFAULT);
      $gender = $_POST ['gender-select'];
      $birthdate = $_POST ['birthdate'];

      $sql = "INSERT INTO `account_system` (`id`, `username`, `password`, `gender`, `birthdate`) 
        VALUES (NULL, '$username', '$password', '$gender', '$birthdate')";

      $conn->query($sql) or die ($conn->error);

      header('Location: login.php');
    } catch (mysqli_sql_exception) {
      echo "<p>Username is already taken.</p>";
      header('Location: register.php');
    }
  }
?>