<div class="container-fluid">
<nav class="navbar navbar-dark navbar-expand-lg fixed-top" id="navbar-main">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="img/spartacus_tile_logo_white.png" alt="TITAN CUSTOM TILE">
    </a>
    <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample05">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
          <div class="dropdown-menu" aria-labelledby="dropdown05">
            <a class="dropdown-item" href="floor-tile.php">Floor Tile</a>
            <a class="dropdown-item" href="kitchen-and-bath-tile.php">Kitchen and Bath Tile</a>
            <a class="dropdown-item" href="custom-tile.php">Custom Tile</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="testimonials.php">Testimonials</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
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
