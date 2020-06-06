<?php session_start();?>
<?php include_once('php/db.php'); ?>
<?php include_once 'php/functions.php'; ?>
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
    <h1>Change Password</h1>
  </div>
  <div class="container">
    <?php

      $db = new Database();
      $db->connect();

      $vkey = $_GET['vkey'];
      $email = $_GET['email'];

      if(isset($_POST['change-password'])){
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];

        if(confirmPasswordsMatch($password, $confirm)){
          if(validatePassword($password)){
            if($db->changePassword($email, $password, $vkey)){
              $_SESSION['loginEmail'] = $email;
            }
            else {warn("There has been an error. Please return to the index page.");}
          }
          else {warn('Passwords must be 8-16 characters using at least one uppercase letter, one lowercase letter, one number and one non-alphanumeric character.');}
        }
        else {warn('Please make sure your passwords match.');}
      }
    ?>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 m-auto">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="">
          </div>
          <div class="form-group">
            <label for="confirm">Confirm Password</label>
            <input type="password" class="form-control" id="confirm" name="confirm" value="">
          </div>
          <input type="submit" class="btn btn-primary" id="change-password" name="change-password" value="Change Password" disabled>
        </form>
      </div>
    </div>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
