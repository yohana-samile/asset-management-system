<?php
    require_once('include/db.php');
    $logoutTime = date("Y-m-d H-i-s");
    if($_SESSION['userData']['role'] == 2):
        $conn->query("INSERT INTO system_logs VALUES(NULL, 'logout', '$logoutTime', {$_SESSION['userData']['employee_id']}) ");
        else:
            $conn->query("INSERT INTO system_logs VALUES(NULL, 'logout', '$logoutTime', {$_SESSION['userData']['admin_id']}) ");
    endif;
    session_unset();
    session_destroy();
    header('location:index.php');
    die;
?>