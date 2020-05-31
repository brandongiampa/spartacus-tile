<?php include_once 'php/send-message.php'; ?>

<section class="container-fluid bg-primary text-white py-4" id="contact-section">
  <div class="row" id="footer-logo">
    <div class="col-12 col-lg-3 px-5 row align-items-center">
      <img src="<?php echo $site_url;?>img/spartacus_tile_icon_white.png" alt="" class="p-5 m-auto">
    </div>
    <div class="container-fluid col-12 col-lg-4 inline m-auto">
      <div class="container m-auto d-flex flex-column justify-content-center align-items-center" id="address">
        <div class="wrapper">
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
        </div>
        <nav id="social-nav" class="mt-4">
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
    <div class="col-12 col-lg-5 row d-flex flex-column align-items-start px-4 mr-2" id="contact-form">
      <?php include_once 'contact-form.php';?>
    </div>
  </div>
</section>
