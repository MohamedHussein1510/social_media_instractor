<?php
$stmt = $connection->prepare("SELECT `comments`.*  , `posts`.id  as post_id,`users`.id,`users`.name  FROM ((`comments` INNER JOIN `posts` ON 
`posts`.id = `comments`.post_id)INNER JOIN`users`ON `comments`.user_id=`users`.id )WHERE post_id=? ");
$stmt->execute([$post['post_id']]);
$posts = $stmt->fetchAll();
// echo "<pre>";
// print_r($posts);
// echo "</pre>";

?>

<?php foreach ($posts as $post) : ?>
    <div class="containener"></div>
    <form action="">
        <?= $post['name'] ?>
        <div class="form-floating">
            <p class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">
                    <?= $post['comment'] ?></p>
            <label for="floatingTextarea2"></label>
        </div>
    </form>
    </div>
<?php endforeach ?>