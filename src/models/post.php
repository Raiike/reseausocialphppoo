<?php
class Post extends PostRepository{
  private $id;
  private $title;
  private $content;
  private $id_user;
  
  public function __construct($id, $title, $content, $id_user){
    $this->id=htmlspecialchars($id);
    $this->setTitle($title);
    $this->setContent($content);
    $this->id_user = $id_user;
  }

  public function getId(){ return $this->id; }

  public function getTitle(){ return $this->title; }
  public function setTitle($title){ $this->title = htmlspecialchars($title); }

  public function getContent(){ return $this->content;}
  public function setContent($content){ $this->content=$content; }

  public function getid_user(){ return $this->id_user;}
  public function setid_user($id_user){ $this->id_user=$id_user; }
}