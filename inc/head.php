<?php include_once 'php/globals.php';?>
<?php $site_url = isset($site_url) ? $site_url : 'https://spartacus-tile.brandongiampa.com/';?>
<?php include_once 'classes/ViewMore.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab:700&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $site_url;?>css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo $site_url;?>css/style.css">
  <link rel="stylesheet" href="<?php echo $site_url;?>css/view-more.css">
  <title>Spartacus Tile</title>
  <link rel="icon" href="<?php echo $site_url;?>img/spartacus_tile_icon_orange.png">
  <script>
    var isIndex;
  </script>
</head>

<body id="body">
