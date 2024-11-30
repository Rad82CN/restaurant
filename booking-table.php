<?php require "config/config.php"; ?>
<?php require "libs/App.php"; ?>
<?php require "includes/header.php"; ?>
<?php

    $app->validateLogin();
    
    if(isset($_POST['submit'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $date_time = $_POST['date_time'];
        $people = $_POST['people'];
        $special_request = $_POST['special_request'];
        $status = "pending";
        $user_id = $_SESSION['user_id'];

        // if the date and time is valid
        if($date_time > date('m/d/Y h:i:sa')) {
            
            $query = "INSERT INTO bookings (name, email, date_time, people, special_request, status, user_id) 
            VALUES (:name, :email, :date_time, :people, :special_request, :status, :user_id)";
            
            $arr = [
                ':name' => $name,
                ':email' => $email,
                ':date_time' => $date_time,
                ':people' => $people,
                ':special_request' => $special_request,
                ':status' => $status,
                ':user_id' => $user_id,
            ];
    
            $path = "index.php";
    
            $app->insert($query, $arr, $path);
        } else {
            echo "<script>alert('The date you have choose is invalid. please try another date from tomorrow')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }

?>

<?php require "includes/footer.php"; ?>