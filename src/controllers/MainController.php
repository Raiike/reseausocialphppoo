<?php
class MainController extends Controller{
    public function index(){
        $posts = [];
        try {
            $userID = $_SESSION["id"];
            $user = User::getUserByID($userID);
            $username = $user["username"];
            if (isset($_POST['confirm'])) {

                $postId = $_POST['confirm'];
            
                $newTitle = $_POST['new-post-title'];
                $newContent = $_POST['new-post-content'];
    
                Post::modifyPost(new Post ($postId, $newTitle, $newContent, 0));

            }
            if (isset($_POST['delete'])) {

                $postId = $_POST['delete'];
                Post::deletePost($postId);

            }
            if (isset($_POST['Publier'])) {

                $post = $_POST['Publier'];
                Post::addPost(new Post (0, $_POST["addTitle"],  $_POST["addContent"], $_SESSION["id"]));

            }
            $dbPosts = Post::getPost();
            foreach($dbPosts as $post){
                array_push($posts , new Post($post["id"], $post["title"], $post["content"], $post['id_user']));
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        require(__DIR__ . "/../../views/main.php");

    }
}