<?php
abstract class UserRepository extends Db{
    private static function request($request){
        $result = self::getInstance()->query($request);
        self::disconnect();
        return $result;
    }

    public static function getUserByID($id){
        return self::request("SELECT * FROM User WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function getUserByUsernameAndPassword($username, $password){
        return self::request("SELECT id FROM user WHERE username='" . $username . "' AND Password='" . $password . "'")->fetch(PDO::FETCH_ASSOC);
    }

    public static function createUser($username, $password){
        return self::request("INSERT INTO user (username, password) VALUES ('$username', '$password');")->fetch(PDO::FETCH_ASSOC);
    }
    }   