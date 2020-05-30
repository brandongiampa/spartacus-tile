<div class="col-12" id="contact-form-div">
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <?php if(!empty($msg)):?>
      <div class="alert <?php echo $msgClass;?>">
        <?php echo $msg;?>
      </div>
    <?php endif; ?>
    <h3>Send us a message!</h3>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="name" class="form-control" id="name" name="name" value="<?php echo isset($name) ? $name : '';?>">
    </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($email) ? $email : '';?>">
    </div>
    <div class="form-group">
      <label for="message">Message</label>
      <textarea class="form-control" id="message" name="message" rows="7"> value="<?php echo isset($name) ? $name : '';?>"</textarea>
    </div>
    <input type="hidden" name="scrollTop" id="scrollTop" value="">
    <button type="submit" name="submit" class="btn btn-secondary btn-outline border-3px border-white" id="submit" disabled>Submit</button>
  </form>

</div>
