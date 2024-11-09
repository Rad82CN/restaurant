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

        if($this->link) {
            echo "db connected";
        }
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

            header("location: ".$path."");
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

        header("location: ".$path."");
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

        $fetch = $login_user->fetch(PDO::FETCH_OBJ);

        // password verification
        if($login_user->rowCount() > 0) {
            if(password_verify($data["password"], $fetch["password"])) {
                // start session vars
                
                header("location: ".$path."");
            }
        }
    }

    // startin session
    public function startingSession() {
        session_start();
    }

    // validate session
    public function validateSession($path) {
        if(isset($_SESSION['id'])) {
            header("location: ".$path."");
        }
    }
}

