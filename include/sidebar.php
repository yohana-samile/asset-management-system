<?php require_once('resource.php'); 
    if(empty($_SESSION['userData'])){
        header('location:../index.php');
    }
?>
<?php  $title = "Dashboard"; ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Asset management system">
    <meta name="author" content="Asset management system">
    <link rel="icon" href="../icon.png" type="image/png">
    <title>AMS | <?PHP echo $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../asset/css/style.css" rel="stylesheet">

     <!-- Custom styles for this page -->
    <link href="../asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        .bg {
            background-color: #f2f2f2;
        }
        .vms-btn {
            background-color: #024e5a;
            color: whitesmoke;
            transition: ease-in 0.4s all;
        }
        .vms-btn:hover {
            background-color: #024e5a;
            color: whitesmoke;
        }

        .vms-btn:focus {
            background-color: #024e5a;
            color: whitesmoke;
        }

        .btn-success {
            background-color: #024e5a;
        }

        .kvm-bg {
            background-color: #f2f2f2;
        }

        .kvm-color {
            color:##f2f2f2;
        }

        #search_date, #search_exipendture_type {
            cursor: pointer;
        }
        #search_date, #search_exipendture_type:hover {
            color: #04AA6D;
        }

        .form-control{
            border: none;
            border-radius: 0px;
            margin-top: 10px;
            margin-bottom: 20px;
            border-bottom: 1px solid #024e5a;
        }
        .form-control: focus{
            outline: none;
            box-shadow: none;
            border: none;
            border-radius: 0px;
            margin-top: 13px;
            margin-bottom: 20px;
            border-bottom: 1px solid #024e5a;
        }

        /*checkbox customization*/
             .checkbox input {
            cursor: pointer;
        }

        .checkbox input[type='checkbox'] {
            display: none;
        }

        .checkbox span {
            background-color: #fff;
            padding: 10px 30px;
            color: #024e5a;
            border-radius: 30px;
            position: relative;
            display: inline-block;
            font-size: 16px;
            user-select: none;
            overflow: hidden;
            transition: 0.5s all;
            border: 1px solid #024e5a;
        }

        .checkbox span:hover {
            background-color: #024e5a;
            padding: 10px 30px;
            color: #fff;
            border-radius: 30px;
            position: relative;
            display: inline-block;
            font-size: 16px;
            user-select: none;
            overflow: hidden;
        }

        .checkbox input[type='checkbox']:checked ~ span {
            background-color: #024e5a;
            box-shadow: 0 2px 10px #024e5a;
            color: #fff;
        }
        /*end checkbox customization*/

    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav kvm-bg sidebar sidebar-primary accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="../images/default.png" alt="AMS" style="width: 70px;">
                </div>
            </a>
            <div class="text-center text-dark">
                <p>User Type</p>
                <?php
                    if($_SESSION['userData']['role'] == 1){ ?>
                        <p>System Admin</p>
                    <?php }
                    else{ ?>
                        <p>Empoloyee Staff</p>
                <?php } ?>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            
            <?php
                if($_SESSION['userData']['role'] == 1){ ?>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item active">
                    <a class="nav-link" href="assetIssued.php">
                        <i class="fa fa-caret-square-o-down"></i>
                        <span>Asset Issued</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <li class="nav-item active">
                    <a class="nav-link" href="assetItem.php">
                        <i class="fa fa-caret-square-o-down"></i>
                        <span>Asset Item</span></a>
                </li>
                <!-- divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <li class="nav-item active">
                    <a class="nav-link" href="assetCategory.php">
                        <i class="fa fa-caret-square-o-down"></i>
                        <span>Asset Category</span></a>
                </li>
                <!-- divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item active">
                    <a class="nav-link" href="department.php">
                        <i class="fa fa-caret-square-o-down"></i>
                        <span>Depertment</span></a>
                </li>

                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item active">
                    <a class="nav-link" href="employee.php">
                        <i class="fas fa-users"></i>
                        <span>Amployee Staff</span></a>
                </li>
                <!-- Divider -->
            <?php }
            else{ ?>
                <!-- divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item active">
                    <a class="nav-link" href="issueAsset.php">
                        <i class="fa fa-caret-square-o-down"></i>
                        <span>Issue Asset</span></a>
                </li>
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#assetCategory"
                        aria-expanded="true" aria-controls="assetCategory">
                        <i class="fa fa-caret-square-o-down "></i>
                        <span> Category Asset </span>
                    </a>
                    <div id="assetCategory" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">                            
                            <h6 class="collapse-header">Choose Category:</h6>
                            <?php
                                $new_category_record = $conn->query("SELECT * FROM `assetcategory` ");
                                $get_category_result = mysqli_num_rows($new_category_record);
                                while($get_category_result = mysqli_fetch_array($new_category_record)):
                                    if($get_category_result > 0): ?>
                                        <a class="collapse-item" href="categoryId.php?userCategory=<?php echo $get_category_result['categoryId']; ?>"> 
                                            <i class="fa fa-caret-square-o-down text-primary"></i> <?php echo $get_category_result['category_name']; ?>
                                        </a>
                            <?php endif; endwhile;?>
                        </div>
                    </div>
                </li>
            <?php } ?>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#settings"
                    aria-expanded="true" aria-controls="Component">
                    <i class="fa fa-cog "></i>
                    <span> System Settings </span>
                </a>
                <div id="settings" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <h6 class="collapse-header">System Settings:</h6>
                        <a class="collapse-item" href="systemLogs.php"> 
                            <i class="fa fa-cog text-primary"></i> System Logs
                        </a> 
                        <a class="collapse-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                            <i class="fa fa-sign-out text-primary"></i> Log Me Out
                        </a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0 text-primary" id="sidebarToggle" style="background-color: white;"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column bg-white">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <p class="text-capitalize">&#128075;<?php echo $_SESSION['userData']['first_name'] . " ". $_SESSION['userData']['last_name']; ?></p>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                              
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="../images/default.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                                    Logout
                                    <i class="fas fa-sign-out-alt float-right fa-sm fa-fw mr-2 text-gray-400"></i>
                                </a>
                                <?php if($_SESSION['userData']['role'] == 1): ?>
                                    <a class="dropdown-item" href="userComent.php">
                                        Coment<i class="fas fa-bell float-right text-danger fa-sm fa-fw mr-2">1+</i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    