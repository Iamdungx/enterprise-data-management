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
            <?php
            if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager')) {
                echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HR Manager</div>
            </a>';
            } else {
                echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HR Manager</div>
            </a>';
            }
            ?>

            <!-- Divider -->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <?php
                if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager')) {
                    echo '<a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Bảng điều khiển</span></a>';
                } else {
                    echo '<a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Bảng điều khiển</span></a>';
                }
                ?>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Chức năng
                </div>

                <!-- Nav Item - Pages Collapse Menu -->


                <!-- Nav Item - Utilities Collapse Menu -->


                <!--Quản lý nhân viên-->
                <?php
                if (isset($_SESSION['role']) && $_SESSION['role'] != 'employee') {
                    echo '<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users-gear"></i>
                    <span>Quản lý nhân viên</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Các chức năng:</h6>
                        <a class="collapse-item" href="employee_information.php">Quản lý nhân viên</a>
                    </div>
                </div>
            </li>';
                }

                ?>


                <!--Assignment-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <i class="fa-solid fa-file-signature"></i>
                    <?php
                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'employee') {
                        echo "<span>Công Việc</span>";
                    } else {
                        echo '<span>Phân Công</span>';
                    }
                    ?>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php
                        if (isset($_SESSION['role']) && $_SESSION['role'] == 'employee') {
                            echo "<a class='collapse-item' href='assignment.php'>Công việc</a>
                            <a class='collapse-item' href='assignment_report.php'>Báo cáo nhiệm vụ</a>
                        ";
                        } else {
                            echo ' <h6 class="collapse-header">Các chức năng:</h6>
                            <a class="collapse-item" href="assignment.php">Quản lí nhiệm vụ</a>
                            <a class="collapse-item" href="add_assignment.php">Phân công nhiệm vụ</a>
                            <a class="collapse-item" href="assignment_report.php">Báo cáo nhiệm vụ</a>';
                        }
                        ?>
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
                        <?php
                        if (isset($_SESSION['role']) && $_SESSION['role'] == 'employee') {
                            echo "<a class='collapse-item' href='payroll.php'>Thông tin lương</a>";
                        } else {
                            echo '<h6 class="collapse-header">Các chức năng:</h6>
                            <a class="collapse-item" href="payroll.php">Quản lý lương</a>';
                        }
                        ?>

                    </div>
                </div>
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
                                <a class="dropdown-item" href="#">
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
                    <h1 class="h3 mb-2 text-gray-800">Bảng chấm công</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Bảng thông tin chấm công nhân viên</h6>
                            <?php
                            if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'President' || $_SESSION['role'] == 'Vice President')) {
                                echo '<div>
                                <a href="#" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="text" data-toggle="modal" data-target="#importExcel">Nhập file</span>
                                </a>
                                <a href="#" class="btn btn-warning btn-icon-split" id="exportExcelBtn">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-download"></i>
                                    </span>
                                    <span class="text" data-toggle="modal">Xuất Excel</span>
                                </a>
                            </div>';
                            }
                            ?>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
                            <script>
                                document.getElementById('exportExcelBtn').addEventListener('click', function() {
                                    var wb = XLSX.utils.table_to_book(document.getElementById('myAttendanceTable'), {
                                        sheet: "ChamCong"
                                    });
                                    XLSX.writeFile(wb, 'ds_chamcong.xlsx');
                                });
                            </script>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myAttendanc" width="100%" cellspacing="0">
                                    <?php
                                    require 'connect_database.php';
                                    mysqli_set_charset($connect, 'UTF8');
                                    $user_id = $_SESSION['nameaccount'];
                                    $department = $_SESSION['department'];

                                    if (isset($_SESSION['role'])) {
                                        $role = $_SESSION['role'];

                                        if ($role == 'admin' || $role = 'President') {
                                            $sql = "SELECT * FROM attendance";
                                        }
                                        if (isset($_SESSION['role']) && ($_SESSION['role'] == 'manager')) {
                                            $sql = "SELECT attendance.user_id, attendance.month, attendance.year, attendance.total, attendance.ot 
                                            FROM `attendance` 
                                            INNER JOIN user_data 
                                            ON attendance.user_id = user_data.user_id 
                                            WHERE user_data.department = '$department';";
                                        }
                                        if (isset($_SESSION['role']) && ($_SESSION['role'] == 'employee')) {
                                            $sql = "SELECT * FROM attendance WHERE user_id = '$user_id';";
                                        }
                                        $result = $connect->query($sql);
                                        if ($result->num_rows > 0) {
                                            echo "
                                            <table class='table table-bordered' id='myAttendanceTable' width='100%' cellspacing='0'>
                                                <thead>
                                                    <tr>
                                                        <th>Mã nhân viên</th>
                                                        <th>Tháng</th>
                                                        <th>Năm</th>
                                                        <th>Số ngày công</th>
                                                        <th>OT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>" .
                                                    "<td>" . $row["user_id"] . "</td>" .
                                                    "<td>" . $row["month"] . "</td>" .
                                                    "<td>" . $row["year"] . "</td>" .
                                                    "<td>" . $row["total"] . "</td>" .
                                                    "<td>" . $row["ot"] . "</td>
                                            </tr>";
                                            }

                                            echo "</tbody></table>";
                                        } else {
                                            echo "<p>No data</p>";
                                        }
                                    } else {
                                        echo "<p>No data</p>";
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
                <form action="import_attendance.php" name="upload_excel" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nhập file <span style="color: #1cc88a;">Data</span></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">Mã nhân viên</span>
                            </div>
                            <!-- <input type="text" class="form-control" id="user_id" name="user_id" aria-describedby="basic-addon3" required> -->
                            <select name="user_id" id="user_id">
                                <?php
                                require 'connect_database.php';
                                mysqli_set_charset($connect, 'UTF8');


                                $sqlSelectUserID = "SELECT u.user_id, u.department, u.fisrt_name, u.last_name 
                                                    FROM user_data u
                                                    LEFT JOIN attendance a ON u.user_id = a.user_id
                                                    WHERE u.department != 'admin' AND a.user_id IS NULL;";
                                $result = $connect->query($sqlSelectUserID);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['user_id'] . '">' . $row["user_id"] . ' - '.  $row["fisrt_name"] .' ' . $row["last_name"] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Tải lên</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" required>
                                <label class="custom-file-label" id="custom-file-label" for="inputGroupFile03">Chọn file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                        <button class="btn btn-success" type="submit" id="submit" name="import" data-loading-text="Loading...">Nhập file</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = document.getElementById("inputGroupFile03").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>

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
    <!-- <script src="js/demo/datatables-demo.js"></script> -->

    <script>
        $(document).ready(function() {
            $('#myAttendanceTable').DataTable({
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
            });
        });
    </script>

</body>

</html>