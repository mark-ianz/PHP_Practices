<?php
  if (!isset ($_SESSION)) {
    session_start();
  }

  if (!($_SESSION ['id'] === $_GET ['id'])) {
    header("Location: home.php");
  };

  include_once ('connection.php');

  $conn = connect();
  $id = $_GET ['id'];
  $sql = "SELECT * FROM account_system WHERE id = $id";

  $account = $conn->query($sql) or die($conn->error);

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
<form action="<?php $_SERVER ['PHP_SELF'] ?>" method="post">
    <label for="user-input">
      Username:
    </label>
    <input type="text" name="user-input" maxlength="50" required value="<?php echo $row ['username'] ?>">
    <a href="changepw.php?id=<?php echo $id ?>">
      Change Password
    </a>
    <br>
    <br>
    <label for="gender-select">
      Gender:
    </label>
    <select name="gender-select" required>
      <option <?php if ($row ['gender'] === "Male") { echo "selected"; }?> value="Male">
        Male
      </option>
      <option <?php if ($row ['gender'] === "Female") { echo "selected"; }?> value="Female">
        Female
      </option>
    </select>
    <label for="birthdate">
      Birthday:
    </label>
    <input type="date" name="birthdate" required value="<?php echo $row ['birthdate'] ?>">
    <br>
    <br>
    <input type="submit" value="Update!" name="submit">
  </form>
</body>
</html>
<?php
  if (isset ($_POST ['submit'])) {
    $username = $_POST ['user-input'];
    $gender = $_POST ['gender-select'];
    $birthdate = $_POST ['birthdate'];

    $sql = "UPDATE `account_system` 
    SET `username` = '$username', `gender` = '$gender', `birthdate` = '$birthdate' 
    WHERE `account_system`.`id` = $id";

    $conn->query($sql) or die ($conn->error);

    header("Location: profile.php?id=$id");
  }
?>