<!doctype html>
<html lang="en">
<head>
    <link href="https://fonts.cdnfonts.com/css/raptor-kill" rel="stylesheet">    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/login_verification.css">
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <title>Document</title>
</head>
<?php
require_once 'assets/php/navbar.php'; 
include_once 'UserController.php';

$userController = new UserController;

$error = ""; 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    $error = $trad['connection']['redundant'];
    if ($lang=="en") {
        header("refresh:1;url=index.php?lang=" . $lang);
    }
    else {
        header("refresh:0;url=index.php&lang=" . $lang);
    }
}

//if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if username is empty
if(empty($_POST["username"]))
{
    header("refresh:0;url=login.php?error=invalid&lang=" . $lang);
} else {
    $username = trim($_POST["username"]);
}
    
    // Check if password is empty
if(empty($_POST["password"]))
{
    header("refresh:0;url=login.php?error=invalid&lang=" . $lang);
} else {
    $password = trim($_POST["password"]);
}
    
$user = $userController->getUserByUsernameAndPassword($username,$password);

if(empty($user) || $user['USERNAME'] == null || $user['PASSWORD'] == null)
{
    $error = "Invalid username or password.";
    header("refresh:0;url=login.php?error=invalid&lang=" . $lang);
}
else {
    session_start();
    $error = "Success.";
    $_SESSION["loggedin"] = true;
    $_SESSION["username"] = $user['USERNAME'];;
    $_SESSION["isAdmin"] = $user['ISADMIN'];
     header("refresh:0;url=index.php?lang=" . $lang);
}

if ($error != "Success.") {
    header("refresh:0;url=login.php?error=problem&lang=" . $lang);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <p id="error"><?= $error ?></p>
</body>
</html>

<script>
    document.getElementById("error").style.display = block;
</script>
