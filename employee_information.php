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

    <title>Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HR Manager</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Bảng điều khiển</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Chức năng
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <!--Quản lí nhân viên-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Quản lí nhân viên</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Các chức năng:</h6>
                        <a class="collapse-item" href="employee_information.php">Quản lí nhân viên</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!--Assignment-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Phân Công</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Phân công:</h6>
                        <a class="collapse-item" href="assignment.php">Quản lí nhiệm vụ</a>
                        <a class="collapse-item" href="add_assignment.php">Phân công nhiệm vụ</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column ">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
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
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
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
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
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
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
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
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="attendance.php">
                                    <i class="fas fa-business-time fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Chấm công
                                </a>
                                <?php
                                if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                                    echo '<a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
            </a>';
                                }
                                ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Thông tin nhân viên</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Bảng thông tin sơ bộ nhân viên</h6>
                            <div>
                                <a href="#" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="text" data-toggle="modal" data-target="#importExcel">Nhập file Excel</span>
                                    <!-- <button class="btn btn-success" data-toggle='modal' data-target='#importExcel'>Nhập file excel</button> -->
                                </a>
                                <a href="#" class="btn btn-info btn-icon-split" data-toggle='modal' data-target='#addUser'>
                                    <span class="icon text-white-50">
                                        <i class="fas fa-user-plus"></i>
                                    </span>
                                    <span class="text">Thêm Nhân Viên</span>
                                </a>
                            </div>
                        </div>
                        <div class='modal fade' id='addUser' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'>Thêm nhân viên</h5>
                                        <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>×</span>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <form method='post'>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>First Name</span>
                                                </div>
                                                <input type='text' class='form-control' id='first_name' name='first_name' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Last Name</span>
                                                </div>
                                                <input type='text' class='form-control' id='last_name' name='last_name' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Gender</span>
                                                </div>
                                                <input type='text' class='form-control' id='gender' name='gender' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Address</span>
                                                </div>
                                                <input type='text' class='form-control' id='address' name='address' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Date of birth</span>
                                                </div>
                                                <input type='date' class='form-control' id='date_of birth' name='date_of_birth' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Phone</span>
                                                </div>
                                                <input type='text' class='form-control' id='phone' name='phone' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Email</span>
                                                </div>
                                                <input type='email' class='form-control' id='email' name='email' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Hire date</span>
                                                </div>
                                                <input type='date' class='form-control' id='hire_date' name='hire_date' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Department</span>
                                                </div>
                                                <input type='text' class='form-control' id='department' name='department' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Position</span>
                                                </div>
                                                <input type='text' class='form-control' id='postion' name='position' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Role</span>
                                                </div>
                                                <input type='text' class='form-control' id='role' name='role' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Password</span>
                                                </div>
                                                <input type='text' class='form-control border-left-danger' id='password' name='password' aria-describedby='basic-addon3' value='0000' disabled /><br>
                                            </div>
                                            <div class='modal-footer'>
                                                <button class='btn btn-secondary' type='button' data-dismiss='modal'>Không</button>
                                                <button type='submit' name='add_employee' class='btn btn-primary'>Thêm</button>
                                            </div>
                                        </form>
                                        <?php
                                        if (isset($_POST['add_employee'])) {
                                            require 'connect_database.php';

                                            $first_name = $_POST['first_name'];
                                            $last_name = $_POST['last_name'];
                                            $gender = $_POST['gender'];
                                            $address = $_POST['address'];
                                            $date_of_birth = $_POST['date_of_birth'];
                                            $phone = $_POST['phone'];
                                            $email = $_POST['email'];
                                            $hire_date = $_POST['hire_date'];
                                            $department = $_POST['department'];
                                            $position = $_POST['position'];
                                            $password = $_POST['password'];
                                            $role = $_POST['role'];
                                            $password = '0000';

                                            function generateUserID()
                                            {
                                                $prefix = "HUMG";
                                                $random_number = sprintf('%06d', mt_rand(0, 999999)); // Sinh số ngẫu nhiên từ 000000 đến 999999
                                                return $prefix . $random_number;
                                            }

                                            do {
                                                $user_id = generateUserID();
                                                $check_query = "SELECT COUNT(*) as count FROM user_data WHERE user_id = '$user_id'";
                                                $result = $connect->query($check_query);
                                                $row = $result->fetch_assoc();
                                                $user_id_exists = $row['count'] > 0;
                                            } while ($user_id_exists);

                                            $sqlAddEmployee = "INSERT INTO user_data (`fisrt_name`, `last_name`, `gender`, `address`, `date_of_birth`, `phone`, `email`, `hire_date`, `department`, `position`, `user_id`, `password`, `role`) 
                                                VALUES ('$first_name', '$last_name', '$gender', '$address', '$date_of_birth', '$phone', '$email', '$hire_date', '$department', '$position', '$user_id', '$password', '$role')";

                                            if (isset($_SESSION['nameaccount']) && isset($_SESSION['role'])) {
                                                $role = $_SESSION['role'];
                                                $name = $_SESSION['nameaccount'];
                                                $description = "Thêm nhân viên";
                                                $string_sql = mysqli_real_escape_string($connect, $sqlAddEmployee); // Escape single quotes in the SQL string

                                                $logAddEmployee = "INSERT INTO modification (`name`, `role`, `text_log`, `description`) VALUES ('$name', '$role', '$string_sql', '$description')";

                                                if ($connect->query($logAddEmployee) === TRUE) {
                                                    echo "Đã thêm vào check log<br>";
                                                } else {
                                                    echo "Lỗi: " . $connect->error . "<br>";
                                                }
                                            }

                                            if ($connect->query($sqlAddEmployee) === TRUE) {
                                                echo "Thêm nhân viên thành công!";
                                            } else {
                                                echo "Thêm không thành công. Nhập lại!";
                                                echo "Lỗi: " . $connect->error . "<br>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myDataTable" width="100%" cellspacing="0">
                                    <?php
                                    require 'connect_database.php';
                                    mysqli_set_charset($connect, 'UTF8');

                                    if (isset($_SESSION['department'])) {
                                        $department = $_SESSION['department'];

                                        if ($department == 'admin') {
                                            $sql = "SELECT * FROM user_data WHERE role!='admin'";
                                        } else {
                                            $sql = "SELECT * FROM user_data WHERE department='$department'";
                                        }

                                        $result = $connect->query($sql);

                                        echo "
                                                <thead>
                                                    <tr>
                                                        <th>User ID</th>
                                                        <th>Last Name</th>
                                                        <th>Address</th>
                                                        <th>Date Of Birth</th>
                                                        <th>Department</th>
                                                        <th>Position</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                        while ($row = $result->fetch_assoc()) {
                                            echo "
                                                    <tr>
                                                        <td>"  . $row["user_id"] . "</td>" .
                                                "<td>" . $row["last_name"] . "</td>" .
                                                "<td>" . $row["address"] . "</td>" .
                                                "<td>" . $row["date_of_birth"] . "</td>" .
                                                "<td>" . $row["department"] . "</td>" .
                                                "<td>" . $row["position"] . "</td>" .
                                                "<td>";
                                            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                                                echo "
                                                            <button href='#' class='btn btn-danger' data-toggle='modal' data-target='#deleteUser" . $row['id'] . "'>
                                                                <i class='fas fa-user-times'></i>
                                                            </button>";
                                            }

                                            echo "<div class='modal fade' id='deleteUser" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                            <div class='modal-dialog' role='document'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h5 class='modal-title' id='exampleModalLabel'>Xác nhận xóa tài khoản: <span style='color: #e74a3b;'>" . $row["user_id"] . "</span></h5>
                                                                        <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                                                                            <span aria-hidden='true'>×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class='modal-body'>Bạn chắc chắn muốn xoá tài khoản này?</div>
                                                                    <div class='modal-footer'>
                                                                        <button class='btn btn-secondary' type='button' data-dismiss='modal'>Không</button>
                                                                        <form action='delete_employee.php' method='post'>
                                                                            <button class='btn btn-danger' type='submit' name='delete' value='" . $row["id"] . "'>Xoá</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            
                                                            <button href='#' class='btn btn-primary' data-toggle='modal' data-target='#updateUser" . $row["id"] . "'>
                                                                <i class='fas fa-user-edit'></i>
                                                            </button>";

                                            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                                                echo "<div class='modal fade' id='updateUser" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                                <div class='modal-dialog' role='document'>
                                                                    <div class='modal-content'>
                                                                        <div class='modal-header'>
                                                                            <h5 class='modal-title' id='exampleModalLabel'>Chỉnh sửa thông tin tài khoản: <span style='color: #4e73df'>" . $row["user_id"] . "</span></h5>
                                                                            <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                                                                                <span aria-hidden='true'>×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class='modal-body'>
                                                                            <form action='process_update.php' method='post'>
                                                                                <input class='form-control' type='hidden' name='employee_id' value='" . $row["id"] . "' />
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>First Name</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='first_name' name='first_name' aria-describedby='basic-addon3' value='" . $row["fisrt_name"] . "'/><br>
                                                                                </div>                                                                          
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Last Name</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='last_name' name='last_name' aria-describedby='basic-addon3' value='" . $row["last_name"] . "' /><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Gender</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='gender' name='gender' aria-describedby='basic-addon3' value='" . $row["gender"] . "' /><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Address</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='address' name='address' aria-describedby='basic-addon3' value='" . $row["address"] . "' /><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Date of birth</span>
                                                                                    </div>
                                                                                    <input type='date' class='form-control' id='date_of birth' name='date_of_birth' aria-describedby='basic-addon3' value='" . $row["date_of_birth"] . "' disabled/><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Phone</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='phone' name='phone' aria-describedby='basic-addon3' value='" . $row["phone"] . "' /><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Email</span>
                                                                                    </div>
                                                                                    <input type='email' class='form-control' id='email' name='email' aria-describedby='basic-addon3' value='" . $row["email"] . "' /><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Hire date</span>
                                                                                    </div>
                                                                                    <input type='date' class='form-control' id='hire_date' name='hire_date' aria-describedby='basic-addon3' value='" . $row["hire_date"] . "' disabled/><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Department</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='department' name='department' aria-describedby='basic-addon3' value='" . $row["department"] . "' /><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Position</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='postion' name='position' aria-describedby='basic-addon3' value='" . $row["position"] . "' /><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Role</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='role' name='role' aria-describedby='basic-addon3' value='" . $row["role"] . "' /><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Password</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='password' name='password' aria-describedby='basic-addon3' value='" . $row["password"] . "' disabled/><br>
                                                                                </div>
                                                                                <div class='modal-footer'>
                                                                                    <button class='btn btn-secondary' type='button' data-dismiss='modal'>Không</button>
                                                                                    <button type='submit' name='submit' class='btn btn-primary'>Cập Nhật</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>";
                                            }
                                            if (isset($_SESSION['role']) && $_SESSION['role'] == 'manager') {
                                                echo "<div class='modal fade' id='updateUser" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                                <div class='modal-dialog' role='document'>
                                                                    <div class='modal-content'>
                                                                        <div class='modal-header'>
                                                                            <h5 class='modal-title' id='exampleModalLabel'>Chỉnh sửa thông tin tài khoản: <span style='color: #4e73df'>" . $row["user_id"] . "</span></h5>
                                                                            <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                                                                                <span aria-hidden='true'>×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class='modal-body'>
                                                                            <form action='process_update.php' method='post'>
                                                                                <input class='form-control' type='hidden' name='employee_id' value='" . $row["id"] . "' />
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>First Name</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='first_name' name='first_name' aria-describedby='basic-addon3' value='" . $row["fisrt_name"] . "' disabled/><br>
                                                                                </div>                                                                          
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Last Name</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='last_name' name='last_name' aria-describedby='basic-addon3' value='" . $row["last_name"] . "' disabled/><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Gender</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='gender' name='gender' aria-describedby='basic-addon3' value='" . $row["gender"] . "' disabled/><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Address</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='address' name='address' aria-describedby='basic-addon3' value='" . $row["address"] . "' disabled/><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Date of birth</span>
                                                                                    </div>
                                                                                    <input type='date' class='form-control' id='date_of birth' name='date_of_birth' aria-describedby='basic-addon3' value='" . $row["date_of_birth"] . "' disabled/><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Phone</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='phone' name='phone' aria-describedby='basic-addon3' value='" . $row["phone"] . "' disabled/><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Email</span>
                                                                                    </div>
                                                                                    <input type='email' class='form-control' id='email' name='email' aria-describedby='basic-addon3' value='" . $row["email"] . "' disabled/><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Hire date</span>
                                                                                    </div>
                                                                                    <input type='date' class='form-control' id='hire_date' name='hire_date' aria-describedby='basic-addon3' value='" . $row["hire_date"] . "' disabled/><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Department</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='department' name='department' aria-describedby='basic-addon3' value='" . $row["department"] . "' /><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Position</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='postion' name='position' aria-describedby='basic-addon3' value='" . $row["position"] . "' disabled/><br>
                                                                                </div>
                                                                                <div class='modal-footer'>
                                                                                    <button class='btn btn-secondary' type='button' data-dismiss='modal'>Không</button>
                                                                                    <button type='submit' name='submit' class='btn btn-primary'>Cập Nhật</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>";
                                            }

                                            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                                                echo "<button href='#' class='btn btn-warning' data-toggle='modal' data-target='#changePassword" . $row["id"] . "' type='submit' name='changePassword' value='" . $row["id"] . "'>
                                                                <i class='fas fa-user-lock'></i>
                                                            </button>";
                                            }

                                            echo "<div class='modal fade' id='changePassword" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                                <div class='modal-dialog' role='document'>
                                                                    <div class='modal-content'>
                                                                        <div class='modal-header'>
                                                                            <h5 class='modal-title' id='exampleModalLabel'>Đổi mật khẩu cho tài khoản: <span style='color: #f6c23e;'>" . $row["user_id"] . "</span></h5>
                                                                            <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                                                                                <span aria-hidden='true'>×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class='modal-body'>
                                                                            <form action='change_password.php' method='post'>
                                                                                <input class='form-control' type='hidden' name='employee_id' value='" . $row["id"] . "'/>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Mật khẩu mới</span>
                                                                                    </div>
                                                                                    <input type='password' class='form-control' id='new_password' name='new_password' aria-describedby='basic-addon3'/><br>
                                                                                </div>                                                                          
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Nhập lại mật khẩu mới</span>
                                                                                    </div>
                                                                                    <input type='password' class='form-control' id='confirm_password' name='confirm_password' aria-describedby='basic-addon3'/><br>
                                                                                </div>
                                                                                <div class='modal-footer'>
                                                                                    <button class='btn btn-secondary' type='button' data-dismiss='modal'>Không</button>
                                                                                    <button type='submit' name='submit' class='btn btn-warning'>Thay đổi</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>";
                                        }
                                    } else {
                                        echo "Department information not found in session.";
                                    }
                                    $connect->close();
                                    ?>
                                    </tbody>
                                </table>
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

    <!-- Import Modal -->
    <div class="modal fade" id="importExcel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="import_info.php" name="upload_excel" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import file <span style='color: #1cc88a;'>Excel</span></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                <label class="custom-file-label" id="custom-file-label" for="inputGroupFile03">File excel tại đây</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button>
                        <button class="btn btn-success" type="submit" id="submit" name="Import" data-loading-text="Loading...">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Custom JavaScript -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('inputGroupFile03');
            const label = document.getElementById('custom-file-label');

            input.addEventListener('change', function() {
                const fileName = this.value.split('\\').pop();
                label.innerHTML = fileName;
            });
        });
    </script>

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

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
            });
        });
    </script>

</body>

</html>