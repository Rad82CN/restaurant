<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php

    $app = new App;
    $app->validateLogin();

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM bookings WHERE id='$id'";
        $path = 'show-bookings.php';

        $app->delete($query, $path);

    }

?>