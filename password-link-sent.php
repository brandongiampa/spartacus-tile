<?php include_once 'php/db.php'; ?>
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
    <h1>Forgot Password</h1>
  </div>
  <div class="container">
    <?php

      if(isset($_POST['sendLink'])){
        //send email
        header('Location: ' . $site_url . 'password-link-sent');
      }

    ?>
    <div class="m-auto">
      <h6>We have sent a link to reset your password.</h6>
    </div>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
