<?php 
include_once '../config.php';
session_start();
if (isset($_REQUEST['user_email']) && isset($_REQUEST['post_text'])) {
     $post_user_email = sanitize_input($_REQUEST['user_email']);
     $post_text = sanitize_input($_REQUEST['post_text']);
     $post = new Post;
     if ($post->addPost($post_user_email, $_SESSION['user_name'], $_SESSION['user_pic'],$post_text, 0)) {
        echo 1;
      } else {
           echo 0;
    }   
} else {
    die("Bad request, parameters missing");
}
?>
