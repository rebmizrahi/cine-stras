<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/post.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
    <?php
        include_once 'PostController.php';
        $postController = new PostController;
        require 'assets/php/navbar.php'; 

        array_key_exists('varname', $_GET) ? $id = $_GET['varname'] : $id=1;
        $post = $postController->getPostByID(intval($id));

    ?>
    <h2><?= $post['TITLE']; ?></h2>
    <p><?= $post['CONTENT']; ?></p>

<?php
if(isset($_SESSION['isAdmin']) and $_SESSION['isAdmin'] == true) { ?>
    <form  method="post" id="update-post-form" action="content_update.php?varname=<?= $id ?>&lang=<?= $lang?>">
    <h3 id="update-title"><?=$trad['content']['update']?></h3>
        <div>
            <label for="new-title"><?=$trad['content']['newTitle']?></label>
            <input type="text" name="new-title" id="new-title" placeholder="">
        </div>
        <div>
            <label for="update-content"><?=$trad['content']['newDescription']?></label>
            <input type="text" name="new-content" id="new-content" placeholder="">
        </div>
        <button type="submit"><?=$trad['content']['update2']?></button>
    </form>
<?php 
}
?>
</main>
</body>
</html>