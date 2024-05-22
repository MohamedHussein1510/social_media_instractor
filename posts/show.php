<?php
session_start();
include "../includes/config.php";
?>
<?php include "../includes/header.php" ?>
<?php include "../includes/navbar.php" ?>
<?php
$user_id = $_GET['id'];
$stmt = $connection->prepare("SELECT `posts`.* , `users`.id , `users`.name FROM `posts` INNER JOIN `users` ON 
`users`.id = `posts`.user_id  WHERE `users`.id = ?  ");
$stmt->execute([$user_id]);
$posts = $stmt->fetchAll();
// echo "<pre>";
// print_r($posts);
// echo "</pre>";
?>
<div class="container mt-3">
    <!-- <a class="btn btn-dark" href="posts/create.php">create post</a> -->
    <?php foreach ($posts as $post) : ?>
        <div class="card my-3">
            <div class="card-header">
                Added by : <?= $post['name'] ?>
            </div>
            <div class="card-body">
                <?= $post['content'] ?>
            </div>
            <div class="card-footer">
                Created at <?= $post['created_at'] ?>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?php include "../includes/footer.php" ?>