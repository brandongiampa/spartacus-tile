<?php

  $query = "SELECT COUNT(*) FROM `st_testimonials` WHERE `account_id` = ?";
  $stmt = $con->prepare($query);
  $stmt->execute([12]);

  if($stmt->fetchColumn()>0){
    $query = "SELECT * FROM `st_testimonials` WHERE `account_id` = ? LIMIT 1";
    $stmt = $con->prepare($query);
    $stmt->execute([12]);
    $testimonial = $stmt->fetch(PDO::FETCH_OBJ);
  }
?>
