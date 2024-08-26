<!-- References
  other: person the user is chatting with 
-->

<?php
  include_once ('./connection.php');
  $conn = connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="general.css">
  <link rel="stylesheet" href="main.css">
  <title>Chat</title>
</head>
<body>
  <main class="container">
    <div class="info">
      <img src="./fb_pf.jpg" alt="Profile Picture" class="other-pf">
      <p>
        Aira Leah
      </p>
    </div>
    <div class="chat-container">
      <div class="chatbox">
        <p class="message other-message">
          Hey!
        </p>
      </div>
      <div class="chatbox">
        <p class="message user-message">
          Hello! 
        </p>
      </div>
      <div class="chatbox">
        <p class="message other-message">
          What's your name? 
        </p>
      </div>
      <div class="chatbox">
        <p class="message user-message">
          My name is Mark Ian, how about you?
        </p>
      </div>
      <div class="chatbox">
        <p class="message other-message">
          Hey Mark Ian! My name is Aira Leah!!
        </p>
      </div>
    </div>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="send-message-form">
      <input type="text" name="message-input" class="message-input">
      <button type="submit" class="send-button">
        Send
      </button>
    </form>
  </main>
</body>
</html>