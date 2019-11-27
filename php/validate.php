<?php
function validateEmail($email){
  if (filter_var($email, FILTER_VALIDATE_EMAIL)){
    return true;
  }
  return false;
}
function validatePassword($password) {
  //whitespace
  if (rtrim($password) !== $password) {
    return false;
  }
  //length
  if (strlen($password)<8 || strlen($password)>16){
    return false;
  }
  if (!preg_match('/[0-9]+/', $password)){
    return false;
  }
  if (!preg_match('/[A-Z]+/', $password)){
    return false;
  }
  if (!preg_match('/[a-z]+/', $password)){
    return false;
  }
  if (!preg_match('/[\W]+/', $password)){
    return false;
  }
  return true;
}
function confirmPasswordsMatch($password, $confirm){
  if ($password === $confirm) {
    return true;
  }
  return false;
}
function hasAccount($email, $con){
  try{
    $query = 'SELECT COUNT(*) FROM `account` WHERE email = ?';
    $stmt = $con->prepare($query);
    $stmt->execute([$_POST['register_email']]);
    $count = $stmt->fetchColumn();

    if ($count>0){
      return true;
    }
  }catch(PDOException $exception){
    echo 'There was a problem: ' . $exception;
  }
  return false;
}
?>
