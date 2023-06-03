<?php
    require_once('include/db.php');
    require_once('include/messages.php');
    if(isset($_POST['recoverPass'])){
        $email = $_POST['emailID'];
        $oldPass = $_POST['password'];
        $confPass = $_POST['confPass'];

        $getDetails = $conn->query("SELECT * FROM employee WHERE email = '$email' LIMIT 1");
        if(mysqli_num_rows($getDetails) > 0){
            $result = mysqli_fetch_array($getDetails);
            if($oldPass != $confPass){
                $_SESSION['fail'] = "Password Do Not Match";
                header('location:forgetPassword.php');
            }
            else{
                $updatePass = $conn->query("UPDATE employee SET password = '$confPass' WHERE email = '$email' ");
                if($updatePass){
                    $_SESSION['success'] = "Password Rovocered, Now You Can Login";
                    header('location:index.php');
                }
            }
        }
    }
?>