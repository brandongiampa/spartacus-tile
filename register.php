<?php include_once 'php/send-message.php'; ?>
<?php include_once 'php/database.php'; ?>
<?php include_once 'php/validate.php'; ?>
<?php include_once 'php/registration-query.php'; ?>
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
    <?php
      if($found_account):?>
        <div class="container">
          <div class="alert alert-warning">
            There is already an account using that email address.  <a href="login.php">Log In</a> | <a href="login.php">Forgot Password</a>
          </div>
        </div>
      <?php endif;?>
  </div>
  <div class="container">
    <div class="m-auto">
      <h6>Do you already have an account?  <a href="login.php" class="link link-primary">Log In</a>.</h6>
    </div>
    <div class="row">
      <div class="col-12 col-md-6 m-auto">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <div class="form-group">
            <label for="register_email">Email address</label>
            <?php
              if(!$email_is_valid):?>
                <div class="container">
                  <div class="alert alert-warning">
                    <?php echo $email_invalid_message;?>
                  </div>
                </div>
              <?php endif;?>
            <input type="email" class="form-control" id="register_email" name="register_email" aria-describedby="emailHelp" value="<?php echo $register_email;?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="register_password">Password</label>
            <?php
              if(!$password_accepted):?>
                <div class="container">
                  <div class="alert alert-warning">
                    <?php echo $password_rejected_message;?>
                  </div>
                </div>
              <?php endif;?>
            <input type="password" class="form-control" id="register_password" name="register_password" value="<?php echo $register_password;?>">
          </div>
          <div class="form-group">
            <label for="register_confirm">Confirm Password</label>
            <?php
              if(!$passwords_match):?>
                <div class="container">
                  <div class="alert alert-warning">
                    <?php echo $passwords_match_message;?>
                  </div>
                </div>
              <?php endif;?>
            <input type="password" class="form-control" id="register_confirm" name="register_confirm" value="<?php echo $register_confirm;?>">
          </div>
          <button type="submit" class="btn btn-primary" name="register">Register</button>
        </form>
      </div>
    </div>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
