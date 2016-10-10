<?php

$pdo = require('config/db.php');
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECt * FROM posts where id=?');
$stmt->bindParam(1, $id);

$stmt->execute();

$post = $stmt->fetch();

?>

<form action="/edit.php" method="POST">
    <input type="text" name="post" value="<?=$post['text']?>" required>
    <input type="hidden" name="post_id" value="<?=$post['id']?>">
    <input type="submit" name="submit" value="Update">
</form>