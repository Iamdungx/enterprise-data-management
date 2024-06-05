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

    <title>HUMG HRM - Tables</title>

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
            <hr class="sidebar-divider my-0">

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
                                if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
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
                    <!-- <div class="row">
                        
                        <div class="col-sm-8"> -->
                        <div class='card shadow mb-4'>
                        <?php    
                                require 'connect_database.php';
                                mysqli_set_charset($connect, 'UTF8');

                                $user_id = $_SESSION['nameaccount'];

                                // Truy vấn SQL
                                $sqlInfoSalary = "SELECT contract.salary, contract.type, attendance.user_id, attendance.month, attendance.year, attendance.total, attendance.ot
                                                FROM contract 
                                                INNER JOIN attendance
                                                ON contract.user_id = attendance.user_id
                                                WHERE attendance.user_id = '$user_id'";
                                $sqlInfoInsurance = "SELECT * FROM benefit WHERE user_id = '$user_id'";

                                $resultInfoSalary = $connect->query($sqlInfoSalary);
                                $resultInfoInsurance = $connect->query($sqlInfoInsurance);

                                $rowInfoInsurance = $resultInfoInsurance->fetch_assoc();

                                // Tỷ lệ khấu trừ bảo hiểm (giả sử các tỷ lệ này)
                                $health_insurance_rate = 0.015;  // 1.5%
                                $social_insurance_rate = 0.08;   // 8%
                                $unemployment_insurance_rate = 0.01;  // 1%

                                echo "<div class='card-header py-3 d-flex justify-content-between align-items-center'>
                                        <h6 class='m-0 font-weight-bold text-primary'>Thông tin lương theo tháng</h6>
                                        <div>
                                            <a class='btn btn-warning btn-icon-split' id='exportExcelBtn'>
                                                <span class='icon text-white-50'>
                                                    <i class='fas fa-download'></i>
                                                </span>
                                                <span class='text' data-toggle='modal'>Xuất Excel</span>
                                                <!-- <button class='btn btn-success' data-toggle='modal' data-target='#importExcel'>Nhập file excel</button> -->
                                            </a>
                                        </div>    
                                    </div>
                                    <div class='card-body'>
                                        <div class='table-responsive'>
                                            <table class='table table-bordered' id='myDataTable' width='100%' cellspacing='0'>";

                                if ($resultInfoSalary->num_rows > 0) {
                                    echo '<thead>
                                            <tr>
                                                <th>Mã nhân viên</th>
                                                <th>Tháng</th>
                                                <th>Tổng công đi trong tháng</th>
                                                <th>Số giờ OT trong tháng</th>
                                                <th>Tổng lương tháng</th>
                                                <th>Loại hợp đồng</th>
                                                <th>Các loại bảo hiểm</th>
                                                <th>Chi phí khấu trừ bảo hiểm (40%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                    while ($rowInfoSalary = $resultInfoSalary->fetch_assoc()) {
                                        if ($rowInfoSalary['total'] < 24) {
                                            $missing_days = 26 - $rowInfoSalary['total'];
                                            $penalty = ($rowInfoSalary['salary'] / 26) * $missing_days * 0.10;
                                            $totalSalary = ($rowInfoSalary['salary'] / 26) * $rowInfoSalary['total'] + ($rowInfoSalary['salary'] / 208) * $rowInfoSalary['ot'] - $penalty;
                                            $totalColor = 'text-danger';
                                        } else {
                                            $totalSalary = ($rowInfoSalary['salary'] / 26) * $rowInfoSalary['total'] + ($rowInfoSalary['salary'] / 208) * $rowInfoSalary['ot'];
                                            $totalColor = 'text-success';
                                        }

                                        // Tính toán các khoản khấu trừ bảo hiểm
                                        $health_insurance = $rowInfoInsurance['health_insurance'] === 'Yes' ? $totalSalary * $health_insurance_rate : 0;
                                        $social_insurance = $rowInfoInsurance['social_insurance'] === 'Yes' ? $totalSalary * $social_insurance_rate : 0;
                                        $unemployment_insurance = $rowInfoInsurance['unemployment_insurance'] === 'Yes' ? $totalSalary * $unemployment_insurance_rate : 0;

                                        // Tổng khấu trừ bảo hiểm
                                        $totalInsurance = ($health_insurance + $social_insurance + $unemployment_insurance) * 0.4;

                                        // Tổng lương sau khi trừ bảo hiểm
                                        $totalSalaryAfterInsurance = $totalSalary - $totalInsurance;

                                        echo '<tr>
                                                <td>' . $rowInfoSalary['user_id'] . '</td>
                                                <td>' . $rowInfoSalary['month'] . '</td>
                                                <td class='. $totalColor .'>' . $rowInfoSalary['total'] . '/26</td>
                                                <td>' . $rowInfoSalary['ot'] . '</td>
                                                <td>' . number_format($totalSalaryAfterInsurance) . '</td>
                                                <td>' . $rowInfoSalary['type'] . '</td>
                                                <td>Đã đóng đầy đủ</td>
                                                <td>' . number_format($totalInsurance) . '</td>
                                            </tr>';
                                    }
                                    echo '</tbody>';
                                } else {
                                    echo '<h3>Chưa có dữ liệu của nhân viên này!</h3>';
                                }

                                $connect->close();

                                echo "</table>
                                    </div>    
                                </div>
                            </div>";
                        ?>
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
                                XLSX.writeFile(wb, 'Luong_<?php echo $_SESSION["nameaccount"]?>.xlsx');
                            });
                        </script>
                        </div>
                    </div>
                <!-- </div>
            </div> -->
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
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
            };

            // Initialize DataTable for both tables with common settings
            $('#payroll').DataTable(tableSettings);
        });
    </script>

</body>

</html>