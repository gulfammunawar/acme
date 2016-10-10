<?php

session_start();

$post = $_POST['status'];

$pdo = require('config/db.php');

if($pdo){
    $stmt = $pdo->prepare('INSERT INTO posts(text,user_id) VALUES(?,?)');
    $stmt->bindParam(1 , $post);
    $stmt->bindParam(2, $_SESSION['id']);

    if($stmt->execute()){
        header('Location:/');
    }
}