<?php
  session_start();
  if(isset($_SESSION['account_id'])){

    if ($_SESSION['account_is_activated'] === 0){
      header('Location: account-not-active.php');
    }
  } else {
    header('Location: login.php');
  }

?>

<?php include_once 'inc/head.php';?>
<div class="index">
  <?php include_once 'inc/navbar.php';?>
</div>
<?php include_once 'php/database.php'; ?>
<?php include_once 'php/validate.php'; ?>
<?php
  if (!$_SESSION['account_is_activated']){
    header('Location: account-not-active.php');
  }
?>
<script>
  isIndex = false;
  scrollTop = 0;
</script>

<main class="non-index bg-white" id="login-page">
  <div class="header-sm">
    <h1>Welcome, <?php echo $_SESSION['account_email'];?>!</h1>
  </div>
  <div class="container">
    <?php include_once 'php/testimonial-query.php';?>
  </div>
  <?php if (!isset($testimonial)){ ?>
    <div class="container">
      <h6 class="text-center">It appears you have not written a testimonial yet. <a href="write-testimonial.php" class="btn btn-primary text-center">Write Testimonial</a></h6>
    </div>
  <?php
}else {?>
  <div class="container">
    <div class="row">
      <div class="testimonial col-12" id="my-testimonial">
        <div class="row">
          <div class="col-12 col-sm-4">
            <img src="<?php echo $testimonial->pic;?>" alt="">
          </div>
          <div class="col-12 col-sm-8">
            <h4 class="text-secondary font-weight-bold">
              <?php echo $testimonial->title;?>
            </h4>
            <p>
              <?php echo $testimonial->text;?>
            </p>
            <h5>
              <span class="customer-name">
                <b>-<?php echo $testimonial->first_name;?> <?php echo $testimonial->last_name;?></b>,
              </span>
              <span class="customer-city">
                <?php echo $testimonial->city;?>
              </span>
            </h5>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
}?>

</main>
<?php include_once 'inc/foot.php'; ?>
