<?php

  $login_email = "";
  $login_password = "";

  $password_matches = true;

  if (isset($_POST['login_email'])){
    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];
    if (validateEmail($login_email) && validatePassword($login_password)){
      try{
        $query = "SELECT * FROM `st_accounts` WHERE `email` = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$login_email]);
        $account = $stmt->fetch(PDO::FETCH_OBJ);

        $password = htmlspecialchars($_POST['login_password']);
        echo $account->salt;
        echo '</br>';
        echo $hash;

        if (password_verify($password, $account->salt)){
          header('Location: my-account.php');
        }else {
          echo '<div class="alert alert-warning text-center">The password you entered did not match our records.  <a class="link link-primary" href="reset-password.php">Reset Password</a></div>';
        }
      }catch(PDOException $exception){
        echo 'There was an error connecting to database: ' . $exception->getMessage();
      }
    }else {
      echo '<div class="alert alert-warning text-center">Please make sure you are logging in using an email address and a password using at least one lowercase letter, one uppercase letter, one number and one non-alphanumeric character.</div>';
    }
  }

?>
