<?php include_once 'php/send-message.php'; ?>
<?php include_once 'php/database.php'; ?>
<?php include_once 'inc/head.php';?>
<div class="index">
  <?php include_once 'inc/navbar.php';?>
</div>
<?php

  $foundAccount = false;

  if(isset($_POST['register_email'])){
    try{
      $query = 'SELECT COUNT(*) FROM `account` WHERE email = ?';
      $stmt = $con->prepare($query);
      $stmt->execute([$_POST['register_email']]);
      $count = $stmt->fetchColumn();

    }catch(PDOException $exception){
      echo 'There was a problem: ' . $exception;
    }
    if ($count>0){
      $foundAccount = true;
    }
    else {
      try{
        $email = $_POST['register_email'];
        $password = password_hash($_POST['register_password'], PASSWORD_DEFAULT);

        $query = 'INSERT INTO `account`(email, salt) VALUES(?, ?)';
        $stmt = $con->prepare($query);
        $stmt->execute([$email, $password]);
        echo '<script>alert("Thanks!");</script>';
      }catch(PDOException $exception){
        echo '</br></br></br></br></br></br></br></br>' . $exception;
      }

    }
  }


?>

<script>
  isIndex = false;
  scrollTop = 0;
</script>

<main class="non-index bg-white" id="login-page">
  <div class="header-sm">
    <h1>Registration Page</h1>
    <?php
      if($foundAccount):?>
        <div class="container">
          <div class="alert alert-warning">
            There is already an account using that email address.  <a href="login.php">Log In</a> | <a href="login.php">Forgot Password</a>
          </div>
        </div>
      <?php endif;?>
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
            <label for="register_confirm">Confirm Password</label>
            <input type="password" class="form-control" id="register_confirm" name="register_confirm">
          </div>
          <button type="submit" class="btn btn-primary" name="register">Register</button>
        </form>
      </div>
    </div>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
