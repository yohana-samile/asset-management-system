<?php
    require_once('../include/db.php');
    if(isset($_POST['submit'])){
        $whoSend = $_POST['whoSend'];
        $coment = $_POST['userComent'];
        $timeSent = $_POST['timeSent'];
        $timeSent = date("Y-m-d H:i:s"); 

        $conn->query("INSERT INTO useropinion VALUES(NULL, '$whoSend', '$coment', '$timeSent') ");
        $registerComent = $conn->query("INSERT INTO system_logs VALUES(NULL, '$coment', '$timeSent', '$whoSend') ");

        if($registerComent){
            $_SESSION['success'] = "You Coment Sent";
            header('location:issueAsset.php?key=success');
        }
        else{ 
           $_SESSION['error'] = "Fail., Try Again";
           header('location:issueAsset.php?key=error');
        }
    }
?>