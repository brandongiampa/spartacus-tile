<?php session_start();?>
<?php include_once 'inc/head.php';?>
<div class="index">
  <?php include_once 'inc/navbar.php';?>
</div>
<?php include_once 'php/db.php'; ?>
<?php include_once 'php/send-message.php'; ?>

<?php
  if(isset($_SESSION['loginEmail'])){
    $email = $_SESSION['loginEmail'];

    $db = new Database();
    $db->connect();

    if($db->isAccountActivated($email)){
      header('Location: ' . echo $site_url . 'my-account');
      exit;
    }
  }
  else {
    header('Location: ' . $site_url . 'login.php');
    exit;
  }


?>

<script>
  isIndex = false;
  scrollTop = 0;
</script>

<main class="non-index bg-white" id="login-page">
  <div class="header-sm">
    <h1>Account Not Activated</h1>
  </div>
  <div class="container">
    <div class="m-auto">
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <h6>Your account was created, but has not been activated yet.  Please reply to the email we sent or <input type="submit" class="btn btn-primary" value="Send Email"> .</h6>
      </form>
    </div>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
