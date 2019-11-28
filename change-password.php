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
    <h1>Forgot Password</h1>
  </div>
  <div class="container">
    <?php include_once 'php/database.php'; ?>
    <?php include_once 'php/functions.php'; ?>
    <?php

      if(isset($_POST['sendLink'])){
        //send email
        header('Location: password-link-sent.php');
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
