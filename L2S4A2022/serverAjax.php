<?php
    include_once 'UserController.php';

    $userController = new UserController;

    echo json_encode ($userController->getUsers());
