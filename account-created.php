<?php include_once 'inc/head.php';?>
<div class="index">
  <?php include_once 'inc/navbar.php';?>
</div>
<script>
  isIndex = false;
  scrollTop = 0;
</script>

<main class="non-index bg-white" id="account-created-page">
  <div class="header-sm">
    <h1>Your Account is Almost Ready...</h1>
  </div>
  <div class="container">
    <p>We have sent you an email at <span class="text-info"><?php echo $register_email;?></span>.  Please check and click the included link to activate your account.</p>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
