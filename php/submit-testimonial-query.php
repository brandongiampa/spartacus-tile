<?php

  if(isset($_POST['submit-testimonial'])){
    
  }
  function validateImage($img){
    if($img['error']===4){
      return true;
    }
    if (!validateImageSize($img)){
      return false;
    }
    return validateImageExtension($img);
  }
  function validateImageExtension($img){
    $acceptedFileExtensions = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $img['name']);
    $fileExtension = strtolower(end($fileExtension));

    if (in_array($fileExtension, $acceptedFileExtensions)){
      return true;
    }
    return false;
  }
  function validateImageSize($img){
    if ($img['size']>1000000){
      return false;
    }
    return true;
  }
  function createPermanentImagePath($img){
    $fileExtension = explode('.', $img['name']);
    $fileExtension = strtolower(end($fileExtension));
    $destination = 'uploads/'.uniqid('', true).'.'.$fileExtension;
    return $destination;
  }
 ?>
