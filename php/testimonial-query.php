<?php

  $query = "SELECT COUNT(*) FROM `testimonials` WHERE `account_id` = ?";
  $stmt = $con->prepare($query);
  $stmt->execute([$_SESSION['account_id']]);

  if($stmt->fetchColumn()>0){
    $query = "SELECT * FROM `testimonials` WHERE `account_id` = ? LIMIT 1";
    $stmt = $con->prepare($query);
    $stmt->execute([$_SESSION['account_id']]);
    $testimonial = $stmt->fetch(PDO::FETCH_OBJ);
  }
?>
