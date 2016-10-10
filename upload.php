<?php

ob_start();

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$file = $_FILES['image'];

$ext = pathinfo($file['name'], PATHINFO_EXTENSION);


if($file['error'] == 0){
    $pdo = require('config/db.php');

    $upload_folder = $_SERVER['DOCUMENT_ROOT'].'/uploads';

    $file_name = generateRandomString().'.'.$ext;

    $target = $upload_folder.'/'.$file_name;

    if(move_uploaded_file($file['tmp_name'], $target)){
        if($pdo){
            $stmt = $pdo->prepare('INSERT INTO images(uri) VALUES(?)');
            $uri = '/uploads/'.$file_name;
            $stmt->bindParam(1, $uri);
            if($stmt->execute()){
                header('Location:/images.php');
            }
        }
    }
}else{
    echo $file['error'];
}