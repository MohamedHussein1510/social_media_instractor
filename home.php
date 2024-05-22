<?php
session_start();
include "includes/config.php";
?>
<?php include "includes/header.php" ?>
<?php include "includes/navbar.php" ?>
<?php
$stmt = $connection->prepare("SELECT `posts`.*  , `posts`.id  as post_id ,  `users`.id  , `users`.name FROM `posts` INNER JOIN `users` ON 
`users`.id = `posts`.user_id ");
$stmt->execute();
$posts = $stmt->fetchAll();
// echo "<pre>";
// print_r($posts);




// echo "</pre>";

?>
<div class="container mt-3">
    <a class="btn btn-dark" href="posts/create.php">create post</a>
    <?php foreach ($posts as $post) : ?>
        <div class="card my-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        Added by : <a href="posts/show.php?id=<?= $post['id'] ?>"><?= $post['name'] ?></a>
                    </div>
                    <?php if ($_SESSION['id'] == $post['id']) : ?>
                        <div class="col-md-6">
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    control
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="posts/edit.php?post_id=<?= $post['post_id'] ?>">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
                <div class="card-body">
                    <p class="mb-3"><?= $post['content'] ?></p>
                    <!-- start showcomments -->
                    <?php include "comments/display.php"?>
                    <!-- end show comments -->
                    <!-- Start comment -->
                    <?php include "comments/create.php" ?>
                    <!-- end comment -->
                </div>
                <div class="card-footer">
                    Created at <?= $post['created_at'] ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <?php include "includes/footer.php" ?>