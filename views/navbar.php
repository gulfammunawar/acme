<div class="navbar">
    <div class="wrapper">
        <div class="left">
            <div class="title">
                Acme
            </div>
        </div>

        <div class="right">
            <ul>
                <?php
                    if(!isset($_SESSION['email'])){
                    ?>
                        <li>
                            <a href="/login.php">Login</a>
                        </li>

                        <li>
                            <a href="/register.php">
                                Register
                            </a>
                        </li>
                    <?php
                    }

                    else{
                        ?>

                        <li>
                            <?=$_SESSION['email']?>
                        </li>
                        <li>
                            <a href="/logout.php">Logout</a>
                        </li>
                        <?php
                    }
                ?>


            </ul>
        </div>
    </div>
</div>