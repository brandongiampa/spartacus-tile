<?php session_start(); ?>
<?php include_once 'inc/head.php';?>
<?php include_once 'php/db.php';?>
<div class="index">
  <?php include_once 'inc/navbar.php';?>
</div>

<?php
  if (isset($_SESSION['loginEmail'])){
    header('Location: my-account.php');
    die();
  }
?>

<script>
  isIndex = false;
  scrollTop = 0;
</script>

<main class="non-index bg-white" id="login-page">
  <div class="header-sm">
    <h1>Forgot Password</h1>
  </div>
  <div class="container">
    <?php include_once 'php/db.php'; ?>
    <?php include_once 'php/functions.php'; ?>
    <?php

      if(isset($_POST['sendLink'])){

        $db = new Database();

        $name = "Spartacus Tile";
        $email = $_POST['loginEmail'];

        $toEmail = $email;
        $subject = "Spartacus Tile Password Change";
        $body = '<h2>Change Your Password</h2>';
        $body .= '<a href="https://www.brandongiampa.com/spartacus-tile/change-password.php?vkey='.$vkey.'&email='.$email.'">Click here to Change Your Password</a>';

        $headers = "MIME-Version:1.0"."\r\n";
        $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: " . $name . "<" . "spartacustile@gmail.com" . ">" . "\r\n";

        if(mail($toEmail, $subject, $body, $headers)){
            $msg = "Inquiry sent successfully.";
            $msgClass = "alert-success";
            header('Location: account-created.php');
            exit;
        }else {
            $msg = "Unfortunately, there was an issue sending your email.  Please try again.";
            $msgClass = "alert-danger";
        }

        header('Location: password-link-sent.php');
        die();
      }

    ?>
    <div class="m-auto">
      <h6>Submit your email and we will send you a link to update your password.</h6>
    </div>
    <div class="row">
      <div class="col-12 col-md-6 m-auto">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <div class="form-group">
            <label for="loginEmail">Email address</label>
            <input type="email" value="<?php if (isset($email)){echo $email;}?>" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted"></small>
          </div>
          <input type="submit" class="btn btn-primary" value="Send Link" name="sendLink">
        </form>
      </div>
    </div>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
