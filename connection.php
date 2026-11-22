<?php
    $conn = new mysqli("localhost", "root", "", "my_school_php");

    if($conn->connect_error) {
        die('Connect error :' .$conn->connect_error);
    }
?>