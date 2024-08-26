<?php
  if (!isset($_SESSION)) {
    session_start();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/header.css">
  <title>Document</title>
</head>
<body>
  <div class="header">
    <div class="upper">
      <img src="" class="logo">
      <form action="<?PHP $_SERVER ['PHP_SELF'] ?>" method="get">
        <input type="text" name="searchbar">
        <input type="submit" value="Search" name="search-button">
      </form>
      <?php if (!isset($_SESSION ['id'])) {?>
        <a href="login.php">
          <button class="login-logout-button">
            Login
          </button>
        </a>
      <?php } else { ?>
        <div class="upper-right">
          <a href="profile.php?id=<?php echo $id ?>" class="user-profile-container">
            <img src="./images/user.png" class="user-profile">
          </a>
          <a href="logout.php">
            <button class="login-logout-button">
              Logout
            </button>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</body>
</html>