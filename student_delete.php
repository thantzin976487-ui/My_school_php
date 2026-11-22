<?php
    include("connection.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $conn->query("DELETE FROM student_list WHERE id=$id");
        header("location:student_list.php");
    }
?>