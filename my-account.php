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

<script>
  isIndex = false;
  scrollTop = 0;
</script>

<main class="non-index bg-white" id="login-page">
  <div class="header-sm">
    <h1>Welcome, <?php echo $_SESSION['account_first_name'];?>!</h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="testimonial col-12" id="testimonial-1">
        <div class="row">
          <div class="col-12 col-sm-4">
            <img src="img/woman1profile.jpg" alt="">
          </div>
          <div class="col-12 col-sm-8">
            <h4 class="text-secondary font-weight-bold">
              "This is the best company I have ever hired!"
            </h4>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ducimus facilis sit fugiat accusamus voluptate iusto nostrum porro dolore aspernatur dolor assumenda, culpa ad tempora, omnis eum praesentium! Debitis quisquam enim ipsum, dignissimos facilis odit tenetur facere perferendis sit et recusandae, error quae similique eligendi autem illum ducimus tempora quod!
            </p>
            <h5>
              <span class="customer-name"><b>-Amanda Thompson</b>, </span><span class="customer-city">Madison Heights</span>
            </h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
