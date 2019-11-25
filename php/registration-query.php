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

          $query = 'INSERT INTO `account`(email, salt) VALUES(?, ?)';
          $stmt = $con->prepare($query);
          $stmt->execute([$email, $password]);
          echo '<script>alert("Thanks!");</script>';
          session_start();
          $_SESSION["accountCreated"] = true;
          $_SESSION["registerEmail"] = $register_email;
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

function validateEmail($email){
  if (filter_var($email, FILTER_VALIDATE_EMAIL)){
    return true;
  }
  return false;
}
function validatePassword($password) {
  //whitespace
  if (rtrim($password) !== $password) {
    echo '<script>alert("failed whitespace")</script>';
    return false;
  }
  //length
  if (strlen($password)<8 || strlen($password)>16){
    echo '<script>alert("failed length")</script>';
    return false;
  }
  if (!preg_match('/[0-9]+/', $password)){
    echo '<script>alert("failed numeric")</script>';
    return false;
  }
  if (!preg_match('/[A-Z]+/', $password)){
    echo '<script>alert("failed uppercase")</script>';
    return false;
  }
  if (!preg_match('/[a-z]+/', $password)){
    echo '<script>alert("failed lowercase")</script>';
    return false;
  }
  if (!preg_match('/[\W]+/', $password)){
    echo '<script>alert("failed character")</script>';
    return false;
  }
  return true;
}
function confirmPasswordsMatch($password, $confirm){
  if ($password === $confirm) {
    return true;
  }
  return false;
}
function hasAccount($email, $con){
  try{
    $query = 'SELECT COUNT(*) FROM `account` WHERE email = ?';
    $stmt = $con->prepare($query);
    $stmt->execute([$_POST['register_email']]);
    $count = $stmt->fetchColumn();

    if ($count>0){
      return true;
    }
  }catch(PDOException $exception){
    echo 'There was a problem: ' . $exception;
  }
  return false;
}
?>
