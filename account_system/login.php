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
  <h1>Login</h1>
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
    <input type="submit" value="Login" name="submit">
    <a href="./register.php">
      Don't have an account?
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
  if (isset ($_POST ['submit'])) {
    $username = $_POST ['user-input'];
    $password = $_POST ['password-input'];

    $sql = "SELECT * FROM account_system WHERE username = '$username'";

    $user = $conn->query($sql) or die ($conn->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if ($total > 0) {
      if (password_verify($password, $row['password'])) {
        $_SESSION ['id'] = $row ['id'];
        $_SESSION ['username'] = $row ['username'];
        $_SESSION ['password'] = $row ['password'];
        $_SESSION ['gender'] = $row ['gender'];
        $_SESSION ['birthdate'] = $row ['birthdate'];

        header("Location: home.php");
      } else {
        echo "Incorrect username or password";
      }
    } else {
      echo "Incorrect username or password";
    }
  } 
?>