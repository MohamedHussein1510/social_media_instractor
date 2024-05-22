<?php
session_start();
include "../includes/config.php";
?>
<?php include "../includes/header.php" ?>
<?php include "../includes/navbar.php" ?>

<div class="container">
    <form action="store.php" method="post" class="mt-5">
        <div class="form-floating">
            <textarea class="form-control my-3" placeholder="Leave a comment here" name="content"></textarea>
            <label for="floatingTextarea">What's in your mind!</label>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
</div>

<?php include "../includes/footer.php" ?>