<?php

  $login_email = "";
  $login_password = "";

  $password_matches = true;

  if (isset($_POST['login_email'])){
    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];
    if (validateEmail($login_email) && validatePassword($login_password)){
      try{
        $query = "SELECT * FROM `account` WHERE email = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$login_email]);
        $account = $stmt->fetch(PDO::FETCH_OBJ);

        $hash = password_hash($_POST['login_password'], PASSWORD_DEFAULT);


      }catch(PDOException $exception){
        echo 'There was an error connecting to database: ' . $exception->getMessage();
      }
    }else {
      echo '<div class="alert alert-warning">Please make sure you are logging in using an email address and a password using at least one lowercase letter, one uppercase letter, one number and one non-alphanumeric character.</div>';
    }
  }

?>
