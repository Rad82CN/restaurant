<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php

    $app = new App;
    $app->validateLogin();

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM orders WHERE id='$id'";
        $path = 'show-orders.php';

        $app->delete($query, $path);

    } else {
        echo "<script>window.location.href='".ADMINURL."/404.php'</script>";
    }

?>