<?php

$id = $_GET['id'];

$pdo = require('config/db.php');

if($pdo){
    $stmt = $pdo->prepare('DELETE FROM posts WHERE id=?');
    $stmt->bindParam(1, $id);
    if($stmt->execute()){
        header('Location:/');
    }

}