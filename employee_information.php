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

    <title>Thông tin nhân viên</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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

            <!--Quản lý nhân viên-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Quản lý nhân viên</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Các chức năng:</h6>
                        <a class="collapse-item" href="employee_information.php">Quản lý nhân viên</a>
                        <a class="collapse-item" href="contract.php">Quản lý hợp đồng</a>
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
                        <a class='collapse-item' href='assignment_report.php'>Thống kê công việc</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fa-solid fa-money-check-dollar"></i>
                    <span>Lương</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Các chức năng:</h6>
                        <a class="collapse-item" href="payroll.php">Quản lý lương</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

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
                                <?php
                                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin' || $_SESSION['role'] == 'President' || $_SESSION['role'] == 'Vice President') {
                                        echo '<a href="#" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-upload"></i>
                                        </span>
                                        <span class="text" data-toggle="modal" data-target="#importExcel">Nhập file Excel</span>
                                    </a>';
                                    }
                                ?>

                                <a href="#" class="btn btn-warning btn-icon-split" id="exportExcelBtn">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-download"></i>
                                    </span>
                                    <span class="text" data-toggle="modal">Xuất Excel</span>
                                    <!-- <button class="btn btn-success" data-toggle='modal' data-target='#importExcel'>Nhập file excel</button> -->
                                </a>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
                                <script>
                                    document.getElementById('exportExcelBtn').addEventListener('click', function () {
                                        // Lấy bảng HTML
                                        var table = document.getElementById('myDataTable');
                                        
                                        // Tạo một bảng tạm thời để loại bỏ các cột không mong muốn
                                        var tempTable = table.cloneNode(true);
                                        var rows = tempTable.rows;

                                        // Chỉ định các chỉ số của cột cần loại bỏ (bắt đầu từ 0)
                                        var colsToExclude = [6]; // Ví dụ: Loại bỏ cột "Ghi chú"

                                        // Loại bỏ các cột không mong muốn
                                        for (var i = 0; i < rows.length; i++) {
                                            for (var j = colsToExclude.length - 1; j >= 0; j--) {
                                                rows[i].deleteCell(colsToExclude[j]);
                                            }
                                        }

                                        // Chuyển bảng tạm thời thành workbook và xuất file Excel
                                        var wb = XLSX.utils.table_to_book(tempTable, {sheet: "Sheet1"});
                                        XLSX.writeFile(wb, 'ds_nhanvien.xlsx');
                                    });
                                </script>

                                <?php
                                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin' || $_SESSION['role'] == 'President' || $_SESSION['role'] == 'Vice President') {
                                        echo '<a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#addUser">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-user-plus"></i>
                                        </span>
                                        <span class="text">Thêm Nhân Viên</span>
                                    </a>';                                   
                                    }
                                
                                ?>

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
                                                    <span class='input-group-text' id='basic-addon3'>Họ</span>
                                                </div>
                                                <input type='text' class='form-control' id='first_name' name='first_name' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Tên</span>
                                                </div>
                                                <input type='text' class='form-control' id='last_name' name='last_name' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Giới tính</span>
                                                </div>
                                                <input type='text' class='form-control' id='gender' name='gender' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Địa chỉ</span>
                                                </div>
                                                <input type='text' class='form-control' id='address' name='address' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Ngày sinh</span>
                                                </div>
                                                <input type='date' class='form-control' id='date_of birth' name='date_of_birth' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Số điện thoại</span>
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
                                                    <span class='input-group-text' id='basic-addon3'>Ngày bắt đầu</span>
                                                </div>
                                                <input type='date' class='form-control' id='hire_date' name='hire_date' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Bộ phận</span>
                                                </div>
                                                <input type='text' class='form-control' id='department' name='department' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Vị trí</span>
                                                </div>
                                                <input type='text' class='form-control' id='postion' name='position' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Vai trò</span>
                                                </div>
                                                <input type='text' class='form-control' id='role' name='role' aria-describedby='basic-addon3' /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Mật khẩu</span>
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
                                        $role = $_SESSION['role'];
                                        if ($department == 'admin' || $department == 'President' || $department == 'Vice President') {
                                            $sql = "SELECT * FROM user_data WHERE role!='admin' and role!='President' and role!='Vice President'";
                                        } else {
                                            $sql = "SELECT * FROM user_data WHERE department='$department'";
                                        }

                                        $result = $connect->query($sql);

                                        echo "
                                                <thead>
                                                    <tr>
                                                        <th>Mã nhân viên</th>
                                                        <th>Tên</th>
                                                        <th>Địa chỉ</th>
                                                        <th>Ngày sinh</th>
                                                        <th>Bộ phận</th>
                                                        <th>Vị trí</th>
                                                        <th>Chỉnh sửa</th>
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
                                            if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $role == 'President' || $role == 'Vice President')) {
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

                                                            if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $role == 'President' || $role == 'Vice President')) {
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
                                            if (isset($_SESSION['role']) && $_SESSION['role'] == 'manager' || $_SESSION['role'] == 'Vice President') {
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
                                                                                        <span class='input-group-text' id='basic-addon3'>Họ</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='first_name' name='first_name' aria-describedby='basic-addon3' value='" . $row["fisrt_name"] . "' f/><br>
                                                                                </div>                                                                          
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Tên</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='last_name' name='last_name' aria-describedby='basic-addon3' value='" . $row["last_name"] . "' /><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Giới tính</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='gender' name='gender' aria-describedby='basic-addon3' value='" . $row["gender"] . "' /><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Địa chỉ</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='address' name='address' aria-describedby='basic-addon3' value='" . $row["address"] . "' /><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Ngày sinh</span>
                                                                                    </div>
                                                                                    <input type='date' class='form-control' id='date_of birth' name='date_of_birth' aria-describedby='basic-addon3' value='" . $row["date_of_birth"] . "' /><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Số điện thoại</span>
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
                                                                                        <span class='input-group-text' id='basic-addon3'>Ngày bắt đầu</span>
                                                                                    </div>
                                                                                    <input type='date' class='form-control' id='hire_date' name='hire_date' aria-describedby='basic-addon3' value='" . $row["hire_date"] . "' /><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Bộ phận</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='department' name='department' aria-describedby='basic-addon3' value='" . $row["department"] . "' /><br>
                                                                                </div>
                                                                                <div class='input-group mb-3'>
                                                                                    <div class='input-group-prepend'>
                                                                                        <span class='input-group-text' id='basic-addon3'>Vị trí</span>
                                                                                    </div>
                                                                                    <input type='text' class='form-control' id='postion' name='position' aria-describedby='basic-addon3' value='" . $row["position"] . "' /><br>
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
                        <span>Copyright &copy; NCKH 2024</span>
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