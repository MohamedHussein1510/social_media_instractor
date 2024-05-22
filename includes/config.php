<?php
$db = 'mysql:host=localhost;dbname=social_media';
$user = 'root';
$pass = '';
try {
    $connection = new PDO($db, $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // attempt to retry the connection after some timeout for example
    echo $e;
}
