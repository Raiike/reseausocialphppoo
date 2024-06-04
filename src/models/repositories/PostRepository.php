<?php
abstract class PostRepository extends Db{
    private static function request($request){
        $result = self::getInstance()->query($request);
        self::disconnect();
        return $result;
    }

    public static function getPost(){         
        return self::request("SELECT * FROM POST")->fetchAll(PDO::FETCH_ASSOC);     
    }

    public static function getPostByID($id){
        return self::request("SELECT * FROM POST WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    }

    public static function modifyPost($setPost){
        return self::request("UPDATE POST
        SET title = '" .$setPost->getTitle()."', content = '" . $setPost->getContent() ."' WHERE id =  " .$setPost->getId()." ");
    }

    public static function deletePost($id){
        return self::request("DELETE FROM post WHERE id = $id;");
    }

    public static function addPost(post $post){
        return self::request("INSERT INTO post (title, content, id_user) VALUES ('" . $post->getTitle() ."', '" . $post->getContent() ."', '" . $post->getid_user() ."'); ");
    }

}