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
    <h1>Error 401: Not Authorized</h1>
  </div>
  <div class="container mt-4">
    <p class="text-center">
      The link you have followed is valid, but you do not have the credential to view the page. If we sent you here in error or you believe you should be authorized, feel free to contact the site administrator.
    </p>
  </div>
</main>
<?php include_once 'inc/contact.php'; ?>
<?php include_once 'inc/map.php'; ?>
<?php include_once 'inc/foot.php'; ?>
