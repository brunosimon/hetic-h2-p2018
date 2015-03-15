<?php

require 'inc/config.php';
require 'traitement_login.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>V.SYLLA</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container_login">
        <section class="content">
            <form class="form" action="#" method="POST">

                <!-- pseudo -->
                <p class="input <?= array_key_exists('pseudo', $errors) ? 'error' : ''?>">
                    <input type="text" name="pseudo" id="pseudo" value="<?= $pseudo ?>"/>
                    <label for="pseudo">Name</label>
                </p>
                <span class="err"> <?php echo $errors['pseudo']; ?> </span>

                <!-- password -->
                <p class="input <?= array_key_exists('password', $errors) ? 'error' : ''?>">
                    <input type="password" name="password" id="password"/>
                    <label for="password">Password</label>
                </p>
                <span class="err"> <?php echo $errors['password']; ?> </span>


                <p class="submit">
                    <input type="submit" value="Send" />
                </p>
            </form>
            <a href="mdp_lost.php">
                <span class="mdp_forgot"> Password forgotten?</span>
            </a>
        </section>
    </div><!-- end of container -->
</body>
</html>

<!-- end of container -->