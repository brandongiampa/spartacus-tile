<?php

  if(isset($_SESSION['account_id'])){
    header('Location: my-account.php');
  }

  $login_email = "";
  $login_password = "";

  $first_name;
  $last_name;

  $already_registered = false;
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
        session_start();
        $_SESSION['account_id'] = $account->id;
        $_SESSION['account_email'] = $account->email;
        $_SESSION['account_is_activated'] = $account->isActivated;

        if ($_SESSION['account_is_activated'] === 0){
          header('Location: account-not-active.php');
        }
        else {
          header('Location: my-account.php');
        }

      }catch(PDOException $exception){
        echo 'There was an error connecting to database: ' . $exception->getMessage();
      }
    }else {
      echo 'no such login';
    }
  }

?>
