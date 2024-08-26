<?php
  include_once ('./connection.php');
  $conn = connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <title>Document</title>
  <script>
    $(document).ready (()=> {
      let commentCount = 3;
      $(".show-more-btn").click (()=> {
        commentCount += 3;
        $("#container").load ("./load-comments.php", {
          LoadedComments: commentCount
        });
      })
    })
  </script>
</head>
<body>
  <div id="container">
    <?php
      $sql = "SELECT * FROM comments LIMIT 3";
      $comments = $conn->query($sql) or die ($conn->error);
      $row = $comments->fetch_assoc();

      if ($comments->num_rows > 0) {
        do { ?>
          <div>
            <p>
              Commenter ID: <?= $row ['commenter_id'] ?>
            </p>
            <p>
              Comment: <?= $row ['comment'] ?>
            </p>
          </div>
          <hr>
        <?php } while ($row = $comments->fetch_assoc()); ?>
      <?php } else { ?>
        <p>
          No Comments
        </p>
      <?php } ?>
  </div>
  <button class="show-more-btn">
    Show More
  </button>
</body>
</html>