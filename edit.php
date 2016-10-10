<?php

$pdo = require('config/db.php');
$id = $_POST['post_id'];
$post = $_POST['post'];

$stmt = $pdo->prepare('UPDATE posts SET text=? WHERE id=?');
$stmt->bindParam(1,$post);
$stmt->bindParam(2, $id);

if($stmt->execute()){
    header('Location:/');
}

