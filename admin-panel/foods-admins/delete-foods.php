<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php

    $app = new App;
    $app->validateLogin();

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM foods WHERE id='$id'";
        $one = $app->selectOne($query);

        unlink("foods-images/" . $one->image);

        $query = "DELETE FROM foods WHERE id='$id'";
        $path = 'show-foods.php';

        $app->delete($query, $path);

    }

?>