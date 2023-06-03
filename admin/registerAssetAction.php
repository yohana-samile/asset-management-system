<?php
    require_once('../include/db.php');
    if(isset($_POST['register'])){
        $asset_name = $_POST['asset_name'];
        $asset_discription = $_POST['asset_discription'];
        $brande_name = $_POST['brande_name'];
        $quantity = $_POST['quantity'];
        $registered_by = $_POST['registered_by'];
        $whichCategory = $_POST['whichCategory'];
        $time_added = $_POST['date_registered'];
        $time_added = date("Y-m-d H:i:s"); 
        $date_modified = $_POST['date_modified'];
        $date_modified = '0000-00-00 00:00:00';

        $conn->query("INSERT INTO `asset_managed` VALUES (null, '$asset_name', '$asset_discription', '$brande_name', '$quantity', '-', '-', '-', '$registered_by', '$whichCategory', '$time_added', '$date_modified') ");
        $check = $conn->query("SELECT * FROM asset_managed order by date_registered desc limit 1 ");
        if(mysqli_num_rows($check)){
            $result = mysqli_fetch_array($check);
            $assetBorrowed = $result['asset_id'];
            $quantity = $result['quantity'];
            $registerCategory = $conn->query("INSERT INTO `assetissued` VALUES (null, 0, '$assetBorrowed', '$quantity', 'not taken', '0000-00-00 00:00:00', '0000-00-00 00:00:00') ");
            if($registerCategory){
                $conn->query("INSERT INTO system_logs VALUES(NULL, 'Register New Asset', '$time_added', {$_SESSION['userData']['admin_id']}) ");
                $_SESSION['success'] = "New Asset Added";
                header('location:assetItem.php?key=success');
            }
            else{  
                $conn->query("INSERT INTO system_logs VALUES(NULL, 'Fail To Register Asset', '$time_added', {$_SESSION['userData']['admin_id']}) ");
                $_SESSION['error'] = "Fail In Registration, Try Again";
                header('location:assetItem.php?key=error');
            }
        }
    }
    elseif(isset($_POST['submitChoosenCategory'])){
        $whichCategory = $_POST['whichCategory'];
        if ($whichCategory != 'computer') {
            header('location:registerAsset.php');
        }
        else{
            header('location:registerComputerAsset.php');
        }
    }
    elseif(isset($_POST['registerComputerAsset'])){
        $asset_name = $_POST['asset_name'];
        $asset_discription = $_POST['asset_discription'];
        $brande_name = $_POST['brande_name'];
        $quantity = $_POST['quantity'];
        $ramSize = $_POST['ramSize'];
        $diskSize = $_POST['diskSize'];
        $proccessorSpeed = $_POST['proccessorSpeed'];
        $registered_by = $_POST['registered_by'];
        $whichCategory = $_POST['whichCategory'];
        $time_added = $_POST['date_registered'];
        $time_added = date("Y-m-d H:i:s"); 
        $date_modified = $_POST['date_modified'];
        $date_modified = '0000-00-00 00:00:00';

        $conn->query("INSERT INTO `asset_managed` VALUES (null, '$asset_name', '$asset_discription', '$brande_name', '$quantity', '$ramSize', '$diskSize', '$proccessorSpeed', '$registered_by', '$whichCategory', '$time_added', '$date_modified') ");
        $check = $conn->query("SELECT * FROM asset_managed order by date_registered desc limit 1 ");
        if(mysqli_num_rows($check)){
            $result = mysqli_fetch_array($check);
            $assetBorrowed = $result['asset_id'];
            $quantity = $result['quantity'];
            $registerCategory = $conn->query("INSERT INTO `assetissued` VALUES (null, 0, '$assetBorrowed', '$quantity', 'not taken', '0000-00-00 00:00:00', '0000-00-00 00:00:00') ");
            if($registerCategory){
                $conn->query("INSERT INTO system_logs VALUES(NULL, 'Register New Asset', '$time_added', {$_SESSION['userData']['admin_id']}) ");
                $_SESSION['success'] = "New Asset Added";
                header('location:assetItem.php?key=success');
            }
            else{  
                $conn->query("INSERT INTO system_logs VALUES(NULL, 'Fail To Register Asset', '$time_added', {$_SESSION['userData']['admin_id']}) ");
                $_SESSION['error'] = "Fail In Registration, Try Again";
                header('location:assetItem.php?key=error');
            }
        }
    }
?>