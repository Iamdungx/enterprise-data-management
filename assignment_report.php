<?php
    session_start();
    require 'connect_database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Báo cáo công việc</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <?php
            if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager')) {
                echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HR Manager</div>
            </a>';
            }
            else {
                echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" href="employee_dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HR Manager</div>
            </a>';
            }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                    <?php
            if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager')) {
                echo '<a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Bảng điều khiển</span></a>';
            }
            else {
                echo '<a class="nav-link" href="profile.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Bảng điều khiển</span></a>';
            }
            ?>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Chức năng
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php
            if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'President' || $_SESSION['role'] == 'Vice President' || $_SESSION['role'] == 'manager')) {
                echo "<li class='nav-item'>
                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseTwo'
                    aria-expanded='true' aria-controls='collapseTwo'>
                    <i class='fas fa-fw fa-cog'></i>
                    <span>Quản lí nhân viên</span>
                </a>
                <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
                    <div class='bg-white py-2 collapse-inner rounded'>
                        <h6 class='collapse-header'>Các chức năng:</h6>
                        <a class='collapse-item' href='employee_information.php'>Quản lí nhân viên</a>
                        <a class='collapse-item' href='cards.html'>Cards</a>
                    </div>
                </div>
            </li>

            <li class='nav-item'>
                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseFour'
                    aria-expanded='true' aria-controls='collapseFour'>
                    <i class='fas fa-fw fa-cog'></i>
                    <span>Phân Công</span>
                </a>
                <div id='collapseFour' class='collapse' aria-labelledby='headingFour' data-parent='#accordionSidebar'>
                    <div class='bg-white py-2 collapse-inner rounded'>
                        <h6 class='collapse-header'>Phân công:</h6>
                        <a class='collapse-item' href='assignment.php'>Quản lí nhiệm vụ</a>
                        <a class='collapse-item' href='add_assignment.php'>Phân công công việc</a>
                        <a class='collapse-item' href='assignment_report.php'>Thống kê công việc</a>
                    </div>
                </div>
            </li>
            <li class='nav-item'>
                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseThree' aria-expanded='true' aria-controls='collapseThree'>
                    <i class='fas fa-fw fa-cog'></i>
                    <span>Quản lí lương</span>
                </a>
                <div id='collapseThree' class='collapse' aria-labelledby='headingThree' data-parent='#accordionSidebar'>
                    <div class='bg-white py-2 collapse-inner rounded'>
                        <h6 class='collapse-header'>Các chức năng:</h6>
                        <a class='collapse-item' href='payroll.php'>Quản lý lương</a>
                        <a class='collapse-item' href='cards.html'>Cards</a>
                    </div>
                </div>
            </li>";
            }
            else{
                echo "<li class='nav-item'>
                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseTwo'
                    aria-expanded='true' aria-controls='collapseTwo'>
                    <i class='fas fa-fw fa-cog'></i>
                    <span>Quản lí nhân viên</span>
                </a>
                <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
                    <div class='bg-white py-2 collapse-inner rounded'>
                        <h6 class='collapse-header'>Các chức năng:</h6>
                        <a class='collapse-item' href='employee_information.php'>Quản lí nhân viên</a>
                        <a class='collapse-item' href='cards.html'>Cards</a>
                    </div>
                </div>
            </li>

            <li class='nav-item'>
                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseFour'
                    aria-expanded='true' aria-controls='collapseFour'>
                    <i class='fas fa-fw fa-cog'></i>
                    <span>Phân Công</span>
                </a>
                <div id='collapseFour' class='collapse' aria-labelledby='headingFour' data-parent='#accordionSidebar'>
                    <div class='bg-white py-2 collapse-inner rounded'>
                        <h6 class='collapse-header'>Phân công:</h6>
                        <a class='collapse-item' href='assignment.php'>Công việc</a>
                    </div>
                </div>
            </li>
            <li class='nav-item'>
                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseThree' aria-expanded='true' aria-controls='collapseThree'>
                    <i class='fas fa-fw fa-cog'></i>
                    <span>Quản lí lương</span>
                </a>
                <div id='collapseThree' class='collapse' aria-labelledby='headingThree' data-parent='#accordionSidebar'>
                    <div class='bg-white py-2 collapse-inner rounded'>
                        <h6 class='collapse-header'>Các chức năng:</h6>
                        <a class='collapse-item' href='payroll.php'>Quản lý lương</a>
                        <a class='collapse-item' href='cards.html'>Cards</a>
                    </div>
                </div>
            </li>";
            }
            ?>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

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

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php

                                if (isset($_SESSION['nameaccount'])) {
                                        echo "<div>Chào: <span class='text-success'>" . $_SESSION['nameaccount'] . "</span></div>";
                                    } else {
                                        echo "<div class='text-danger'>Bạn chưa đăng nhập</div>";
                                    }

                                    if (isset($_SESSION['error'])) {
                                        echo 'Lỗi khi thiết lập session: ' . $_SESSION['error'];
                                    }
                                    ?>

                                </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Thông tin cá nhân
                                </a>
                                <a class="dropdown-item" href="attendance.php">
                                    <i class="fas fa-business-time fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Chấm công
                                </a>
                                
                                <?php
                                if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin' || $_SESSION['role'] == 'President') {
                                    echo '<a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>';
                                }
                                ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tiến độ công việc</h1>
                    <div>
                        <form action="" method="post">
                        <?php
                            require 'connect_database.php';
                            $user_id =  $_SESSION['nameaccount'];

                            function displayTableHeader() {
                                echo "
                                <div class='col-sm'>
                                    <div class='card shadow mb-4'>
                                        <div class='card-header py-3'>
                                            <h6 class='m-0 font-weight-bold text-success'>Công việc chưa hoàn thành</h6>
                                        </div>    
                                        <div class='card-body'>
                                            <div class='table-responsive'>
                                                <table class='table table-bordered'>
                                                    <thead>
                                                        <tr> 
                                                            <th>Mã công việc</th>
                                                            <th>Mã nhân viên</th>
                                                            <th>Deadline</th>
                                                            <th>Tên công việc</th>
                                                            <th>Mô tả công việc</th>
                                                            <th>Trạng thái</th>
                                                            <th>Người giao</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                            }

                            function displayTableFooter($totalAssignments, $completedAssignments) {
                                $completionRate = ($totalAssignments > 0) ? round(($completedAssignments / $totalAssignments) * 100, 2) : 0;
                                echo "          </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class='card-footer' style='background-color: #ffffff; box-shadow: none;'>
                                            <div class='row'>
                                                <div class='col-sm-6'>
                                                    <div class='text-center font-weight-bold text-primary'>Tổng Số lượng công việc: <span class='text-secondary'>$totalAssignments</span></div>
                                                    <div class='text-center font-weight-bold text-success'>Số lượng công việc đã hoàn thành: <span class='text-secondary'>$completedAssignments</span></div>
                                                </div>
                                                <div class='col-sm-6'>
                                                    <div class='font-weight-bold'>Tỷ lệ hoàn thành: <span class='float-right'>" . $completionRate . " %</span></div>
                                                    <div class='progress'>
                                                        <div class='progress-bar bg-warning' role='progressbar' style='width: " . $completionRate . "%' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100'></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                            }

                            if($_SESSION['role'] == 'Vice President' && $_SESSION['role'] == 'manager'){
                                $sqlLeader = "SELECT assingment_id FROM `assignment` WHERE user_id = '$user_id' and status = 'Incomplete';";
                                $resultSqlLeader = $connect->query($sqlLeader);
                                if($resultSqlLeader->num_rows > 0){
                                    $totalAssignments = 0;
                                    $completedAssignments = 0;
                                    displayTableHeader();
                                    while ($rowLeader = $resultSqlLeader->fetch_assoc()){
                                        $assignmentIDLeaderString = $rowLeader['assingment_id'];
                                        // $assignmentIDLeaderString =  $assignmentIDLeader . '__';

                                        $sql = "SELECT * FROM `assignment` WHERE assingment_id like '$assignmentIDLeaderString' and status = 'Incomplete';";
                                        $result = $connect->query($sql);
                                        if($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                        <td>" . $row["assingment_id"] . "</td>
                                                        <td>" . $row["user_id"] . "</td>
                                                        <td>" . $row["deadline"] . "</td>
                                                        <td>" . $row["assignment_type"] . "</td>
                                                        <td>" . $row["details"] . "</td>
                                                        <td>" . $row["status"] . "</td>
                                                        <td>" . $row["leader"] . "</td>
                                                    </tr>";
                                            }

                                            $sqlCountAssignTotal = "SELECT  COUNT(*) as totalcount FROM `assignment` WHERE assingment_id like '$assignmentIDLeaderString';";
                                            $resultSqlCountAssignTotal = $connect->query($sqlCountAssignTotal);
                                            if($resultSqlCountAssignTotal->num_rows > 0){
                                                $rowTotal = $resultSqlCountAssignTotal->fetch_assoc();
                                                $countTotal = $rowTotal['totalcount']; 
                                                $totalAssignments += $countTotal;

                                                $sqlCountAssign = "SELECT  COUNT(*) as count FROM `assignment` WHERE assingment_id like '$assignmentIDLeaderString' and status = 'Completed';";
                                                $resultSqlCountAssign = $connect->query($sqlCountAssign);
                                                if($resultSqlCountAssign->num_rows > 0){
                                                    $row = $resultSqlCountAssign->fetch_assoc();
                                                    $count = $row['count']; 
                                                    $completedAssignments += $count;
                                                }
                                            }
                                        }
                                    }
                                    displayTableFooter($totalAssignments, $completedAssignments);
                                }
                            }
                            if($_SESSION['role'] == 'employee'){
                                $sqlLeader = "SELECT assingment_id FROM `assignment` WHERE user_id = '$user_id' and status = 'Incomplete';";
                                $resultSqlLeader = $connect->query($sqlLeader);
                                if($resultSqlLeader->num_rows > 0){
                                    $totalAssignments = 0;
                                    $completedAssignments = 0;
                                    displayTableHeader();
                                    while ($rowLeader = $resultSqlLeader->fetch_assoc()){
                                        $assignmentIDLeader = $rowLeader['assingment_id'];

                                        $sql = "SELECT * FROM `assignment` WHERE assingment_id = '$assignmentIDLeader' and status = 'Incomplete';";
                                        $result = $connect->query($sql);
                                        if($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                        <td>" . $row["assingment_id"] . "</td>
                                                        <td>" . $row["user_id"] . "</td>
                                                        <td>" . $row["deadline"] . "</td>
                                                        <td>" . $row["assignment_type"] . "</td>
                                                        <td>" . $row["details"] . "</td>
                                                        <td>" . $row["status"] . "</td>
                                                        <td>" . $row["leader"] . "</td>
                                                    </tr>";
                                            }

                                        }
                                    }
                                    $sqlCountAssignTotal = "SELECT  COUNT(*) as totalcount FROM `assignment` WHERE user_id = '$user_id';";
                                    $resultSqlCountAssignTotal = $connect->query($sqlCountAssignTotal);
                                    if($resultSqlCountAssignTotal->num_rows > 0){
                                        $rowTotal = $resultSqlCountAssignTotal->fetch_assoc();
                                        $countTotal = $rowTotal['totalcount']; 
                                        $totalAssignments += $countTotal;

                                        $sqlCountAssign = "SELECT  COUNT(*) as count FROM `assignment` WHERE status = 'Completed' and user_id = '$user_id';";
                                        $resultSqlCountAssign = $connect->query($sqlCountAssign);
                                        if($resultSqlCountAssign->num_rows > 0){
                                            $row = $resultSqlCountAssign->fetch_assoc();
                                            $count = $row['count']; 
                                            $completedAssignments += $count;
                                        }
                                    }
                                    displayTableFooter($totalAssignments, $completedAssignments);
                                }
                            }
                            else {
                                $sqlLeader = "SELECT * FROM `assignment` WHERE leader = '$user_id' and status = 'Incomplete';";
                                $resultSqlLeader = $connect->query($sqlLeader);
                                if($resultSqlLeader->num_rows > 0) {
                                    $totalAssignments = 0;
                                    $completedAssignments = 0;
                                    displayTableHeader();
                                    while ($row = $resultSqlLeader->fetch_assoc()) {
                                        echo "<tr>
                                                <td>" . $row["assingment_id"] . "</td>
                                                <td>" . $row["user_id"] . "</td>
                                                <td>" . $row["deadline"] . "</td>
                                                <td>" . $row["assignment_type"] . "</td>
                                                <td>" . $row["details"] . "</td>
                                                <td>" . $row["status"] . "</td>
                                                <td>" . $row["leader"] . "</td>
                                            </tr>";

                                        $assignmentIDLeader = $row['assingment_id'];
                                        $sql = "SELECT count(*) as count FROM `assignment` WHERE assingment_id like '%$assignmentIDLeader%'";
                                        $resultSql = $connect->query($sql);
                                        if($resultSql->num_rows > 0) {
                                            $rowTotal = $resultSql->fetch_assoc();
                                            $countTotal = $rowTotal['count'];
                                            $totalAssignments += $countTotal;

                                            $sqlCompleteAssign = "SELECT count(*) as countTotal FROM `assignment` WHERE assingment_id like '%$assignmentIDLeader%' and status = 'Completed';";
                                            $resultSqlCountAssign = $connect->query($sqlCompleteAssign);
                                            if($resultSqlCountAssign->num_rows > 0) {
                                                $rowTotal = $resultSqlCountAssign->fetch_assoc();
                                                $count = $rowTotal['countTotal'];
                                                $completedAssignments += $count;
                                            }
                                        }
                                    }
                                    displayTableFooter($totalAssignments, $completedAssignments);
                                }
                            }
                        ?>
                        </form>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        // table Cong viec da nhan
        $(document).ready(function() {
            var tableSettings = {
                "lengthMenu": [[1, 3, 5, -1], [1, 3, 5, "All"]],
            };

            // Initialize DataTable for both tables with common settings
            $('#congViecDaNhan').DataTable(tableSettings);
            $('#congViecDaGiao').DataTable(tableSettings);
        });
    </script>


</body>

</html>