<?php session_start();?>
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
    <h1>Error 404: Page Not Found</h1>
  </div>
  <div class="container mt-4">
    <p class="text-center">
      We do not recognize the link you used to get to this page. If we sent you here, feel free to contact the site administrator.
    </p>
  </div>
</main>
<?php include_once 'inc/contact.php'; ?>
<?php include_once 'inc/map.php'; ?>
<?php include_once 'inc/foot.php'; ?>
