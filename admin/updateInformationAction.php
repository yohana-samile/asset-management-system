<?php
    //for asset 
    require_once('../include/db.php');
    if (isset($_POST['updateAsset'])) {
        $asset_id = $_GET['key'];
        $asset_name = $_POST['asset_name'];
        $asset_discription = $_POST['asset_discription'];
        $brande_name = $_POST['brande_name'];
        $whichCategory = $_POST['whichCategory'];
        $time = date('Y-m-d H:i:s');

        $requestStatus = $conn->query("UPDATE `asset_managed` SET `asset_name` = '$asset_name', `asset_discription` = '$asset_discription' , `brande_name` = '$brande_name', `whichCategory` = '$whichCategory', `date_modified` = 	'$time' WHERE `asset_managed`.`asset_id` = '$asset_id' ");
        if($requestStatus){
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Edit Asset', date('Y-m-d H:i:s'), {$_SESSION['userData']['admin_id']}) ");
            $_SESSION['success'] = "Asset Modified";
            header('location:assetItem.php?key=success');
        }
        else{            
            $_SESSION['error'] = "Fail, try Agein";
            header('location:assetItem.php?key=error');
        }
    }
    else if(isset($_POST['deleteAsset'])){
        $deleteAsset = $conn->query("DELETE FROM `asset_managed` WHERE `asset_managed`.`asset_id` = {$_GET['key']}");
        if($deleteAsset){
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Delete Asset', date('Y-m-d H:i:s'), {$_SESSION['userData']['admin_id']}) ");
            $_SESSION['success'] = "Asset Deleted";
            header('location:assetItem.php?key=success');
        }
    }

    //for category 
    if (isset($_POST['editCategory'])) {
        $categoryId  = $_GET['key'];
        $category_name = $_POST['category_name'];
        $time = date('Y-m-d H:i:s');

        $requestStatus = $conn->query("UPDATE `assetcategory` SET `category_name` = '$category_name', `time_modified` = '$time' WHERE `assetcategory`.`categoryId` = '$categoryId' ");
        if($requestStatus){
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Edit Category', date('Y-m-d H:i:s'), {$_SESSION['userData']['admin_id']}) ");
            $_SESSION['success'] = "Category Modified";
            header('location:assetCategory.php?key=success');
        }
        else{            
            $_SESSION['error'] = "Fail, try Agein";
            header('location:assetCategory.php?key=error');
        }
    }
    else if(isset($_POST['deleteCategory'])){
        $deleteAsset = $conn->query("DELETE FROM `assetcategory` WHERE `assetcategory`.`categoryId` = {$_GET['categoryKey']}");
        if($deleteAsset){
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Delete Category', date('Y-m-d H:i:s'), {$_SESSION['userData']['admin_id']}) ");
            $_SESSION['success'] = "Category Deleted";
            header('location:assetCategory.php?key=success');
        }
    }

    //for depertments 
    if (isset($_POST['editDepartment'])) {
        $departmentId  = $_GET['departmenKey'];
        $departmentName = $_POST['departmentName'];
        $time = date('Y-m-d H:i:s');

        $requestStatus = $conn->query("UPDATE `department` SET `departmentName` = '$departmentName', `timeModified` = '$time' WHERE `department`.`departmentId` = '$departmentId' ");
        if($requestStatus){
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Edit Department Category', date('Y-m-d H:i:s'), {$_SESSION['userData']['admin_id']}) ");
            $_SESSION['success'] = "Department Modified";
            header('location:department.php?key=success');
        }
        else{            
            $_SESSION['error'] = "Fail, try Agein";
            header('location:department.php?key=error');
        }
    }
    else if(isset($_POST['deleteDepartment'])){
        $deleteAsset = $conn->query("DELETE FROM `department` WHERE `department`.`departmentId` = {$_GET['departmenKey']}");
        if($deleteAsset){
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Delete Department', date('Y-m-d H:i:s'), {$_SESSION['userData']['admin_id']}) ");
            $_SESSION['success'] = "Department Deleted";
            header('location:department.php?key=success');
        }
    }

    //for Employees 
    if (isset($_POST['editEmployee'])) {
        $employee_id   = $_GET['employee_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $whichDepartment = $_POST['whichDepartment'];
        $time = date('Y-m-d H:i:s');
 
         $requestStatus = $conn->query("UPDATE `employee` SET `first_name` = '$first_name', `last_name` = '$last_name', `email` = '$email', `gender` = '$gender', `whichDepartment` = '$whichDepartment', `date_modified` = '$time' WHERE `employee`.`employee_id` = '$employee_id' ");
         if($requestStatus){
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Edit Employee Info', date('Y-m-d H:i:s'), {$_SESSION['userData']['admin_id']}) ");
             $_SESSION['success'] = "employee Modified";
             header('location:employee.php?key=success');
         }
         else{            
             $_SESSION['error'] = "Fail, try Agein";
             header('location:employee.php?key=error');
         }
     }
     else if(isset($_POST['deleteEmployee'])){
         $deleteAsset = $conn->query("DELETE FROM `employee` WHERE `employee`.`employee_id` = {$_GET['employee_id']}");
         if($deleteAsset){
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Delete Employee', date('Y-m-d H:i:s'), {$_SESSION['userData']['admin_id']}) ");
             $_SESSION['success'] = "Employee Deleted";
             header('location:employee.php?key=success');
         }
     }
?>