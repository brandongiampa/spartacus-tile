<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'spartacus_tile';

try {
  $con = new PDO("mysql:host={$host}; dbname={$db_name}", $username, $password);
}catch(PDOException $exception) {
  echo '</br></br></br></br></br></br></br></br></br></br>';
  echo 'Having trouble connecting to database: ' . $exception->getMessage();
}

?>
