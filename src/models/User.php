<?php
class User extends UserRepository{
  private $id;
  private $username;
  private $password;
  
  public function __construct($id, $username, $password){
    $this->id=htmlspecialchars($id);
    $this->setUsername($username);
    $this->setPassword($password);
  }

  public function getId(){ return $this->id; }

  public function getUsername(){ return $this->username; }
  public function setUsername($username){ $this->username = htmlspecialchars($username); }

  public function getPassword(){ return $this->password;}
  public function setPassword($password){ $this->password=$password; }
}