<?php
    require_once('../include/db.php');
    if (isset($_POST['denie'])) {
        $assetToBeTaken = $_GET['assetToBeTaken'];
        $requestStatusResult = "denied";
        
        
        
        $requestStatus =  $conn->query("UPDATE `assetissued` SET `requestStatusResult` = '$requestStatusResult' WHERE `assetissued`.`assetBorrowed` = '$assetToBeTaken' ");
        if($requestStatus){
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Deny Asset Request', date('Y-m-d H:i:s'), {$_SESSION['userData']['admin_id']}) ");
            $_SESSION['success'] = "Request Denied To Asset";
            header('location:assetIssued.php?key=success');
        }
        else{            
            $_SESSION['error'] = "Fail To Denie Request, try Agein";
            header('location:assetIssued.php?key=error');
        }
    }
    elseif(isset($_POST['accept'])){
        $assetToBeTaken = $_GET['assetToBeTaken'];
        $requestStatusResult = $_POST['requestStatusResult'];

        
        $getAssetQt = $conn->query("SELECT * FROM asset_managed WHERE asset_id  = '$assetToBeTaken' ");
        $assetQt = mysqli_fetch_array($getAssetQt);
        echo $quantityDecrementOne = $assetQt['quantity'] - 1;
        
        $conn->query("UPDATE `assetissued` SET `requestStatusResult` = '$requestStatusResult' WHERE `assetissued`.`assetBorrowed` = '$assetToBeTaken' ");
        $requestStatus = $conn->query("UPDATE `asset_managed` SET `quantity` = '$quantityDecrementOne' where `asset_id` = '$assetToBeTaken' ");
        if($requestStatus){
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Accept Asset Request', date('Y-m-d H:i:s'), {$_SESSION['userData']['admin_id']}) ");
            echo $_SESSION['success'] = "Request Accepted To Asset";
            header('location:assetIssued.php?key=success');
        }
        else{   
            $_SESSION['error'] = "Fail To Accept Request, try Agein";
            header('location:assetIssued.php?key=error');
        }
    }
?>