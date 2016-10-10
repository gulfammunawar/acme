<form action="/upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" required>
    <input type="submit" value="Upload">
</form>

<?php

$pdo = require('config/db.php');

$stmt = $pdo->prepare('SELECT * FROM images');

$stmt->execute();

$images = $stmt->fetchAll();

foreach($images as $image){
    ?>
    <img src="<?=$image['uri']?>" width="500" alt=""><a href="/remove.php?id=<?=$image['id']?>">Delete</a><br>
    <?php
}