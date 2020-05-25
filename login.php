<?php session_start();?>
<?php include 'php/db.php';?>
<?php
  //if already logged in when opening page, directs to my account
  if (isset($_SESSION['loginEmail'])){
    header('Location: my-account.php');
    exit;
  }
?>
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
    <h1>Login Page</h1>
  </div>
  <div class="container">

    <?php include_once 'php/functions.php'; ?>
    <?php
      $db = new Database();
      $db->connect();

      if(isset($_Pdbin'])){
        $email = $_POST['loginEmail'];
        $password = $_POST['loginPassword'];

        if($db->hasAccount($email)){
          $account = $db->getAccountInfo($email);
          if (password_verify($password, $account->salt)){
            if($db->isAccountActivated($email)){
              $_SESSION['loginEmail'] = $email;
              header('Location: my-account.php');
            }
            else {
              $_SESSION['loginEmail'] = $email;
              header('Location: account-not-active.php');
            }
          }else {
            echo '<div class="alert alert-warning text-center">The password you entered did not match our records.  Did you <a href="forgot-password.php">Forget Your Password</a>?</div>';
          }
        }else {
          echo '<div class="alert alert-warning text-center">There is no account associated with that email address.  Do you need to <a class="link link-primary" href="register.php">register</a>?</div>';
        }
      }
    ?>
    <div class="m-auto">
      <h6>Do you need an account?  <a href="register.php" class="link link-primary">Register</a>.</h6>
    </div>
    <div class="row">
      <div class="col-12 col-md-6 m-auto">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <div class="form-group">
            <label for="loginEmail">Email address</label>
            <input type="email" value="<?php if (isset($email)){echo $email;}?>" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="loginPassword" name="loginPassword">
          </div>
          <input type="submit" class="btn btn-primary" value="Log In" id="login" name="login">
        </form>
      </div>
    </div>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
