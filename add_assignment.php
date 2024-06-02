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

    <title>Phân công nhiệm vụ</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users-gear"></i>
                    <span>Quản lí nhân viên</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Các chức năng:</h6>
                        <a class="collapse-item" href="employee_information.php">Quản lí nhân viên</a>
                    </div>
                </div>
            </li>
            
            <!--Assignment-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseFour">
                    <i class="fa-solid fa-file-signature"></i>
                    <span>Phân Công</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Các chức năng:</h6>
                        <a class="collapse-item" href="assignment.php">Quản lí nhiệm vụ</a>
                        <a class="collapse-item" href="add_assignment.php">Phân công nhiệm vụ</a>
                        <a class="collapse-item" href="assignment_report.php">Báo cáo nhiệm vụ</a>
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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

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
                                    Thông tin cá nhân
                                </a>
                                <a class="dropdown-item" href="attendance.php">
                                    <i class="fas fa-business-time fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Chấm công
                                </a>
                                <?php
                                if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'President' || $_SESSION['role'] == 'Vice President')) {
                                    echo '<a class="dropdown-item" href="activity_log.php">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Activity Log
                                        </a>';
                                }
                                ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="container-fluid">
                    <!-- Begin Page Content -->
                    <h1 class="h3 mb-4 text-gray-800">Danh sách thực hiện công việc</h1>
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Phân công, giao nhiệm vụ</h6>
                                </div>
                                <!-- Card Body -->
                                    <div class="card-body">
                                    <form id="form" method="POST">
                                        <div class="pt-4 pb-2">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Mã nhân viên: </label>
                                                </div>
                                                <select class="custom-select" id="user_id" name="user_id">
                                                    <?php
                                                    if ($_SESSION['role'] == 'President' || $_SESSION['role'] == 'admin') {
                                                        $sql = "SELECT user_id FROM user_data WHERE role ='Vice President'";
                                                    } elseif ($_SESSION['role'] == 'Vice President') {
                                                        $sql = "SELECT user_id FROM user_data WHERE role = 'manager'";
                                                    } elseif ($_SESSION['role'] == 'manager') {
                                                        $sql = "SELECT user_id FROM user_data WHERE role = 'employee'";
                                                    }

                                                    $result = $connect->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<option value="' . $row['user_id'] . '">' . $row["user_id"] . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Chức vụ cá nhân</span>
                                                </div>
                                                <?php
                                                if ($_SESSION['role'] == 'admin') {
                                                    echo '<input type="text" class="form-control border-left-danger" value="Admin" disabled>';
                                                } elseif ($_SESSION['role'] == 'President') {
                                                    echo '<input type="text" class="form-control border-left-danger" value="Chủ tịch" disabled>';
                                                } elseif ($_SESSION['role'] == 'Vice President') {
                                                    echo '<input type="text" class="form-control border-left-danger" value="Phó Chủ tịch" disabled>';
                                                } elseif ($_SESSION['role'] == 'manager') {
                                                    echo '<input type="text" class="form-control border-left-danger" value="Trưởng phòng" disabled>';
                                                }
                                                ?>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Mã công việc</span>
                                                </div>
                                                <input type="text" class="form-control" id="assignment_id" name="assignment_id" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Tên công việc</span>
                                                </div>
                                                <input type="" class="form-control" id="assignment" name="assignment" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Mô tả công việc</span>
                                                </div>
                                                <input type="" class="form-control" id="assignment_detail" name="assignment_detail" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Deadline</span>
                                                </div>
                                                <input type="date" class="form-control" id="deadline" name="deadline" required>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <input class="btn btn-success" type="submit" value="Thêm công việc" name="add_assignment">
                                        </div>
                                    </form>
                                    </div>
                                <?php
                                if (isset($_POST['add_assignment'])) {
                                    require 'connect_database.php';

                                    $user_id = $_POST['user_id'];
                                    $assignment = $_POST['assignment'];
                                    $assignment_detail = $_POST['assignment_detail'];
                                    $assignment_id = $_POST['assignment_id'];
                                    $deadline = $_POST['deadline'];
                                    $status = "Incomplete";
                                    $leader = $_SESSION['nameaccount'];
                                    
                                    $sqlAssignment = "INSERT INTO assignment (`assingment_id`, `user_id`, `deadline`, `assignment_type`, `details`, `status`, `leader`)  
                                                    VALUES ('$assignment_id', '$user_id', '$deadline','$assignment', '$assignment_detail', '$status', '$leader')";

                                    if ($connect->query($sqlAssignment) === TRUE) {
                                        echo "Thêm công việc thành công!";
                                    } else {
                                        echo "Thêm không thành công. Nhập lại!";
                                        echo "Lỗi: " . $connect->error . "<br>";
                                    }
                                    
                                    if (isset($_SESSION['nameaccount']) && isset($_SESSION['role'])) {
                                        $role = $_SESSION['role'];
                                        $name = $_SESSION['nameaccount'];
                                        $description = "Thêm công việc";
                                        $string_sqlAssignment = mysqli_real_escape_string($connect, $sqlAssignment);

                                        $logAssignment = "INSERT INTO modification (`name`, `role`, `text_log`, `description`) VALUES ('$name', '$role', '$string_sqlAssignment', '$description')";

                                        if ($connect->query($logAssignment) === TRUE) {
                                            echo "Đã thêm vào check log.<br>";
                                        } else {
                                            echo "Lỗi: " . $connect->error . "<br>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-success">Công việc đã NHẬN</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                        require 'connect_database.php';

                                        if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'President' || $_SESSION['role'] ==  'Vice President' || $_SESSION['role'] == 'manager') {
                                            $user_id = $_SESSION['nameaccount'];

                                            $sql = "SELECT user_data.fisrt_name, user_data.last_name, assignment.leader, assignment.deadline, assignment.assignment_type, 
                                                        assignment.status, assignment.id
                                                        FROM user_data 
                                                        INNER JOIN assignment 
                                                        ON user_data.user_id = assignment.user_id
                                                        WHERE assignment.user_id = '$user_id' and assignment.status = 'Incomplete'";
                                            $result = $connect->query($sql);

                                            if ($result->num_rows > 0) {
                                                echo "<table class='table table-bordered' id='congViecDaNhan' width='100%' cellspacing='0'>
                                                            <thead>
                                                                <tr> 
                                                                    <th>Last Name</th>
                                                                    <th>Người giao</th>
                                                                    <th>Deadline</th>
                                                                    <th>Status</th>
                                                                    <th>Assignment</th>
                                                                    <th>Detail</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>";
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>
                                                                <td>" . $row["last_name"] . "</td>
                                                                <td>" . $row["leader"] . "</td>
                                                                <td>" . $row["deadline"] . "</td>
                                                                <td>" . $row["status"] . "</td>
                                                                <td>" . $row["assignment_type"] . "</td>
                                                                <td>" . $row["details"] . "</td>
                                                            </tr>";
                                                }
                                                echo "</tbody></table>";
                                            } else {
                                                echo "<h3 class='text-center text-success'>Không có nhiệm vụ nào được nhận</h3>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-warning">Công việc đã GIAO</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                        require 'connect_database.php';

                                        if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'President' || $_SESSION['role'] ==  'Vice President' || $_SESSION['role'] == 'manager') {
                                            $user_id = $_SESSION['nameaccount'];

                                            $sql = "SELECT user_data.fisrt_name, user_data.last_name, assignment.user_id, assignment.deadline, assignment.assignment_type, 
                                                    assignment.status, assignment.id
                                                    FROM user_data 
                                                    INNER JOIN assignment 
                                                    ON user_data.user_id = assignment.user_id
                                                    WHERE assignment.leader = '$user_id' and assignment.status = 'Incomplete'";
                                            $result = $connect->query($sql);

                                            if ($result->num_rows > 0) {
                                                echo "<table class='table table-bordered' id='congViecDaGiao' width='100%' cellspacing='0'>
                                                        <thead>
                                                            <tr> 
                                                                <th>Last Name</th>
                                                                <th>Mã người nhận</th>
                                                                <th>Deadline</th>
                                                                <th>Status</th>
                                                                <th>Assignment</th>
                                                                <th>Detail</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>";
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>
                                                            <td>" . $row["last_name"] . "</td>
                                                            <td>" . $row["user_id"] . "</td>
                                                            <td>" . $row["deadline"] . "</td>
                                                            <td>" . $row["status"] . "</td>
                                                            <td>" . $row["assignment_type"] . "</td>
                                                            <td>" . $row["details"] . "</td>
                                                        </tr>";
                                                }
                                                echo "</tbody></table>";
                                            } else {
                                                echo "<div class='text-center'>Không có nhiệm vụ nào đã giao</div>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <!-- <script src="js/demo/datatables-demo.js"></script> -->

        <!-- Custom Tables -->
        <script>
            // table Cong viec da nhan
            $(document).ready(function() {
                var tableSettings = {
                    "lengthMenu": [
                        [1, 3, 5, -1],
                        [1, 3, 5, "All"]
                    ],
                };

                // Initialize DataTable for both tables with common settings
                $('#congViecDaNhan').DataTable(tableSettings);
                $('#congViecDaGiao').DataTable(tableSettings);
            });
        </script>

</body>

</html>