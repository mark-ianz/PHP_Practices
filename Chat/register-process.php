<?php
  if (isset ($_POST ['register_button'])) {
    $usernameError = false;
    $passwordError = false;
    $emailError = false;

    $firstName = $_POST ['fname'];
    $lastName = $_POST ['lname'];
    $email = $_POST ['email'];
    $username = $_POST ['username'];
    $password = $_POST ['password'];
    $confirmPassword = $_POST ['confirm_password'];

    /* Validation */
    /* Check if email is valid */
    include_once ('./validate-email.php');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<p class=\"error-message\">Invalid email.</p>";
      $emailError = true;
    } else if (validateEmail($email)) {
      /* Validate if email already exist. */
      echo "<p class=\"error-message\">Email is already taken.</p>";
      $emailError = true;
    }

    /* Validate if username already exist. */
    include_once ('./validate-username.php');

    if (strlen($username) <= 3) {
      echo "<p class=\"error-message\">Username is too short.</p>";
      $usernameError = true;
    } else if ((validateUsername($username))) {
      echo "<p class=\"error-message\">Username is already taken.</p>";
      $usernameError = true;
    }

    /* Check if password is strong enough */
    if (strlen($password) <= 8) {
      echo "<p class=\"error-message\">Password is too weak.</p>";
      $passwordError = true;
    }

    /* Check if password matches */
    if ($password != $confirmPassword) {
      echo "<p class=\"error-message\">Password doesn't match.</p>";
      $passwordError = true;
    }
  }
  $missingInput = json_encode($missingInput);
  $usernameError = json_encode($usernameError);
  $passwordError = json_encode($passwordError);
  $emailError = json_encode($emailError);
?>
<script>
  $(document).ready (()=> {
    let missingInput = <?php echo $missingInput ?>;
    let usernameError = <?php echo $usernameError ?>;
    let passwordError = <?php echo $passwordError ?>;
    let emailError = <?php echo $emailError ?>;
  
    if (missingInput) {
      $(".register-input").addClass ("input-error");
    } else {
      if (usernameError) {
        $("#username-input").addClass ("input-error");
      }
      if (passwordError) {
        $(".password").addClass ("input-error");
      }
      if (emailError) {
        $("#email-input").addClass ("input-error");
      }
    }
  })
</script>