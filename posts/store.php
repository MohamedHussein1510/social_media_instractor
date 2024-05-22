<?php 
    session_start();
    include "../includes/config.php" ;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $content = $_POST['content']; 
        $stmt = $connection->prepare("INSERT INTO `posts` (content , status , user_id , created_at)
         VALUES (? , 'active' , ? , now() )");
        $stmt->execute([$content , $_SESSION['id'] ]);
        header("location:../home.php");
    }

?>