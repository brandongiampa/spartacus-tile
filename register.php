<?php session_start();?>
<?php include_once('php/database.php'); ?>

<?php

  if (isset($_SESSION['loginEmail'])){
    $email = $_SESSION['loginEmail'];
    $db = new Database();
    $db->connect();

    if($db->isAccountActivated($email)){
      header('Location: my-account.php');
      exit;
    }
    else {
      header('Location: account-not-active.php');
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
    <?php include_once 'php/database.php'; ?>
    <?php include_once 'php/functions.php'; ?>
    <?php

      $db = new Database();
      $db->connect();

      if(isset($_POST['register'])){
        $email = htmlspecialchars($_POST['registerEmail']);
        $password = htmlspecialchars($_POST['registerPassword']);
        $confirm = htmlspecialchars($_POST['registerConfirm']);

        if(validateEmail($email)){
          if(!$db->hasAccount($email)){
            if(confirmPasswordsMatch($password, $confirm)){
              if(validatePassword($password)){
                $db->createAccount($email, $password);
                $_SESSION['loginEmail'] = $email;
                header('Location: my-account.php');
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
            warn('There is already an account registered under that email address.  Do you need to <a class="btn btn-primary" href="login.php">Log In</a>?');
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
      <h6>Do you already have an account?  <a href="login.php" class="link link-primary">Log In</a>.</h6>
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
