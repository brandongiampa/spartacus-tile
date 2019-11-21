<?php include_once 'php/send-message.php'; ?>

<section class="container-fluid bg-primary text-white py-4" id="contact-section">
  <div class="row">
    <div class="col-md-3 px-5">
      <img src="img/spartacus_tile_icon_white.png" alt="" class="p-5">
    </div>
    <div class="container-fluid col-12 col-md-4">
      <div class="container" id="address">
        <h3>Spartacus Tile</h3>
        <p><b>Location</b></br>
          Address: 1608 E Lincoln Ave, Madison Heights, MI 48071</br>
        Phone Number:  (248) 954-0594</br>
        Fax Number: (248) 954-0595</br>
        <br>
        <b>Business Hours</b></br>
          Monday through Friday: 9am-5pm</br>
          Saturday: 9am-2pm</br>
          Sunday: CLOSED
        </p>
        <h5>PROUDLY SERVING OAKLAND COUNTY SINCE 1980!</H5>
        <nav id="social-nav">
          <ul>
            <li>
              <a href="http://www.facebook.com/spartacustile">
                <i class="fab fa-facebook"></i>
              </a>
            </li>
            <li>
              <a href="http://www.twitter.com/spartacustile">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="http://www.instagram.com/spartacustile">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li>
              <a href="http://www.youtube.com/spartacustile">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="col-12 col-md-5" id="contact-form">
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
  </div>
</section>
