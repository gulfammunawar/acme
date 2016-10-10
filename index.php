<?php
    ob_start();
    session_start();

    if(!isset($_SESSION['email'])){
        header('Location:/login.php');
    }
?>
<!doctype html>
<html lang="en">
<?php
$title = 'Acme';
include('views/header.php');
?>
<body>
<?php
include('views/navbar.php');
?>

<div class="container">

    <form action="/save.php" method="POST">
        <input type="text" name="status" required>
        <input type="submit" value="POST">
    </form>


    <div class="posts">
        <?php
        $pdo = require('config/db.php');

        if($pdo){
            $stmt = $pdo->prepare('SELECT * FROM posts ORDER BY id DESC');

            $stmt->execute();

            $posts = $stmt->fetchAll();

            foreach($posts as $post){

                $stmt = $pdo->prepare('SELECT email FROM users WHERE id=?');
                $stmt->bindParam(1,$post['user_id']);
                $stmt->execute();

                $user = $stmt->fetch();
                ?>
                    <div class="post">
                        <?=$user['email']?> posted : <?=$post['text']?>
                        <a href="/delete.php?id=<?=$post['id']?>">Delete</a>
                        <a href="/update.php?id=<?=$post['id']?>">Edit</a>
                    </div>
                <?php
            }
        }
        ?>
    </div>


</div>
</body>
</html>