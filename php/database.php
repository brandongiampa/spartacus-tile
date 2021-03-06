<?php

include_once 'classes/Testimonial.php';

class Database{

  private $host = 'localhost';
  private $username = 'root';
  private $password = '';
  private $db_name = 'spartacus_tile';
  private $con;

  public $errorMsg;

  function __construct(){

  }
  public function connect(){
    $host = $this->host;
    $username = $this->username;
    $password = $this->password;
    $db_name = $this->db_name;

    try {
      $this->con = new PDO("mysql:host={$host}; dbname={$db_name}", $username, $password);
    }catch(PDOException $exception) {
      echo 'Having trouble connecting to database: ' . $exception->getMessage();
    }
  }
  public function checkVkey($vkey){
    $query = "SELECT COUNT(*) FROM `account` WHERE `vkey` = ?";
    $stmt = $this->con->prepare($query);
    $array = array($vkey);
    $stmt->execute($array);
    $output = $stmt->fetchColumn();

    if($output>0){
        return true;
    }
    return false;
  }
  public function getVkey($email){
    $query = "SELECT `vkey` FROM `account` WHERE `email` = ?";
    $stmt = $this->con->prepare($query);
    $array = array($email);
    $stmt->execute($array);
    $output = $stmt->fetch(PDO::FETCH_OBJ);
    return $output->vkey;
  }
  public function activateAccount($vkey){
    $query = "UPDATE `account` SET isActivated = 1 WHERE `vkey` = ?";
    $stmt = $this->con->prepare($query);
    $array = array($vkey);
    $stmt->execute($array);
  }
  public function writeTestimonial($account_id, $first_name, $last_name, $city, $picPath, $title, $text){
    $query = "INSERT INTO `testimonials` (`account_id`, `first_name`, `last_name`, `city`, `pic`, `title`, `text`) VALUES (?,?,?,?,?,?,?)";
    $stmt = $this->con->prepare($query);
    $array = array($account_id, $first_name, $last_name, $city, $picPath, $title, $text);
    $stmt->execute($array);
  }
  public function createaccount($email, $password, $vkey){
    $query = "INSERT INTO `account` (`email`, `hash`, `vkey`) VALUES (?,?,?)";
    $stmt = $this->con->prepare($query);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $array = array($email, $passwordHash, $vkey);
    $stmt->execute($array);
  }
  public function getTestimonial($email){
    $query = "SELECT * FROM `testimonials` WHERE `account_id` = (SELECT `id` FROM `account` WHERE `email` = ?) LIMIT 1";
    $stmt = $this->con->prepare($query);
    $array = array($email);
    $stmt->execute($array);
    $testimonial = $stmt->fetch(PDO::FETCH_OBJ);
    return $testimonial;
  }
  public function getaccountInfo($email){
    $query = "SELECT * FROM `account` WHERE `email` = ? LIMIT 1";
    $stmt = $this->con->prepare($query);
    $array = array($email);
    $stmt->execute($array);
    $account = $stmt->fetch(PDO::FETCH_OBJ);
    return $account;
  }
  public function verifyPassword($email, $password){
    $query = "SELECT `hash` FROM `account` WHERE `email` = ?";
    $stmt = $this->con->prepare($query);
    $array = array($email);
    $stmt->execute($array);
    $hash = $stmt->fetch(PDO::FETCH_OBJ)->hash;
    return password_verify($password, $hash);
  }
  public function getTestimonialCount($email){
    $query = 'SELECT COUNT(*) FROM `testimonials` WHERE `account_id` = (SELECT `id` FROM `account` WHERE `email` = ?)';
    $stmt = $this->con->prepare($query);
    $array = array($email);
    $stmt->execute($array);
    return $stmt->fetchColumn();
  }
  public function isaccountActivated($email){
    $query = 'SELECT `isActivated` FROM `account` WHERE `email` = ? LIMIT 1';
    $stmt = $this->con->prepare($query);
    $array = array($email);
    $stmt->execute($array);

    while ($row=$stmt->fetch(PDO::FETCH_OBJ)){
      if ($row->isActivated){
        return true;
      }
    }
    return false;
  }
  public function editTestimonial($id, $first_name, $last_name, $city, $picPath, $title, $text){
    try {
      if ($picPath!==""){
        $query = 'UPDATE `testimonials` SET `first_name` = ?, `last_name` = ?, `city` = ?, `pic` = ?, `title` = ?, `text` = ? WHERE `id` = ?';
        $stmt = $this->con->prepare($query);
        $array = array($first_name, $last_name, $city, $picPath, $title, $text, $id);
        $stmt->execute($array);
      }else {
        $query = 'UPDATE `testimonials` SET `first_name` = ?, `last_name` = ?, `city` = ?, `title` = ?, `text` = ? WHERE `id` = ?';
        $stmt = $this->con->prepare($query);
        $array = array($first_name, $last_name, $city, $title, $text, $id);
        $stmt->execute($array);
      }
    }catch(PDOException $exception){
      echo '<div class="alert alert-warning">There was an error updating records: ' . $exception->getMessage() .'</div>';
    }
  }
  public function hasaccount($email){
    try{
      $query = 'SELECT COUNT(*) FROM `account` WHERE email = ?';
      $stmt = $this->con->prepare($query);
      $stmt->execute(array($email));
      $count = $stmt->fetchColumn();

      if ($count>0){
        return true;
      }
    }catch(PDOException $exception){
      echo '<div class="alert alert-warning">There was a problem: ' . $exception . '</div>';
    }
    return false;
  }

  public function getTestimonials($limit, $offset){
    $outputArray = array();

    $query = 'SELECT * FROM `testimonials` LIMIT :limit OFFSET :offset';
    $stmt = $this->con->prepare($query);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $id = $row['id'];
      $accountID = $row['account_id'];
      $firstName = $row['first_name'];
      $lastName = $row['last_name'];
      $city = $row['city'];
      $pic = $row['pic'];
      $title = $row['title'];
      $text = $row['text'];

      $testimonial = new Testimonial($id, $accountID, $firstName, $lastName, $city, $pic, $title, $text);

      $outputArray[] = $testimonial;
    }

    return $outputArray;
  }
  public function getTestimonialsCount(){
    $query = 'SELECT COUNT(*) FROM `testimonials`';
    $stmt = $this->con->prepare($query);
    $stmt->execute();

    return $stmt->fetchColumn();
  }
}
?>
