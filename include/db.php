<?php
    $conn = mysqli_connect("127.0.0.1", "root", "", "ams");
    session_start();
    if(!$conn){
        echo mysqli_error($conn) . "Connection Refused";
    }
?>