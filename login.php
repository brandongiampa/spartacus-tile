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
    <?php include_once 'php/database.php'; ?>
    <?php include_once 'php/functions.php'; ?>
    <?php
      $db = new Database();
      $db->connect();

      if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $account = $db->getAccountInfo($email);

        if (password_verify($password, $account->salt)){
          if($db->isAccountActivated($email)===1){
            header('Location: my-account.php');
          }
          else {
            header('Location: account-not-active.php');
          }
        }else {
          echo '<div class="alert alert-warning text-center">The password you entered did not match our records.</div>';
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
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" value="" class="form-control" id="password" name="password">
          </div>
          <input type="submit" class="btn btn-primary" value="Log In" name="login">
        </form>
      </div>
    </div>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
