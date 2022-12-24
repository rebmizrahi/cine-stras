<?php
include_once 'PostController.php';
include_once 'assets/php/navbar.php'; 

$postController = new PostController;

$id = intval($_GET['varname']);
$check1 = $postController->setTitle($_REQUEST['new-title'], $id);
$check2 = $postController->setContent($_REQUEST['new-content'], $id);

$url = "content.php?varname=" . $_GET['varname'];
if ($check1 && $check2) {
    header("Location: " . $url . "&lang=" . $lang);
} else {
    //add an error? 
    header("Location: " . $url . "&lang=" . $lang);
}
