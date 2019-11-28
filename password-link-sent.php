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
      <h6>We have sent a link to reset your password to <b>staticbrandongiampa555@gmail.com</b></h6>
    </div>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
