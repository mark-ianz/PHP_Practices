<?php
  if (!(isset ($_SESSION))) {
    session_start();
  }

  if ($_SESSION ['id'] != $_GET ['id']) {
    header("Location: home.php");
  }

  include_once ('connection.php');

  $conn = connect();
  $id = $_GET ['id'];
  $sql = "SELECT * FROM account_system WHERE id = $id";

  $account = $conn->query($sql) or die ($conn->error);
  $row = $account->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Change Password</h1>
  <form action="<?php $_SERVER ['PHP_SELF'] ?>" method="post">
    <label for="current-password">
      Current Password:
    </label>
    <input type="password" name="current-password" required>
    <br>
    <br>
    <label for="new-password">
      New Password:
    </label>
    <input type="password" name="new-password" minlength="8" required>
    <br>
    <br>
    <label for="verify-password">
      Re-enter Password:
    </label>
    <input type="password" name="re-enter-password" minlength="8" required>
    <br>
    <br>
    <input type="submit" value="Change Password" name="submit">
    <p style="font-size: 14px;">Note: Changing password will make your account log out.</p>
  </form>
</body>
</html>
<?php
  function validatePW ($hashedPW, $currentPW, $newPW, $reEnterPW) {
    if (password_verify($currentPW, $hashedPW)) {
      if (!($newPW === $reEnterPW)) {
        echo "<p>Password doesn't match</p>";
      }
    } else {
      echo "<p>Current password doesn't match.</p>";
    };
  };

  if (isset ($_POST['submit'])) {
    $hashedPW = $row ['password'];
    $currentPW = $_POST ['current-password'];
    $newPW = $_POST ['new-password'];
    $newHashedPW = password_hash($newPW,PASSWORD_DEFAULT);
    $reEnterPW = $_POST ['re-enter-password'];
    validatePW($hashedPW, $currentPW, $newPW, $reEnterPW);
    updatePW($newHashedPW, $id, $conn);
  }

  function updatePW ($newHasedPW, $id, $conn) {
    $sql = "UPDATE `account_system` SET `password` = '$newHasedPW' 
      WHERE `account_system`.`id` = $id";

    $conn->query($sql) or die ($conn->error);

    session_destroy();
    header("Location: login.php");
  }
?>