<?php
session_start();
include "includes/config.php";
?>
<?php include "includes/header.php" ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username =  $_POST['username'];
    $password =  sha1($_POST['password']);
    $query = "SELECT *  FROM users WHERE `name` = ? AND `password` = ? ";
    $stmt = $connection->prepare($query);
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['name'];
    if ($stmt->rowCount() == 1) {
        header("location:home.php");
    } else {
        echo "account doesn't exist";
    }
}

?>
<div class="container">
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" class="mt-5">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<?php include "includes/footer.php" ?>