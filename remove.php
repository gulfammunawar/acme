<?php

$id = $_GET['id'];

$pdo = require('config/db.php');

$stmt = $pdo->prepare('SELECT * FROM images WHERE id=?');
$stmt->bindParam(1, $id);

$stmt->execute();

$image = $stmt->fetch();

if(unlink($_SERVER['DOCUMENT_ROOT'].$image['uri'])){
    $stmt = $pdo->prepare('DELETE FROM images WHERE id=?');
    $stmt->bindParam(1, $id);

    if($stmt->execute()){
        header('Location:/images.php');
    }

}