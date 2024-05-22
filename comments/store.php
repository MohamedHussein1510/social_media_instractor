<?php 
    session_start();
    include "../includes/config.php" ;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $post_id = $_POST['post_id'] ;
       $added_by = $_POST['user_id'] ;
       $comment = $_POST['comment'];
        $stmt = $connection->prepare("INSERT INTO `comments` (comment , status , created_at , post_id , user_id)
         VALUES (? , 'active' , now()  , ? , ? )");
        $stmt->execute([$comment , $post_id , $added_by ]);
        header("location:../home.php");
    }

?>