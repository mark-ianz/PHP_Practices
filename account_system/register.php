<?php
  if (!isset($_SESSION)) {
    session_start();
  };

  if (isset ($_SESSION ['user_id'])) {
    header("Location: home.php");
  }

  include_once ("connection.php");

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
  <h1>Register</h1>
  <form action="<?php $_SERVER ['PHP_SELF'] ?>" method="post">
    <label for="user-input">
      Username:
    </label>
    <input type="text" name="user-input" maxlength="50" required>
    <br>
    <br>
    <label for="password-input">
      Password:
    </label>
    <input type="password" name="password-input" class="js-password-input" minlength="8" required>
    <input type="checkbox" name="js-show-password" class="js-showPW-cb">
    <label for="js-show-password" class="js-showPW-txt">
      Show Password
    </label>
    <br>
    <br>
    <label for="gender-select">
      Gender:
    </label>
    <select name="gender-select" required>
      <option value="Male">
        Male
      </option>
      <option value="Female">
        Female
      </option>
    </select>
    <label for="birthdate">
      Birthday:
    </label>
    <input type="date" name="birthdate" required>
    <br>
    <br>
    <input type="submit" value="Register" name="submit">
    <a href="./login.php">
      Already have an account?
    </a>
  </form>
  <script>
    const PW_INPUT = document.querySelector ('.js-password-input')
    const SHOW_PW_CB = document.querySelector ('.js-showPW-cb');
    const SHOW_PW_TXT = document.querySelector ('.js-showPW-txt');
    
    SHOW_PW_CB.addEventListener ('click', togglePassword);
    SHOW_PW_TXT.addEventListener ('click', togglePassword);
    
    function togglePassword () {
      if (SHOW_PW_CB.checked) {
        PW_INPUT.type = 'text';
      } else {
        PW_INPUT.type = 'password';
      }
    };

    SHOW_PW_TXT.addEventListener ('click', ()=> {
      if (!SHOW_PW_CB.checked) {
        SHOW_PW_CB.checked = true;
      } else {
        SHOW_PW_CB.checked = false;
      };
      togglePassword ();
    })
  </script>
</body>
</html>

<?php
  try {
    if (isset ($_POST ['submit'])) {
      $username = $_POST ['user-input'];
      $password = password_hash($_POST ['password-input'], PASSWORD_DEFAULT);
      $gender = $_POST ['gender-select'];
      $birthdate = $_POST ['birthdate'];
  
      $sql = "INSERT INTO `account_system` (`id`, `username`, `password`, `gender`, `birthdate`) 
        VALUES (NULL, '$username', '$password', '$gender', '$birthdate');";
  
      $conn->query($sql) or die ($conn->error);
  
      header("Location: login.php");
    };
  } catch (mysqli_sql_exception) {
    echo "Username is already taken.";
  }
?>