<?php
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
  public function writeTestimonial($account_id, $first_name, $last_name, $city, $picPath, $title, $text){
    $query = "INSERT INTO `testimonials` (`account_id`, `first_name`, `last_name`, `city`, `pic`, `title`, `text`) VALUES (?,?,?,?,?,?,?)";
    $stmt = $this->con->prepare($query);
    $array = array($account_id, $first_name, $last_name, $city, $picPath, $title, $text);
    $stmt->execute($array);
  }
  public function createAccount($email, $passwordHash){
    $query = "INSERT INTO `account` (`email`, `salt`) VALUES (?,?)";
    $stmt = $this->con->prepare($query);
    $array = array($email, $passwordHash);
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
  public function getAccountInfo($email){
    $query = "SELECT * FROM `account` WHERE `email` = ?";
    $stmt = $this->con->prepare($query);
    $array = array($email);
    $stmt->execute($array);
    $account = $stmt->fetch(PDO::FETCH_OBJ);
    return $account;
  }
  public function getTestimonialCount($email){
    $query = 'SELECT COUNT(*) FROM `testimonials` WHERE `account_id` = (SELECT `id` FROM `account` WHERE `email` = ?)';
    $stmt = $this->con->prepare($query);
    $array = array($email);
    $stmt->execute($array);
    return $stmt->fetchColumn();
  }
  public function isAccountActivated($email){
    $query = 'SELECT `isActivated` FROM `testimonials` WHERE `email` = ?';
    $stmt = $this->con->prepare($query);
    $array = array($email);
    $stmt->execute($array);
    if ($stmt->isActivated===0){
      return false;
    }
    return true;
  }
}

?>
