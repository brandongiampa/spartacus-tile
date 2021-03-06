<?php session_start();?>
<?php include_once 'php/db.php'; ?>
<?php include_once 'php/functions.php'; ?>

<?php

  if (isset($_SESSION['loginEmail'])){
    $email = $_SESSION['loginEmail'];
    $db = new Database();
    $db->connect();

    if($db->isAccountActivated($email)){
      header('Location: ' . $site_url . 'my-account');
      exit;
    }
    else {
      header('Location: ' . $site_url . 'account-not-active');
      exit;
    }
  }

?>
<?php include_once 'php/send-message.php'; ?>
<?php include_once 'inc/head.php';?>
<div class="index">
  <?php include_once 'inc/navbar.php';?>
</div>

<script>
  isIndex = false;
  scrollTop = 0;
</script>

<main class="non-index bg-white" id="login-page">
  <div class="header-sm">
    <h1>Registration Page</h1>
  </div>
  <div class="container">
    <?php

      $db = new Database();
      $db->connect();

      if(isset($_POST['register'])){
        $email = htmlspecialchars($_POST['registerEmail']);
        $password = htmlspecialchars($_POST['registerPassword']);
        $confirm = htmlspecialchars($_POST['registerConfirm']);
        $vkey = md5(time().$email);

        if(validateEmail($email)){
          if(!$db->hasAccount($email)){
            if(confirmPasswordsMatch($password, $confirm)){
              if(validatePassword($password)){
                $db->createAccount($email, $password, $vkey);
                $_SESSION['loginEmail'] = $email;

                //send activation email
                $name = "Spartacus Tile";

                $toEmail = $email;
                $subject = "Spartacus Tile Account Activation";
                $body = '<h2>Thank you for registering with Spartacus Tile!</h2>';
                $body .= '<a href="https://www.brandongiampa.com/SpartacusTile/activate-account.php?vkey=' .$vkey .'">Click here to Activate your Account</a>';

                $headers = "MIME-Version:1.0"."\r\n";
                $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: " . $name . "<" . "spartacustile@gmail.com" . ">" . "\r\n";

                if(mail($toEmail, $subject, $body, $headers)){
                    $msg = "Inquiry sent successfully.";
                    $msgClass = "alert-success";
                    header('Location: ' . $site_url . 'account-created');
                    exit;
                }else {
                    $msg = "Unfortunately, there was an issue sending your email.  Please try again.";
                    $msgClass = "alert-danger";
                }
              }
              else {
                warn('Passwords must be 8-16 characters using at least one uppercase letter, one lowercase letter, one number and one non-alphanumeric character.');
              }
            }
            else {
              warn('Please make sure your passwords match.');
            }
          }
          else {
            warn('There is already an account registered under that email address.  Do you need to <a class="btn btn-primary" href="' . $site_url . 'login">Log In</a>?');
          }
        }
        else {
          warn('Please use a valid email.');
        }
      }
    ?>
  </div>
  <div class="container">
    <div class="m-auto">
      <h6>Do you already have an account?  <a href="<?php echo $site_url;?>login" class="link link-primary">Log In</a>.</h6>
    </div>
    <div class="row">
      <div class="col-12 col-md-6 m-auto">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="registerEmail" name="registerEmail" aria-describedby="emailHelp" value="<?php if(isset($email)){echo $email;}?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="registerPassword" name="registerPassword" value="">
          </div>
          <div class="form-group">
            <label for="confirm">Confirm Password</label>
            <input type="password" class="form-control" id="registerConfirm" name="registerConfirm" value="">
          </div>
          <input type="submit" class="btn btn-primary" id="register" name="register" value="Register" disabled>
        </form>
      </div>
    </div>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
