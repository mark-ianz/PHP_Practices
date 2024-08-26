<?php
  if (!(isset ($_SESSION))) {
    session_start();
  }

  include_once ("./connection.php");
  $conn = connect();

  $sql = "SELECT * FROM account_system";
  $user = $conn->query($sql) or die ($conn->error);
  $row = $user->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>
    Welcome
    <?php
      if (isset ($_SESSION ['username'])) {
        echo $_SESSION ['username'];
      } else {
        echo "guess";
      }
    ?>!
  </h1>
  <?php 
    if (isset ($_SESSION ['id'])) {
      echo "<a href=\"./logout.php\">Logout</a>";
    } else {
      echo "<a href=\"./login.php\">Login</a>";
    }
  ?>
  <br>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php do {?>
      <tr>
        <td>
          <?php echo $row ['id'] ?>
        </td>
        <td>
          <?php echo $row ['username'] ?>
        </td>
        <td>
          <a href="./profile.php?id=<?php echo $row ['id']; ?>">View Profile</a>
        </td>
      </tr>
    <?php } while ($row = $user->fetch_assoc()); ?>
    </tbody>
  </table>
</body>
</html>