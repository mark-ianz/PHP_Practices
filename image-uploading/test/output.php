<?php

  include_once ('../connection.php');
  $conn = connect();

  $sql = "SELECT * FROM `registration`";

  $users = $conn->query($sql) or die ($conn->error);

  $row = $users->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .profile-pic {
      width: 300px;
      height: 300px;
      object-fit: cover;
    }
  </style>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>id</th>
        <th>username</th>
        <th>image</th>
      </tr>
    </thead>
    <tbody>
      <?php do { ?>
        <tr>
          <td>
            <?php echo $row ['id'] ?>
          </td>
          <td>
            <?php echo $row ['username'] ?>
          </td>
          <td>
            <img src="../<?php echo $row ['profile-pic'] ?>" class="profile-pic">
          </td>
        </tr>
      <?php } while ($row = $users->fetch_assoc()) ?>
    </tbody>

  </table>
</body>
</html>