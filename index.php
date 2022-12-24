<!doctype html>
<html lang="en">
<head>
    <link href="https://fonts.cdnfonts.com/css/raptor-kill" rel="stylesheet">    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <title>Document</title>
</head>
<body>
<?php 
    require_once 'assets/php/navbar.php'; 
    include_once 'PostController.php';
    $postController = new PostController;
?>
    <main>
        <div class="container">
            <div class="centered">
                <h1 id="title"><?= $trad['index']['title']?></h1>
                <h3 id="subtitle"><?= $trad['index']['subtitle']?></h3>
            </div>
        <div class="posts">
            <h2 id="playing"><?= $trad['index']['playing'] ?></h2>
        <?php
        $posts = $postController->getPosts();

        foreach ($posts as $post) :?>                
        <a href="content.php?varname=<?php echo $post['ID'] ?>&lang=<?= $lang ?>">
                    <article>
                        <section>
                            <h3><?php echo $post['TITLE']; ?></h2>
                            <p><?= $post['CONTENT']; ?></h3>
                        </section>
                        <footer>
                            <button>
                                <?php echo $trad['index']['seeDetailsButton'] ?>
                            </button>
                        </footer>
                    </article>
                </a>
            <?php endforeach; ?>
            </div>
        </div>
    </main>
</body>
</html>