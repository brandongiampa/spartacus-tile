<?php include_once 'php/send-message.php'; ?>
<?php include_once 'inc/head.php';?>
<div class="index">
  <?php include_once 'inc/navbar.php';?>
</div>
<script>
  isIndex = false;
</script>

<main class="non-index bg-white" id="contact-page">
  <div class="header">
    <div class="header-bg"></div>
    <div class="header-opaque"></div>
    <div class="container header-text">
      <h1>Contact</h1>
    </div>
  </div>
  <div class="bg-white" id="non-header">
    <div class="row">
      <div id="contact-address" class="col-12 col-lg-5 bg-white p-5">
        <div class="container bg-white p-4" id="contact-address-text">
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
          <p>We are located in the Windermere Plaza next to the Little Caesars.  You can't miss the sign.</p>
        </div>
        <div id="social-nav-wrapper">
          <nav id="social-nav" class="">
            <ul>
              <li>
                <a href="http://www.facebook.com/spartacustile">
                  <i class="fab fa-facebook text-primary"></i>
                </a>
              </li>
              <li>
                <a href="http://www.twitter.com/spartacustile">
                  <i class="fab fa-twitter text-primary"></i>
                </a>
              </li>
              <li>
                <a href="http://www.instagram.com/spartacustile">
                  <i class="fab fa-instagram text-primary"></i>
                </a>
              </li>
              <li>
                <a href="http://www.youtube.com/spartacustile">
                  <i class="fab fa-youtube text-primary"></i>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="col-12 col-md-7 p-5" id="contact-form">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <h3>Send us a message!</h3>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name" placeholder="John Doe" required>
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" rows="7" placeholder="message"></textarea>
          </div>
          <input type="submit" value="Send" class="btn btn-secondary btn-outline border-3px border-white" id="submit" disabled>
        </form>
      </div>
    </div>
    <div class="full-page-map">
      <div id="map"></div>
    </div>
  </div>
</main>
<?php include_once 'inc/back-to-top.php'; ?>
<?php include_once 'inc/foot.php'; ?>
