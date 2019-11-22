<?php

  if (!$_SESSION['logged_in'] || !isset($_SESSION['logged_in'])){
    header('Location: login.php');
  }

?>
