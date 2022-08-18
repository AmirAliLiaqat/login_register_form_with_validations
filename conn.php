<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_details_form";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    if(!$conn) {
        die("Connection Failed" . mysqli_conncet_error());
    }
?>