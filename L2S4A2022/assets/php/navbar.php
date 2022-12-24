<link rel="stylesheet" href="assets/css/navbar.css">
<nav>
    <?php
    array_key_exists('lang', $_GET) ? $lang = $_GET['lang'] : $lang = 'en';
    $lang == 'en' ? include 'assets/php/en.php' : include 'assets/php/fr.php';
    session_start();
    $logged_in = !(empty($_SESSION));
    array_key_exists('varname', $_GET) ? $id = $_GET['varname'] : $id = 'none';
    
?>
        <a href="/index.php?lang=<?=$lang?>"><?= $trad['navbar']['home'];?></a>
        <a href="/login.php?lang=<?=$lang?>"><?= $logged_in ? "" : $trad['navbar']['login'];?></a>
        <a href="/logout.php?lang=<?=$lang?>"><?= $logged_in ? $trad['navbar']['logout'] : "";?></a>
        <a href="/admin_info.php?lang=<?=$lang?>"><?= $logged_in ? $trad['adminInfo']['nav'] : "";?></a>

    <?php 

    $cur_page_name = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>
    
    <a id="languageToggleEn" href="<?php
        if ($id == 'none') {
            echo $cur_page_name . "?lang=en";
        }
        else {
            echo $cur_page_name  . "?lang=en" . "&varname=" . $id;
        } ?>">
    <?php if ($lang == 'en') {?><?php } 
        else {?>English<?php
            } ?>
    </a>

    <a id="languageToggleFr" href="<?php
    if ($id == 'none') {
        echo $cur_page_name . "?lang=fr";
    }
    else {
        echo $cur_page_name . "?lang=fr" . "&varname=" . $id;
    } ?>">
        <?php if ($lang != 'en') {
            ?><?php } else {
                ?>Français<?php
            } ?>
    </a>
</nav>
