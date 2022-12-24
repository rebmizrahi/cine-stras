<?php 
    require 'assets/php/navbar.php'; 
    array_key_exists('lang', $_GET) ? $lang = $_GET['lang'] : $lang = 'en';
    array_key_exists('error', $_GET) ? $error = $_GET['error'] : $error = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/contact.css">
    <script type="module" src="assets/js/contact.js"></script>

</head>
<body>
    <section> <!-- action="login_verification.php" -->
        <form method="post"  id="login-form" action="login_verification.php?lang="<?= $lang ?>>
            <h1 id="log-in-title">
                <?=$trad['connection']['login']?>
            </h1>
            <label for="username">
            <?= $trad['connection']['username']?> :</label>
            <input type="text" name="username" id="username" 
            placeholder="<?= $trad['connection']['username']?>" 
            required>
            <br><br>
            <label for="password"><?= $trad['connection']['password']?> :</label>
            <input type="password" name="password" id="password" 
            placeholder="<?= $trad['connection']['password']?>" required>
            <br><br>
            <button type="submit"><?= $trad['connection']['button']?></button>
        </form>
        <p id="login-error-msg"><?= $trad['connection']['length'] ?></p>
    </section>
    <p id="bdd-error-msg"><?php
            if (!(empty($error))) {
                echo $trad['connection'][$error];
            }
        ?></p> 
</body>
</html>
