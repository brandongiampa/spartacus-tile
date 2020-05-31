<div class="container-fluid">
<nav class="navbar navbar-dark navbar-expand-lg fixed-top" id="navbar-main">
  <div class="container">
    <a class="navbar-brand" href="<?php echo $site_url;?>">
      <img src="<?php echo $site_url;?>img/spartacus_tile_logo_white.png" alt="SPARTACUS TILE">
    </a>
    <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample05">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo $site_url;?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
          <div class="dropdown-menu" aria-labelledby="dropdown05">
            <a class="dropdown-item" href="<?php echo $site_url;?>floor-tile">Floor Tile</a>
            <a class="dropdown-item" href="<?php echo $site_url;?>kitchen-and-bath-tile">Kitchen and Bath Tile</a>
            <a class="dropdown-item" href="<?php echo $site_url;?>custom-tile">Custom Tile</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $site_url;?>about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $site_url;?>testimonials">Testimonials</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $site_url;?>contact">Contact</a>
        </li>
      </ul>
    </div>
    <?php
      if(isset($_SESSION['loginEmail'])):?>
        <form action="logout.php">
          <input class="btn btn-link" type="submit" id="logout" name="logout" value="LOG OUT">
        </form>
    <?php endif;?>
    <div class="phone-number ml-auto">
      <a href="#" class="btn btn-primary">248-954-0594</a>
    </div>
  </div>
</nav>
</div>
