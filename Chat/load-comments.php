<?php
include_once ('./connection.php');
$conn = connect();

$loadedComments = $_POST ['LoadedComments'];

$sql = "SELECT * FROM comments LIMIT $loadedComments";
$comments = $conn->query($sql) or die($conn->error);
$row = $comments->fetch_assoc();

if ($comments->num_rows > 0) {
  do { ?>
    <div>
      <p>
        Commenter ID: <?= $row['commenter_id'] ?>
      </p>
      <p>
        Comment: <?= $row['comment'] ?>
      </p>
    </div>
    <hr>
  <?php } while ($row = $comments->fetch_assoc()); ?>
<?php } else { ?>
  <p>
    No Comments
  </p>
<?php } ?>