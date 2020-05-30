<?php session_start();?>
<?php include_once 'php/db.php'; ?>
<?php include_once 'php/functions.php'; ?>

<?php
  if(isset($_SESSION['loginEmail'])){
    $db = new Database();
    $db->connect();

    $email = $_SESSION['loginEmail'];

    if($db->getTestimonialCount($email)>0){
      $testimonial = $db->getTestimonial($email);
    }

    if($db->isAccountActivated($email)===false){
      header('Location: ' . $site_url . 'account-not-active');
      exit;
    }
  }
  else {
    header('Location: ' . $site_url . 'login');
    exit;
  }
?>

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
    <h1>Welcome, <?php echo $email;?></h1>
  </div>
  <div class="container">

  </div>
  <?php if (!isset($testimonial)){ ?>
    <div class="container">
      <h6 class="text-center">It appears you have not written a testimonial yet. <a href="<?php echo $site_url;?>write-testimonial" class="btn btn-primary text-center">Write Testimonial</a></h6>
    </div>
  <?php
}else {
  ?>
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
          <div class="edit">
            <a href="<?php echo $site_url;?>edit-testimonial" class="btn btn-primary">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
}?>

</main>
<?php include_once 'inc/foot.php'; ?>
