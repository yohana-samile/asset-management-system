<?php
    require_once('include/db.php');
    if(isset($_POST['login'])){
        $userID = $_POST['email'];
        $password = $_POST['password'];
        $lastLogin = date("Y-m-d H:i:s"); 

        $getUserDetails = $conn->query("SELECT * FROM employee WHERE email = '$userID' AND password = '$password' LIMIT 1");
        $checkRows = mysqli_num_rows($getUserDetails);
        if(mysqli_num_rows($getUserDetails) > 0){
            $_SESSION['userData'] = $checkRows = mysqli_fetch_array($getUserDetails);
            if($_SESSION['userData']['role'] == 2){
                $conn->query("INSERT INTO system_logs VALUES(NULL, 'login', '$lastLogin', {$_SESSION['userData']['employee_id']}) ");
                header('location:employee/');
            }
        }
        else{
            $getUserDetails = $conn->query("SELECT * FROM super_admin WHERE email = '$userID' AND password = '$password' LIMIT 1");
            if(mysqli_num_rows($getUserDetails) > 0){
               $checkRows = mysqli_fetch_array($getUserDetails);
                $_SESSION['userData'] = $checkRows;
                if($_SESSION['userData']['role'] == 1){
                    $conn->query("INSERT INTO system_logs VALUES(NULL, 'login', '$lastLogin', {$_SESSION['userData']['admin_id']}) ");
                    header('location:admin/');
                }
            }
            else{
                $_SESSION['error'] = "Wrong Username Or Password";
                header('location:index.php?key=error');
            }
        }
    }
