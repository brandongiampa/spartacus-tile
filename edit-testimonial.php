<?php session_start();?>
<?php include_once 'php/database.php';?>
<?php include_once 'php/functions.php'; ?>

<?php

  if(!isset($_SESSION['loginEmail'])){
    header('Location: login.php');
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
    <h1>Edit Your Testimonial</h1>
  </div>
  <div class="container">
    <?php
      $db = new Database();
      $db->connect();

      if(isset($_POST['submit-changes'])){
        $id = $_POST['id'];
        $fName = htmlspecialchars($_POST['first-name']);
        $lName = htmlspecialchars($_POST['last-name']);
        $city = htmlspecialchars($_POST['city']);
        $picTempPath = htmlspecialchars($_FILES['pic']['tmp_name']);
        $picPath = createPermanentImagePath($_FILES['pic']);
        $title = htmlspecialchars($_POST['title']);
        $text = htmlspecialchars($_POST['text']);

        if($fName!==""&&$lName!==""&&$city!==""&&$title!==""&&$text!==""){
          $db->editTestimonial($id, $fName, $lName, $city, $picPath, $title, $text);

          if ($picPath !== ""){
            move_uploaded_file($picTempPath, $picPath);
          }

          echo '<div class="alert alert-success text-center">Your testimonial has been updated. <a href="my-account.php" class="link link-primary">My Account</a></div>';
        }else {
          warn('Please make sure all fields are filled out.');
        }
      }
      $email = $_SESSION['loginEmail'];

      $db = new Database();
      $db->connect();

      $testimonial = $db->getTestimonial($email);

      $id = $testimonial->id;
      $firstName = $testimonial->first_name;
      $lastName = $testimonial->last_name;
      $city = $testimonial->city;
      $pic = $testimonial->pic;
      $title = $testimonial->title;
      $text = $testimonial->text;
    ?>  </div>
  <div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
      <div class="form-row">
        <div class="form-group col-12 col-lg-4">
          <label for="first-name">First Name*</label>
          <input type="text" class="form-control" id="first-name" name="first-name" value="<?php echo $firstName;?>">
        </div>
        <div class="form-group col-12 col-lg-4">
          <label for="last-name">Last Name*</label>
          <input type="text" class="form-control" id="last-name" name="last-name" value="<?php echo $lastName;?>">
        </div>
        <div class="form-group col-12 col-lg-4">
          <label for="city">City*</label>
          <select type="text" class="custom-select" id="city" name="city">
            <option value="Madison Heights" <?php if ($city === "Madison Heights"){echo 'selected';}?>>Madison Heights</option>
            <option value="Royal Oak" <?php if ($city === "Royal Oak"){echo 'selected';}?>>Royal Oak</option>
            <option value="Warren" <?php if ($city === "Warren"){echo 'selected';}?>>Warren</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="col-12 col-lg-8">
          <label for="title">Title*</label>
          <input type="text" name="title" id="title" class="form-control" value="<?php echo $title;?>">
        </div>
        <div class="col-12 col-md-4">
          <label for="pic">Upload New Picture <span class="text-muted">(Optional)</span></label>
          <input class="form-control-file" type="file" name="pic" id="pic" value="<?php echo $pic;?>">
        </div>
      </div>
      <div class="form-row">
        <div class="col-12">
          <label for="text">Text*</label>
          <textarea class="form-control-file" rows="12" name="text" id="text">
            <?php echo $text;?>
          </textarea>
        </div>
      </div>
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <input type="submit" class="btn btn-primary mt-1" name="submit-changes" value="Submit Changes">
    </form>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
