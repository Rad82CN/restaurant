<?php

class App {

    public $host = HOST;
    public $dbname = DBNAME;
    public $user = USER;
    public $pass = PASS;

    public $link; // for connecting to database

    public function __construct() {
        $this->connect();
    }

    // connecting to database function
    public function connect() {
        $this->link = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname."", $this->user, $this->pass);

        // if($this->link) {
        //     echo "db connected";
        // }
    }

    // CRUD operations (Create, Read, Update, Delete)
    
    // select all rows function
    public function selectAll($query) {
        $rows = $this->link->query($query);
        $rows->execute();

        $allRows = $rows->fetchAll(PDO::FETCH_OBJ);

        if($allRows) {
            return $allRows;
        } else {
            return false;
        }
    }

    // select one row function
    public function selectOne($query) {
        $rows = $this->link->query($query);
        $rows->execute();
    
        $singleRows = $rows->fetch(PDO::FETCH_OBJ);
    
        if($singleRows) {
            return $singleRows;
        } else {
            return false;
        }
    }

    // Create
    public function insert($query, $arr, $path) {
        if($this->validate($arr) == "empty") {
            echo "<script> alert('one or more slots are empty') </script>";
        } else {

            $insert_record = $this->link->prepare($query);
            $insert_record->execute($arr);

            echo "<script>window.location.href='".$path."'</script>";
        }
    }

    // Update
    public function update($query, $arr, $path) {
        // we are not gonna let the slot be empty when updating
        if($this->validate($arr) == "empty") {
            echo "<script> alert('one or more slots are empty') </script>";
        } else {

            $update_record = $this->link->prepare($query);
            $update_record->execute($arr);

            header("location: ".$path."");
        }
    }

    // Delete
    public function delete($query, $path) {
        $delete_record = $this->link->query($query);
        $delete_record->execute();

        echo "<script>window.location.href='".$path."'</script>";
    }

    public function validate($arr) {
        if(in_array("", $arr)) {
            echo "empty";
        }
    }

    // Register user
    public function register($query, $arr, $path) {
        if($this->validate($arr) == "empty") {
            echo "<script> alert('one or more slots are empty') </script>";
        } else {

            $register_user = $this->link->prepare($query);
            $register_user->execute($arr);

            header("location: ".$path."");
        }
    }

    // Login user
    public function login($query, $data, $path) {
        
        // email/username verification
        $login_user = $this->link->query($query);
        $login_user->execute();

        $fetch = $login_user->fetch(PDO::FETCH_ASSOC); // fetch as associative array

        // password verification
        if($login_user->rowCount() > 0) {
            if(password_verify($data['password'], $fetch['password'])) {
                // start session vars
                $_SESSION['user_id'] = $fetch['id'];
                $_SESSION['email'] = $fetch['email'];
                $_SESSION['username'] = $fetch['username'];
                
                header("location: ".$path."");

            }
        }
    }

    // startin session
    public function startingSession() {
        session_start();
    }

    // validates session so if the user is logged in, they wont access login/register page again
    public function validateSession() {
        if(isset($_SESSION['user_id'])) {
            echo "<script>window.location.href='".APPURL."'</script>";
        }
    }

    // validates admin session so if the user is logged in, they wont access login/register page again
    public function validateSessionAdmin() {
        if(isset($_SESSION['user_id'])) {
            echo "<script>window.location.href='".ADMINURL."'</script>";
        }
    }

    //validates if thee user is logged in or not
    static public function validateLogin() {
        if(is_null($_SESSION['user_id'])) {
            echo "<script>window.location.href='".APPURL."/auth/login.php'</script>";
        }
    }

    //validates if thee user is logged in or not
    static public function validateLoginAdmin() {
        if(is_null($_SESSION['user_id'])) {
            echo "<script>window.location.href='".ADMINURL."/admins/login-admins.php'</script>";
        }
    }

    // validating cart
    public function validateCart($q) {
        $row = $this->link->query($q);
        $row->execute();
        $count = $row->rowCount();
        return $count;
    }
}

