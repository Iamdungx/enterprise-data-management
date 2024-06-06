<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

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
                echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
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
                    <span>Quản lý nhân viên</span>
                </a>
                <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
                    <div class='bg-white py-2 collapse-inner rounded'>
                        <h6 class='collapse-header'>Các chức năng:</h6>
                        <a class='collapse-item' href='employee_information.php'>Quản lý nhân viên</a>
                        <a class='collapse-item' href='contract.php'>Hợp đồng</a>
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
                    </div>
                </div>
            </li>";
            }
            else{
                echo "
            <li class='nav-item'>
                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseFour'
                    aria-expanded='true' aria-controls='collapseFour'>
                    <i class='fas fa-fw fa-cog'></i>
                    <span>Công việc</span>
                </a>
                <div id='collapseFour' class='collapse' aria-labelledby='headingFour' data-parent='#accordionSidebar'>
                    <div class='bg-white py-2 collapse-inner rounded'>
                        <a class='collapse-item' href='assignment.php'>Công việc</a>
                        <a class='collapse-item' href='assignment_report.php'>Báo Cáo Nhiệm Vụ</a>
                    </div>
                </div>
            </li>
            <li class='nav-item'>
                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseThree' aria-expanded='true' aria-controls='collapseThree'>
                    <i class='fas fa-fw fa-cog'></i>
                    <span>Thông tin lương</span>
                </a>
                <div id='collapseThree' class='collapse' aria-labelledby='headingThree' data-parent='#accordionSidebar'>
                    <div class='bg-white py-2 collapse-inner rounded'>
                        <a class='collapse-item' href='payroll.php'>Thông tin lương</a>
                    </div>
                </div>
            </li>";
            }
            ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Messages -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    
                                    <?php
                                        // Debug thông tin session
                                        // echo "Session Status: " . session_status() . "<br>";
                                        // echo "Session ID: " . session_id() . "<br>";
                                        // echo "Session Nameaccount: " . (isset($_SESSION['nameaccount']) ? $_SESSION['nameaccount'] : 'Không có session') . "<br>";

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bảng thông tin cá nhân</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Thông tin nhân viên -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header-->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Thông tin cá nhân</h6>
                                </div>
                            <!-- Card Body -->
                                <!-- Bảng thông tin cá nhân -->            
                                <?php
                                require 'connect_database.php';
                                mysqli_set_charset($connect, 'UTF8');

                                $user_id = $_SESSION['nameaccount'];
                                $sqlSelectFromID = "SELECT * FROM user_data WHERE user_id='$user_id'";
                                $resultSelectFromID = $connect->query($sqlSelectFromID);

                                if($resultSelectFromID->num_rows > 0) {
                                    while($rowSelectFromID = $resultSelectFromID->fetch_assoc()) {

                                    echo "<div class='card-body'>
                                        <div class='input-group mb-3'>
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text' id='basic-addon2'>Giới tính</span>
                                            </div>  
                                            <input type='text' class='border-left-danger form-control' value='" . $rowSelectFromID['gender']."' disabled>
                                        </div>
                                        <div class='input-group mb-3'>
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text' id='basic-addon2'>Địa chỉ</span>
                                            </div>  
                                            <input type='text' class='border-left-danger form-control' value='" . $rowSelectFromID['address']."' disabled>
                                        </div>
                                        <div class='input-group mb-3'>
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text' id='basic-addon2'>Số điện thoại</span>
                                            </div>  
                                            <input type='tel' class='border-left-danger form-control' value='" . $rowSelectFromID['phone']."' disabled>
                                        </div>
                                        <div class='input-group mb-3'>
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text' id='basic-addon2'>Ngày sinh</span>
                                            </div>  
                                            <input type='date' class='border-left-danger form-control' value='" . $rowSelectFromID['date_of_birth']."' disabled>
                                        </div>
                                        <div class='input-group mb-3'>
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text' id='basic-addon2'>Email</span>
                                            </div>  
                                            <input type='text' class='border-left-danger form-control' aria-describedby='basic-addon2' value='" . $rowSelectFromID['email']."' disabled>
                                        </div>
                                        <div class='input-group mb-3'>
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text' id='basic-addon2'>Ngày vào công ty</span>
                                            </div>  
                                            <input type='date' class='border-left-danger form-control' value='" . $rowSelectFromID['hire_date']. "' disabled>
                                        </div>
                                        <div class='input-group mb-3'>
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text' id='basic-addon2'>Bộ phận</span>
                                            </div>  
                                            <input type='text' class='border-left-danger form-control' value='" . $rowSelectFromID['department']."' disabled>
                                        </div>
                                        <div class='input-group mb-3'>
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text' id='basic-addon2'>Vị trí</span>
                                            </div>  
                                            <input type='text' class='border-left-danger form-control' value='".$rowSelectFromID["position"]."' disabled>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <div class='col-xl-4 col-lg-5'> 
                            <div class='card shadow mb-4'>
                                <!-- Card Header - Dropdown -->
                                <div class='card-header py-3 d-flex flex-row align-items-center justify-content-between'>
                                    <h6 class='m-0 font-weight-bold text-primary'>Ảnh đại diện</h6>
                                    <div class='dropdown no-arrow'>
                                        <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink'
                                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        </a>
                                    </div>
                                </div>
                                <!-- Card Body -->";
                                $sqlImage = "SELECT user_image FROM user_data WHERE user_id='$user_id'";
                                $result = $connect->query($sqlImage);

                                if($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $user_image = $row["user_image"];
                                }
                            
                                echo "<div class='image'>";
                                if(isset($user_image) && !empty($user_image)) {
                                    echo '<img class="avatar-user" src="data:image/jpeg;base64,' . base64_encode($user_image) . '" alt="User Image" style="width: 100%; height: 100%; object-fit: cover;">';                                
                                } else {
                                        echo '<img class="no-image" src="./img/no-picture-available-icon.png" alt="NO IMAGE" style="width: 100%; height: 100%; object-fit: cover;">';
                                    }
                                echo" <div class='card-footer'>
                                    <ul class='list-group list-group-flush'>
                                        <li class='list-group-item'>Họ: <span class='text-info'>".$rowSelectFromID["fisrt_name"]."</span></li>
                                        <li class='list-group-item'>Tên: <span class='text-info'>".$rowSelectFromID["last_name"]."</span></li>
                                    </ul>
                                </div>";
                                    }
                                };
                                ?>
                            </div>
                        </div>
                   
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-5 mb-4">
                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Trình độ học vấn</h6>
                                </div>
                                <div class="card-body">
                                    <?php
                                        $user_id = $_SESSION['nameaccount'];
                                        $sqlEmployeeInfo = "SELECT * FROM employee_profile WHERE user_id = '$user_id'";

                                        $resultEmployeeInfo = $connect->query($sqlEmployeeInfo);
                                        if ($resultEmployeeInfo->num_rows > 0) {
                                            while ($rowEmployeeInfo = $resultEmployeeInfo->fetch_assoc()) {
                                                echo "
                                                    <div class='input-group mb-3'>
                                                        <div class='input-group-prepend'>
                                                            <span class='input-group-text' id='basic-addon2'>Trình độ học vấn</span>
                                                        </div>  
                                                        <input type='text' class='border-left-danger form-control' value='" . $rowEmployeeInfo['education']. "' disabled>
                                                    </div>
                                                    <div class='input-group mb-3'>
                                                        <div class='input-group-prepend'>
                                                            <span class='input-group-text' id='basic-addon2'>Kinh nghiệm làm việc</span>
                                                        </div>  
                                                        <input type='text' class='border-left-danger form-control' value='" . $rowEmployeeInfo['work_exp'] . "' disabled>
                                                    </div>
                                                    <div class='input-group mb-3'>
                                                        <div class='input-group-prepend'>
                                                            <span class='input-group-text' id='basic-addon2'>Chứng chỉ</span>
                                                        </div>  
                                                        <input type='text' class='border-left-danger form-control' value='" . $rowEmployeeInfo['certification'] . "' disabled>
                                                    </div>";
                                            }
                                        } else {
                                            echo "<p>Không tìm thấy thông tin nhân viên.</p>";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                            <!-- Color System -->

                        <div class="col-lg-7 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Thông tin bảo hiểm</h6>
                                </div>
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">Bảo Hiểm Xã Hội</span>
                                        </div>  
                                        <input type="text" class="border-left-danger form-control" value="Khấu trừ lương hàng tháng (8%)" disabled="">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">Bảo Hiểm Y Tế</span>
                                        </div>  
                                        <input type="text" class="border-left-danger form-control" value="Khấu trừ lương theo hàng tháng (1.5%)" disabled="">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">Bảo Hiểm Thất Nghiệp</span>
                                        </div>  
                                        <input type="text" class="border-left-danger form-control" value="Khấu trừ lương hàng tháng (1%)" disabled="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đã sẵn sàng để đăng xuất?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Nhấn đăng xuất để kết thúc phiên đăng nhập</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a class="btn btn-primary" href="logout.php">Đăng xuất</a>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>