<section class="container-fluid" id="section-2">
  <header>
    <div class="container">
      <h2>
        Interested in getting tile installed, but don't know where to start?  Check out some of our information pages!
      </h2>
    </div>
  </header>
  <div class="section-body" id="view-mores">
    <div class="row">
      <?php

      $kitchenAndBathroom = new ViewMore(
        'Kitchen and Bathroom Tile',
        'Kitchen and Bathroom Tile',
        'img/bathroom3md.jpg',
        'services',
        '1'
      );
      $kitchenAndBathroom->build();

      $customtile = new ViewMore(
        'Custom Tile',
        'Custom Tile',
        'img/customtile2md.jpg',
        'services',
        '1'
      );
      $customtile->build();

      $floortile = new ViewMore(
        'Floor Tile',
        'Floor Tile',
        'img/floortile1md.jpg',
        'services',
        '1'
      );
      $floortile->build();

      ?>
    </div>

  </div>
</section>
