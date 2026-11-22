<?php session_start();
    include("connection.php");

    if(isset($_GET['logout'])) {
        session_destroy();
        header("location:index.php");
    }
?>