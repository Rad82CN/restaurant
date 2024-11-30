<?php require "../libs/App.php"; ?>
<?php require "../config/config.php"; ?>
<?php require "../includes/header.php"; ?>
<?php

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
            
        $app = new App;
        $query = "DELETE FROM cart WHERE id='$id'";
        $path = 'cart.php';

        $app->delete($query, $path);

    } else {
        echo "<script>window.location.href='".APPURL."/404.php'</script>";
    }

?>