<?php 
    session_start();
    include "../includes/config.php" ;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $content = $_POST['content']; 
        $post_id = $_POST["post_id"];
        $stmt = $connection->prepare("UPDATE `posts` SET `content` = ? WHERE `id` = ? ");
        $stmt->execute([$content , $post_id ]);
       header("location:../home.php");
    }

?>