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
    echo '<script>alert("failed whitespace")</script>';
    return false;
  }
  //length
  if (strlen($password)<8 || strlen($password)>16){
    echo '<script>alert("failed length")</script>';
    return false;
  }
  if (!preg_match('/[0-9]+/', $password)){
    echo '<script>alert("failed numeric")</script>';
    return false;
  }
  if (!preg_match('/[A-Z]+/', $password)){
    echo '<script>alert("failed uppercase")</script>';
    return false;
  }
  if (!preg_match('/[a-z]+/', $password)){
    echo '<script>alert("failed lowercase")</script>';
    return false;
  }
  if (!preg_match('/[\W]+/', $password)){
    echo '<script>alert("failed character")</script>';
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
