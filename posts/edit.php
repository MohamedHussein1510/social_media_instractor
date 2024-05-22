<?php
session_start();
include "../includes/config.php";
?>
<?php include "../includes/header.php" ?>
<?php include "../includes/navbar.php" ?>
<?php
$post_id = $_GET['post_id'];
$stmt = $connection->prepare("SELECT * FROM posts WHERE `id` = ? ");
$stmt ->execute([$post_id]);
$post = $stmt->fetch();

?>
<div class="container">
    <form action="update.php" method="post" class="mt-5">
        <input type="hidden" value="<?= $post['id']?>" name="post_id">
        <div class="form-floating">
            <textarea class="form-control my-3" placeholder="Leave a comment here" name="content">
                <?=$post['content']?>
            </textarea>
            <label for="floatingTextarea">What's in your mind!</label>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
</div>

<?php include "../includes/footer.php" ?>