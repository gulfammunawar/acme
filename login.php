<?php
ob_start();
?>
<!doctype html>
<html lang="en">
<?php
$title = 'Login - Acme';
include('views/header.php');
?>
<body>
<?php
include('views/navbar.php');
?>
<div class="container">
    <div class="login">
        <form action="/login.php" method="POST">
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
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $email = $_POST['email'];
                            $password = $_POST['password'];

                            if ($pdo) {
                                $stmt = $pdo->prepare('SELECT * FROM users WHERE email=? AND password=?');
                                $stmt->bindParam(1, $email);
                                $stmt->bindParam(2, $password);
                                $stmt->execute();

                                $user = $stmt->fetch();

                                if ($user) {
                                    session_start();

                                    $_SESSION['email'] = $email;
                                    $_SESSION['id'] = $user['id'];
                                    header('Location:/');
                                } else {
                                    echo "Incorrect credentials";
                                }


                            }
                        }

                        ?>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Login">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

</body>
</html>