<?php session_start(); ?>
<?php include_once 'php/db.php'; ?>
<?php include_once 'php/functions.php'; ?>
<?php
  if (!isset($_SESSION['loginEmail'])){
    header('Location: login.php');
  }
  else {
    $email = $_SESSION['loginEmail'];
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
    <h1>Write Your Testimonial</h1>
  </div>
  <div class="container">
    <?php
      $db = new Database();

      $db->connect();
      $account = $db->getAccountInfo($email);
      $echo = $account->id;
      $msg = $db->errorMsg;

      if (isset($_POST['submit-testimonial'])){
        $id = $account->id;
        $fName = htmlspecialchars($_POST['first-name']);
        $lName = htmlspecialchars($_POST['last-name']);
        $city = htmlspecialchars($_POST['city']);
        $picTempPath = htmlspecialchars($_FILES['pic']['tmp_name']);
        $picPath = createPermanentImagePath($_FILES['pic']);
        $title = htmlspecialchars($_POST['title']);
        $text = htmlspecialchars($_POST['text']);

        if($fName!==""&&$lName!==""&&$city!==""&&$title!==""&&$text!==""){
          $db->writeTestimonial($id, $fName, $lName, $city, $picPath, $title, $text);

          if ($picPath !== ""){
            move_uploaded_file($picTempPath, $picPath);
          }
          header('Location: my-account.php');
        }else {
          warn('Please make sure all fields are filled out.');
        }
      }
    ?>
  </div>
  <div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
      <div class="form-row">
        <div class="form-group col-12 col-lg-4">
          <label for="first-name">First Name*</label>
          <input type="text" class="form-control" id="first-name" name="first-name" value="<?php if (isset($fName)){echo $fName;}?>">
        </div>
        <div class="form-group col-12 col-lg-4">
          <label for="last-name">Last Name*</label>
          <input type="text" class="form-control" id="last-name" name="last-name" value="<?php if (isset($lName)){echo $lName;}?>">
        </div>
        <div class="form-group col-12 col-lg-4">
          <label for="city">City*</label>
          <select type="text" class="custom-select" id="city" name="city" value="<?php if (isset($city)){echo $city;}?>">
            <option <?php if (!isset($city)){echo 'selected';}?> value=""><span class="text-muted">Please select...</span></option>
            <option <?php if (isset($city)){if($city==="Madison Heights"){echo 'selected';}}?> value="Madison Heights">Madison Heights</option>
            <option <?php if (isset($city)){if($city==="Royal Oak"){echo 'selected';}}?> value="Royal Oak">Royal Oak</option>
            <option <?php if (isset($city)){if($city==="Warren"){echo 'selected';}}?> value="Warren">Warren</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="col-12 col-lg-8">
          <label for="title">Title*</label>
          <input type="text" name="title" id="title" class="form-control" value="<?php if (isset($title)){echo $title;}?>">
        </div>
        <div class="col-12 col-md-4">
          <label for="pic">Upload Picture <span class="text-muted">(Optional)</span></label>
          <input class="form-control-file" type="file" name="pic" id="pic">
        </div>
      </div>
      <div class="form-row">
        <div class="col-12">
          <label for="text">Text*</label>
          <textarea class="form-control-file" rows="12" name="text" id="text">
            <?php if (isset($text)){echo $text;}?>
          </textarea>
        </div>
      </div>
      <input type="submit" class="btn btn-primary mt-1" name="submit-testimonial" value="Submit">
    </form>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
