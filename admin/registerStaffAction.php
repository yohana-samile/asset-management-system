<?php
    require_once('../include/db.php');
    if(isset($_POST['register'])){
        $firstName = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $role = $_POST['role'];
        $registered_by = $_POST['registered_by'];
        $whichDepartment = $_POST['whichDepartment'];
        $password = $_POST['password'];
        $date_registered = $_POST['date_registered'];
        $date_registered = date("Y-m-d H:i:s"); 
        $date_modified = $_POST['date_modified'];
        $date_modified = '0000-00-00 00:00:00';

        $registerStaff = $conn->query("INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `email`, `gender`, `role`, `registered_by`, `whichDepartment`, `password`, `date_registered`, `date_modified`)
        VALUES
            (null, '$firstName', '$last_name', '$email', '$gender', '$role', '$registered_by', '$whichDepartment', '$password', '$date_registered', '$date_modified') ");
        if($registerStaff){
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Register Employee', '$date_registered', {$_SESSION['userData']['admin_id']}) ");
            $_SESSION['success'] = "New Staff Registered";
            header('location:employee.php?key=success');
        }
        else{    
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'Fail To Register Employee', '$date_registered', {$_SESSION['userData']['admin_id']}) ");
            $_SESSION['error'] = "Fail In Registration, Try Again";
            header('location:employee.php?key=error');
        }
    }
?>