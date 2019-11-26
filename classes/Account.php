<?php
class Account {
    $id;
    $email;
    $hash;
    $firstName;
    $lastName;
    $isActivated;

    function __construct($id, $email, $hash, $firstName, $lastName, $isActivated){
      $this->id = $id;
      $this->email = $email;
      $this->hash = $hash;
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->isActivated = $isActivated;
    }
}
