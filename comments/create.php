<form action="comments/store.php" method="post">
    <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
    <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
    <div class="form-floating my-2">
        <textarea class="form-control" placeholder="Leave a comment here" name="comment"></textarea>
        <label for="floatingTextarea">Comments</label>
    </div>
    <button type="submit" class="btn btn-dark">Add Comment</button>
</form>