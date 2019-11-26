<?php include_once 'inc/head.php';?>
<div class="index">
  <?php include_once 'inc/navbar.php';?>
</div>
<?php include_once 'php/database.php'; ?>
<?php include_once 'php/validate.php'; ?>

<script>
  isIndex = false;
  scrollTop = 0;
</script>

<main class="non-index bg-white" id="login-page">
  <div class="header-sm">
    <h1>Login Page</h1>
  </div>
  <div class="container">
    <?php include_once 'php/login-query.php'; ?>
    <div class="m-auto">
      <h6>Do you need an account?  <a href="register.php" class="link link-primary">Register</a>.</h6>
    </div>
    <div class="row">
      <div class="col-12 col-md-6 m-auto">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <div class="form-group">
            <label for="login_email">Email address</label>
            <input type="email" class="form-control" id="login_email" name="login_email" value="<?php echo $login_email;?>" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="login_password">Password</label>
            <input type="password" value="<?php echo $login_password;?>" class="form-control" id="login_password" name="login_password">
          </div>
          <button type="submit" class="btn btn-primary" value="login">Log In</button>
        </form>
      </div>
    </div>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
