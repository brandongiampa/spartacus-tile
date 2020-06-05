<?php

  $register_email = "";
  $register_password = "";
  $register_confirm = "";

  $found_account = false;
  $email_is_valid = true;
  $passwords_match = true;
  $password_accepted = true;

  $email_invalid_message = "Please enter a valid email address.";
  $passwords_match_message = "Your password did not match the confirmation.";
  $password_rejected_message = "Password must be 8-16 characters with one uppercase letter, one lowercase letter, one number and one non-alphanumeric character.";

  if(isset($_POST['register_email'])){

    $register_email = $_POST['register_email'];
    $register_password = $_POST['register_password'];
    $register_confirm = $_POST['register_confirm'];

    if (!hasAccount($register_email, $con)){
      $email_is_valid = validateEmail($register_email);
      $passwords_match = confirmPasswordsMatch($register_password, $register_confirm);
      $password_accepted = validatePassword($register_password);

      if($email_is_valid && $passwords_match && $password_accepted){
        try{
          $email = htmlspecialchars($_POST['register_email']);
          $password = htmlspecialchars($_POST['register_password']);
          $password = password_hash($password, PASSWORD_DEFAULT);

          $query = 'INSERT INTO `st_accounts`(email, salt) VALUES(?, ?)';
          $stmt = $con->prepare($query);
          $stmt->execute([$email, $password]);
          echo '<script>alert("Thanks!");</script>';
          header('Location: account-created.php');
        }catch(PDOException $exception){
          echo '</br></br></br></br></br></br></br></br>' . $exception;
        }
      }
    }else {
      $found_account = true;
      $email_is_valid = true;
      $passwords_match = true;
      $password_accepted = true;
    }
  }


?>
