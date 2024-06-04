<?php
abstract class Controller extends Db{
    public function redirect($path){
        header("Location:$path");
        exit();
    }
    abstract public function index();
}
?>