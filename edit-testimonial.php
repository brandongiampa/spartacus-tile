<?php include_once 'php/database.php'; ?>
<?php

  $query = "SELECT COUNT(*) FROM `testimonials` WHERE `account_id` = ?";
  $stmt = $con->prepare($query);
  $stmt->execute([10]);

?>

<?php include_once 'inc/head.php';?>
<div class="index">
  <?php include_once 'inc/navbar.php';?>
</div>
<?php include_once 'php/validate.php'; ?>


<script>
  isIndex = false;
  scrollTop = 0;
</script>

<main class="non-index bg-white" id="login-page">

  <div class="header-sm">
    <h1>Edit Your Testimonial</h1>
  </div>
  <div class="container">
    <?php include_once 'php/submit-testimonial-query.php'; ?>
  </div>
  <div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
      <div class="form-row">
        <div class="form-group col-12 col-lg-4">
          <label for="register-first-name">First Name*</label>
          <input type="text" class="form-control" id="register-first-name" name="register-first-name" value="<?php echo $testimonial->first_name;?>">
        </div>
        <div class="form-group col-12 col-lg-4">
          <label for="register-last-name">Last Name*</label>
          <input type="text" class="form-control" id="register-last-name" name="register-last-name" value="<?php echo $testimonial->last_name;?>">
        </div>
        <div class="form-group col-12 col-lg-4">
          <label for="register-city">City*</label>
          <select type="text" class="custom-select" id="register-city" name="register-city" value="<?php echo $testimonial->city;?>">
            <option selected><span class="text-muted">Please select...</span></option>
            <option value="Madison Heights">Madison Heights</option>
            <option value="Royal Oak">Royal Oak</option>
            <option value="Warren">Warren</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="col-12 col-lg-8">
          <label for="testimonial-title">Title*</label>
          <input type="text" name="testimonial-title" id="testimonial-title" class="form-control" value="<?php echo $testimonial->title;?>">
        </div>
        <div class="col-12 col-md-4">
          <label for="testimonial-pic">Upload Picture <span class="text-muted">(Optional)</span></label>
          <input class="form-control-file" type="file" name="testimonial-pic" id="testimonial-pic" value="<?php echo $testimonial->pic;?>">
        </div>
      </div>
      <div class="form-row">
        <div class="col-12">
          <label for="testimonial-text">Text*</label>
          <textarea class="form-control-file" rows="12" name="testimonial-text" id="testimonial-text">
            <?php echo $testimonial->text;?>
          </textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-primary mt-1" name="submit-changes">Submit Changes</button>
    </form>
  </div>
</main>
<?php include_once 'inc/foot.php'; ?>
