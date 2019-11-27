<?php

  if(isset($_POST['submit-changes'])){

    switch($_FILES['testimonial-pic']['error']){
      case 1: {}
      case 2: {}
      case 3: {}
      case 5: {}
      case 6: {}
      case 7: {}
      case 8: {
        echo '<div class="alert alert-danger text-center">There was an error uploading your file.</div>';
        break;
      }
      case 4: {$picPath=""; break;}
      default: {
        if(validateImage($_FILES['testimonial-pic'])){
          $picPath=createPermanentImagePath($_FILES['testimonial-pic']);
          move_uploaded_file($_FILES['testimonial-pic']['tmp_name'], $picPath);
        }else {
          echo '<div class="alert alert-danger text-center">Your file was not uploaded.  Please only use files less than 1MB with .jpg, .jpeg or .png extensions.</div>';
        }
      }
    }

    if(isset($picPath)&&validateImage($_FILES['testimonial-pic'])){
      try{
        $query = 'UPDATE `testimonials` (`first_name`, `last_name`, `city`, `pic`, `title`, `text`) VALUES (?,?,?,?,?,?) WHERE `id` = ?';
        $stmt = $con->prepare($query);
        $stmt->execute([
          $_POST['register-first-name'],
          $_POST['register-last-name'],
          $_POST['register-city'],
          $picPath,
          $_POST['testimonial-title'],
          $_POST['testimonial-text'],
          10
        ]);
        header('Location: my-account.php');
      }catch(PDOException $exception){
        '<div class="alert alert-danger text-center">There was an error connecting to the database: '.$exception->getMessage().'</div>';
      }
    }
  }else {
    $query = 'SELECT * FROM `testimonials` WHERE `account_id` = ?';
    $stmt = $con->prepare($query);
    $stmt->execute([10]);
    $testimonial = $stmt->fetch(PDO::FETCH_OBJ);
  }
  function validateImage($img){
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
