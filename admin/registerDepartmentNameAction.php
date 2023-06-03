<?php
    require_once('../include/db.php');
    if(isset($_POST['register'])){
        $departmentName = $_POST['departmentName'];
        $addedBy = $_POST['addedBy'];
        $time_added = $_POST['timeAdded'];
        $time_added = date("Y-m-d H:i:s"); 
        $date_modified = $_POST['timeModified'];
        $date_modified = '0000-00-00 00:00:00';

        $registerDepartment = $conn->query("INSERT INTO `department` VALUES (null, '$departmentName', '$addedBy', '$time_added', '$date_modified') ");
        if($registerDepartment){
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Register department', '$time_added', {$_SESSION['userData']['admin_id']}) ");
            $_SESSION['success'] = "New department Registered";
            header('location:department.php?key=success');
        }
        else{    
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Fail To Register department', '$time_added', {$_SESSION['userData']['admin_id']}) ");
            $_SESSION['error'] = "Fail In Registration, Try Again";
            header('location:department.php?key=error');
        }
    }
?>