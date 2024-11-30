<?php require "../libs/App.php"; ?>
<?php require "../config/config.php"; ?>
<?php require "../includes/header.php"; ?>
<?php
            
    $app = new App;
    $app->validateLogin();

    $query = "DELETE FROM cart WHERE user_id='$_SESSION[user_id]'";
    $path = 'cart.php';

    $app->delete($query, $path);

?>