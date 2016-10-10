<!doctype html>
<html lang="en">
<?php
$title = 'Register - Acme';
include('views/header.php');
?>
<body>
<?php
include('views/navbar.php');
?>
<div class="container">
    <div class="register">
        <form action="/register.php" method="POST">
            <table>
                <tr>
                    <td>
                        Email
                    </td>

                    <td>
                        <input type="email" name="email" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        Password
                    </td>

                    <td>
                        <input type="password" name="password" required>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <?php
                            $pdo = require('config/db.php');
                            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                                $email = $_POST['email'];
                                $password = $_POST['password'];

                                if($pdo){
$stmt = $pdo->prepare('SELECT * FROM users WHERE email=?');
     $stmt->bindParam(1, $email);
        $stmt->execute();

           $user = $stmt->fetchAll();

                    if(count($user)){
                            echo "User already exist";
                                    }
    else{
 $stmt = $pdo->prepare('INSERT INTO users(email, password) VALUES(?,?)');
        $stmt->bindParam(1, $email);
         $stmt->bindParam(2, $password);

             if($stmt->execute()){
        echo "Registration succesfull";
                                        }
                                    }


                                }
                            }

                        ?>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Register">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>