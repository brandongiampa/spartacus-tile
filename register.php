<?php include_once 'php/send-message.php'; ?>
<?php include_once 'php/database.php'; ?>
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
    <div class="row">
      <div class="col-12 col-md-6 m-auto">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <div class="form-group">
            <label for="register_email">Email address</label>
            <input type="email" class="form-control" id="register_email" name="register_email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="register_password">Password</label>
            <input type="password" class="form-control" id="register_password" name="register_password">
          </div>
          <div class="form-group">
            <label for="register_confirm">Password</label>
            <input type="password" class="form-control" id="register_confirm" name="register_confirm">
          </div>
          <button type="submit" class="btn btn-primary">Register</button>
        </form>
      </div>
    </div>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
