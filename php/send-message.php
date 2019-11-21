<?php

  if(filter_has_var(INPUT_POST, 'submit')){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
  }

  if(!empty($name) && !empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)===false){
      $msg = "Please enter a valid email.";
      $msgClass = "alert-danger";
    }else {
      $toEmail = "spartacustile@gmail.com";
      $subject = "Contact request from " . $name;
      $body = "<h2>Contact Request</h2>";
      $body .= '<h4>Name: </h4><p>' . $name . '</p>';
      $body .= '<h4>Email Address: </h4><p>' . $email . '</p>';
      $body .= '<h4>Message: </h4><p>' . $message . '</p>';

      $headers = "MIME-Version:1.0"."\r\n";
      $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "From: " . $name . "<" . $email . ">" . "\r\n";

      if(mail($toEmail, $subject, $body, $headers)){
        $msg = "Inquiry sent successfully.";
        $msgClass = "alert-success";
        $name = ""; $email = "";  $message = "";
      }else {
        $msg = "Unfortunately, there was an issue sending your email.  Please try again.";
        $msgClass = "alert-danger";
      }
    }
  }else {
    $msg = "Please fill in all fields.";
    $msgClass = "alert-danger";
  }
?>
