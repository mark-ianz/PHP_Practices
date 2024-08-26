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
  <title>ewanq</title>
  <script>
    $(document).ready (()=> {
      $("#get").click (()=> {
        $.get ("./get-data.php", (data, status)=> {
          const row = JSON.parse (data);
          $("#test").html (row ['first_name']);
        })
      })

      $("#suggestion").keyup (()=> {
        $input = $("#suggestion").val ();
        $.post ("./suggestion.php", {
          suggestion: $input
        }, (data)=> {
          $("#suggestion-list").html (data)
        })
      })
    })
  </script>
</head>
<body>
  <p id="test">
    Hey there!
  </p>
  <button id="get">
    Get Random Names!
  </button>
  <br>
  <br>
  <input type="text" name="suggestion" id="suggestion">
  <div id="suggestion-list">
  </div>
</body>
</html>