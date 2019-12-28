<?php include_once 'inc/head.php';?>
<?php include_once 'php/database.php';?>

<?php
  $testimonialsPerPage = 10;
  $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
  $offset = isset($_GET['page']) ? ((intval($_GET['page'])-1)*10) : 0;

  $DB = new Database();
  $DB->connect();
  $testimonials = $DB->getTestimonials($testimonialsPerPage, $offset);

  $numberOfTestimonials = $DB->getTestimonialsCount();
  $numberOfPages = ceil($numberOfTestimonials/$testimonialsPerPage);
?>

<div class="index">
  <?php include_once 'inc/navbar.php';?>
</div>
<script>
  isIndex = false;
</script>

<main class="non-index bg-white" id="testimonials-page">
  <div class="header">
    <div class="header-bg"></div>
    <div class="header-opaque"></div>
    <div class="container header-text">
      <h1>Testimonials</h1>
    </div>
  </div>
  <div class="section-body bg-white">
    <section id="section-1">
      <h3>Do you want to share your experience with Spartan?  <a href="write-testimonial.php" class="btn btn-primary">Write a Testimonial</a></h3>
    </section>
    <section id="section-2">
      <div class="container">
        <div class="row">
          <?php
            if($offset>$numberOfTestimonials){
              echo 'This page does not exist.';
            }
            else {
              for ($i=0; $i<sizeof($testimonials); $i++){
                $firstName = $testimonials[$i]->getFirstName();
                $lastName = $testimonials[$i]->getLastName();
                $city = $testimonials[$i]->getCity();
                $pic = $testimonials[$i]->getPic();
                $title = $testimonials[$i]->getTitle();
                $text = $testimonials[$i]->getText();
                ?>
                <div class="testimonial col-12 col-lg-6" id="testimonial-1">
                  <div class="row">
                    <div class="col-12 col-sm-4">
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
                <?php
              }
            }
          ?>
        </div>
      </div>
    </section>
    <section id="section-3" >
      <?php
      if($numberOfTestimonials>10){?>
        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
          <ul class="pagination">
            <?php if($numberOfPages>1):?>
              <li class="page-item"><a class="page-link" href="testimonials.php?page=1">First</a></li>
            <?php endif;?>

            <?php if($currentPage-2>0):?>
              <li class="page-item"><a class="page-link" href="testimonials.php?page=<?php echo $currentPage-2;?>"><?php echo $currentPage-2;?></a></li>
            <?php endif;?>

            <?php if($currentPage-2>0):?>
              <li class="page-item"><a class="page-link" href="testimonials.php?page=<?php echo $currentPage-1;?>"><?php echo $currentPage-1;?></a></li>
            <?php endif;?>

            <li class="page-item active"><a class="page-link" href="testimonials.php?page=<?php echo $currentPage;?>"><?php echo $currentPage;?></a></li>

            <?php if($currentPage<$numberOfPages):?>
              <li class="page-item"><a class="page-link" href="testimonials.php?page=<?php echo $currentPage+1;?>"><?php echo $currentPage+1;?></a></li>
            <?php endif;?>

            <?php if($currentPage<$numberOfPages-1):?>
              <li class="page-item"><a class="page-link" href="testimonials.php?page=<?php echo $currentPage+2;?>"><?php echo $currentPage+2;?></a></li>
            <?php endif;?>

            <?php if($numberOfPages>1):?>
              <li class="page-item"><a class="page-link" href="testimonials.php?page=<?php echo $numberOfPages;?>">Last</a></li>
            <?php endif;?>
          </ul>
        </nav>
      <?php
      }

      ?>
    </section>
  </div>
</main>
<?php include_once 'inc/contact.php'; ?>
<?php include_once 'inc/map.php'; ?>
<?php include_once 'inc/back-to-top.php';?>
<?php include_once 'inc/foot.php'; ?>
