<?php

class Testimonial {
  private $id;
  private $accountID;
  private $firstName;
  private $lastName;
  private $city;
  private $pic;
  private $title;
  private $text;

  public function __construct($id, $accountID, $firstName, $lastName, $city, $pic, $title, $text){
    $this->setID($id);
    $this->setAccountID($accountID);
    $this->setFirstName($firstName);
    $this->setLastName($lastName);
    $this->setCity($city);
    $this->setPic($pic);
    $this->setTitle($title);
    $this->setText($text);
  }
  //set functions
  public function setID($id){
    $this->id = $id;
  }
  public function setAccountID($accountId){
    $this->accountID = $accountId;
  }
  public function setFirstName($firstName){
    $this->firstName = $firstName;
  }
  public function setLastName($lastName){
    $this->lastName = $lastName;
  }
  public function setCity($city){
    $this->city = $city;
  }
  public function setPic($pic){
    $this->pic = $pic;
  }
  public function setTitle($title){
    $this->title = $title;
  }
  public function setText($text){
    $this->text = $text;
  }

  //get functions 
  public function getID(){
    return $this->id;
  }
  public function getAccountID(){
    return $this->accountID;
  }
  public function getFirstName(){
    return $this->firstName;
  }
  public function getLastName(){
    return $this->lastName;
  }
  public function getCity(){
    return $this->city;
  }
  public function getPic(){
    return $this->pic;
  }
  public function getTitle(){
    return $this->title;
  }
  public function getText(){
    return $this->text;
  }
}
