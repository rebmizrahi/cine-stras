<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once 'assets/php/navbar.php';
    include_once 'UserController.php';

    $userController = new UserController;

    if ((empty($_POST["username"])) || empty($_POST["password"])) {
        header("refresh:0;url=admin_info.php?error=empty&lang=" . $lang);
    }
    elseif ($userController->getUserByUsername($_POST["username"]) != null && sizeof($userController->getUserByUsername($_POST["username"])) > 0) {
        header("refresh:0;url=admin_info.php?error=exists&lang=" . $lang);
    }
    else {
        $userController->addAdmin($_POST["username"], $_POST["password"]);
        header("refresh:0;url=admin_info.php?lang=" . $lang);
    }
    ?>
</body>
</html>