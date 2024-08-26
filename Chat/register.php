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

  <style>
    input {
      border: solid 1px;
      outline: none;
    }

    .input-error {
      border-color: red;
    }

    .error-message {
      color: red;
    }

    .success-message {
      color: green;
    }
  </style>

  <script>
    $(document).ready (()=> {
      $("#register-form").submit ((submitEvent)=> {
        submitEvent.preventDefault ();
        let missingInput = false;
        const values = {
          fname: $.trim ($("#fname-input").val()),
          lname: $.trim ($("#lname-input").val()),
          email: $.trim ($("#email-input").val()),
          username: $.trim ($("#username-input").val()),
          password: $.trim ($("#password-input").val()),
          confirmPassword: $.trim ($("#confirmPassword-input").val()),
        }
        const register_button = ($("#register-button").val());
        
        /* Check for empty inputs */
        $.each (values, (key, value)=> {
          if (!$.trim (value)) {
            console.log (key + " is empty");
            $("#error-container").html ("<p class=\"error-message\">Fill all the fields.</p>");
            $("#" + key + "-input").addClass ("input-error");
            missingInput = true;
          };
        });

        /* If no empty inputs: */
        if (!missingInput) {
          $("#error-container").load ("./register-process.php", {
            fname: values.fname,
            lname: values.lname,
            email: values.email,
            username: values.username,
            password: values.password,
            confirmPassword: values.confirm_password,
            register_button: register_button
          });
        };
      });

      /* Event listener if user input, the red border class will remove */
      $.each ($(".register-input"), (index,input)=> {
        $(input).keydown ((event)=> {
          if (event.key != 'Tab') {
            $(input).removeClass ("input-error");
          }
        });
      });

    });
  </script>
  <title>Document</title>
</head>
<body>
  <form action="./register-process.php" method="post" id="register-form">
    <h1>
      Register
    </h1>
    <label for="fname">
      First Name
    </label>
    <input type="text" name="fname" id="fname-input" class="register-input">
    <label for="lname">
      Last Name
    </label>
    <input type="text" name="lname" id="lname-input" class="register-input">
    <label for="email">
      Email
    </label>
    <input type="text" name="email" id="email-input" class="register-input">
    <br>
    <br>
    <label for="username">
      Username
    </label>
    <input type="text" name="username" id="username-input" class="register-input">
    <label for="password">
      Password
    </label>
    <input type="password" name="password" id="password-input" class="password register-input">
    <label for="confirm-password">
      Confirm Password
    </label>
    <input type="password" name="confirm-password" id="confirmPassword-input" class="password register-input">
    <button type="submit" name="submit" id="register-button">
      Register
    </button>
  </form>
  <div id="error-container"></div>
</body>
</html>
