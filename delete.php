<?php
    require 'conn.php';

    $id = $_GET['id'];

    if(isset($_GET['id'])) {
        $sql = "DELETE FROM `user_details` WHERE id = $id";
        mysqli_query($conn, $sql);

        header('location: admin.php');
    }
?>