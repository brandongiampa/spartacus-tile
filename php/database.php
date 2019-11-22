<?php

echo '<script>alert("Connected to database");</script>';

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'spartacus_tile';

try {
  $con = new PDO("mysql:host={$host}; dbname={$dbname}", $username, $password);
}catch(PDOException $exception) {
  echo 'Having trouble connecting to database: ' . $exception->getMessage();
}

?>
