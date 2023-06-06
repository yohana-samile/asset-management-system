<?php
    require_once('../include/db.php');
    if(isset($_POST['submit'])){
        // $asset = $_GET('asset');
        $issuedId = $_POST['issuedId'];
        $whoBorrow = $_POST['whoBorrow'];
        $assetBorrowed = $_POST['assetBorrowed'];
        $requestStatusResult = $_POST['requestStatusResult'];
        $assetQuantity = $_POST['assetQuantity'];
        $timeBorrowed = $_POST['timeBorrowed'];
        $timeBorrowed = date("Y-m-d H:i:s"); 
        $timeReturned = $_POST['timeReturned'];
        $timeReturned = '0000-00-00 00:00:00';

        $conn->query("UPDATE `assetissued` SET `whoBorrow` = '$whoBorrow', `assetBorrowed` = '$assetBorrowed', `requestStatusResult` = '$requestStatusResult', `assetQuantity` = '$assetQuantity', `timeBorrowed` = '$timeBorrowed' where `issuedId` = '$issuedId' ");
        $registerCategory = $conn->query("INSERT INTO system_logs VALUES(NULL, 'Borrow Asset', '$timeBorrowed', '$whoBorrow') ");
        if($registerCategory){
            $_SESSION['success'] = "Asset Issued";
            header('location:issueAsset.php?key=success');
        }
        else{  
           $_SESSION['error'] = "Fail In Registration, Try Again";
           header('location:issueAsset.php?key=error');
        }
    }
    else if(isset($_POST['return'])){
        $issuedId = $_POST['issuedId'];
        $requestStatusResult = $_POST['requestStatusResult'];
        $assetQuantity = $_POST['assetQuantity'];
        $timeReturned = $_POST['timeReturned'];
        $whoReturn = $_POST['whoReturn'];
        $timeReturned = date("Y-m-d H:i:s"); 

        $getAssetQt = $conn->query("SELECT * FROM asset_managed WHERE asset_id  = {$_GET['assetId']} ");
        $assetQt = mysqli_fetch_array($getAssetQt);
        $quantityDecrementOne = $assetQt['quantity'] + 1;
        $conn->query("UPDATE assetissued set `requestStatusResult` = '$requestStatusResult', `timeReturned` = '$timeReturned', `assetQuantity` = '$assetQuantity' where `issuedId` = '$issuedId' ");
        $conn->query("UPDATE `asset_managed` SET `quantity` = '$quantityDecrementOne' where `asset_id` = {$_GET['assetId']} ");
        $registerCategory = $conn->query("INSERT INTO system_logs VALUES(NULL, 'Return Asset', '$timeReturned', '$whoReturn') ");
        if($registerCategory){
            $_SESSION['success'] = "Asset Returned";
            header('location:issueAsset.php?key=success');
        }
        else{  
           $_SESSION['error'] = "Fail To Return, Try Again";
           header('location:issueAsset.php?key=error');
        }
    }
?>