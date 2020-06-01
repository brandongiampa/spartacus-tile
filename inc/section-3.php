<?php

  try{
    $db = new Database();
    $db->connect();

    $testimonialsOnIndexPage = 4;
    $numberOfTestimonials = $db->getTestimonialsCount();
    $testimonials = $db->getTestimonials($testimonialsOnIndexPage, 0);
  }
  catch(PDOException $ex){
    echo "There was a database connection error.<br>" . $ex->getMessage();
  }
?>
<section id="section-3">
  <header>
    <div class="container">
      <h2>Have we not convinced you yet?  Listen to what some of our customers have to say.</h2>
    </div>
  </header>
  <div class="section-body">
    <div class="container">
      <div class="row">
        <?php for($i=0;$i<4;$i++){
          $firstName = $testimonials[$i]->getFirstName();
          $lastName = $testimonials[$i]->getLastName();
          $city = $testimonials[$i]->getCity();
          $pic = $testimonials[$i]->getPic();
          $title = $testimonials[$i]->getTitle();
          $text = $testimonials[$i]->getText();
          ?>
          <div class="testimonial col-12 col-lg-6" id="testimonial-<?php echo $i+1;?>">
            <div class="row">
              <div class="col-12 col-sm-4 testimonial-img">
                <img src="<?php echo $pic;?>" alt="">
              </div>
              <div class="col-12 col-sm-8">
                <h4 class="text-secondary font-weight-bold">
                  "<?php echo $title;?>"
                </h4>
                <p>
                  <?php echo $text;?>
                </p>
                <h5>
                  <span class="customer-name"><b>-<?php echo $firstName . ' ' . $lastName;?></b>, </span><span class="customer-city"><?php echo $city;?></span>
                </h5>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="container section-footer">
    <a href="<?php echo $site_url;?>testimonials" class="btn btn-primary btn-lg">View All Testimonials</a>
  </div>
</section>
