<?php
    require_once('../include/db.php');
    if(isset($_POST['register'])){
        $category_name = $_POST['category_name'];
        $addedBy = $_POST['addedBy'];
        $time_added = $_POST['time_added'];
        $time_added = date("Y-m-d H:i:s"); 
        $date_modified = $_POST['date_modified'];
        $date_modified = '0000-00-00 00:00:00';

        $registerCategory = $conn->query("INSERT INTO `assetcategory` VALUES (null, '$category_name', '$addedBy', '$time_added', '$date_modified') ");
        if($registerCategory){
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Register Category', '$time_added', {$_SESSION['userData']['admin_id']}) ");
            $_SESSION['success'] = "New Category Registered";
            header('location:assetCategory.php?key=success');
        }
        else{            
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Fail To Register Category', '$time_added', {$_SESSION['userData']['admin_id']}) ");
            $_SESSION['error'] = "Fail In Registration, Try Again";
            header('location:assetCategory.php?key=error');
        }
    }
?>