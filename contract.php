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

    <title>HRM - Contract</title>

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HR Manager</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Bảng điều khiển</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Chức năng
            </div>
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
        <div id="content-wrapper" class="d-flex flex-column">

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
                                    Thông tin cá nhân
                                </a>
                                <a class="dropdown-item" href="attendance.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Chấm công
                                </a>
                                <a class="dropdown-item" href="activity_log.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
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

                <!-- Begin Page Content -->


                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 text-center">HỢP ĐỒNG LAO ĐỘNG SỐ</h1>
                    <p class="mb-4">Ghi chú: Đây chỉ là hợp đồng số, doanh nghiệp đã lược bớt chỉ bao gồm các thông tin quan trọng.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div>
                                <?php
                                    if (isset($_SESSION['role']) && ($_SESSION['role'] == 'Vice President' || $_SESSION['role'] == 'President' || $_SESSION['role'] == 'admin')){
                                        echo '<a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#addContract">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-user-plus"></i>
                                        </span>
                                        <span class="text">Thêm hợp đồng</span>
                                    </a>';
                                    }
                                ?>

                            </div>
                        </div>
                        <div class='modal fade' id='addContract' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'>Thêm hợp đồng</h5>
                                        <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>×</span>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <form method='post'>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Mã nhân viên</span>
                                                </div>
                                                <select name="user_id" id="user_id">
                                                <?php
                                                require 'connect_database.php';
                                                mysqli_set_charset($connect, 'UTF8');


                                                $sqlSelectUserID = "SELECT u.user_id, u.department, u.fisrt_name, u.last_name 
                                                                    FROM user_data u
                                                                    LEFT JOIN contract c ON u.user_id = c.user_id
                                                                    WHERE u.department != 'admin' AND c.user_id IS NULL;";
                                                $result = $connect->query($sqlSelectUserID);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<option value="' . $row['user_id'] . '">' . $row["user_id"] . ' - '.  $row["fisrt_name"] .' ' . $row["last_name"] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Ngày tạo hợp đồng</span>
                                                </div>
                                                <input type='date' class='form-control' id='contract_date' name='contract_date' aria-describedby='basic-addon3' required /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Lương</span>
                                                </div>
                                                <input type='text' class='form-control' id='salary' name='salary' aria-describedby='basic-addon3' required /><br>
                                            </div>
                                            <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                    <span class='input-group-text' id='basic-addon3'>Loại hợp đồng</span>
                                                </div>
                                                <input type='text' class='form-control' id='type' name='type' aria-describedby='basic-addon3' required /><br>
                                            </div>
                                            <div class='modal-footer'>
                                                <button class='btn btn-secondary' type='button' data-dismiss='modal'>Không</button>
                                                <button type='submit' name='add_contract' class='btn btn-primary'>Thêm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        session_start();
                        require 'connect_database.php';

                        if (isset($_POST['add_contract'])) {
                            $user_id = $_POST['user_id'];

                            $contract_date = $_POST['contract_date'];
                            $salary = $_POST['salary'];
                            $type = $_POST['type'];

                            function generateContractID()
                            {
                                $prefix = "HD";
                                $random_number = sprintf('%05d', mt_rand(10001, 99999)); // Sinh số ngẫu nhiên từ 000000 đến 99999
                                return $prefix . $random_number;
                            }

                            do {
                                $contract_id = generateContractID();
                                $check_query = "SELECT COUNT(*) as count FROM contract WHERE contract_id = '$contract_id'";
                                $resultContract = $connect->query($check_query);
                                $rowContract = $resultContract->fetch_assoc();
                                $contract_id_exists = $rowContract['count'] > 0;
                            } while ($contract_id_exists);

                            $sqlAddEmployee = "INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) 
                            VALUES ('$user_id', '$contract_id','$contract_date', '$salary', '$type')";

                            if (isset($_SESSION['nameaccount']) && isset($_SESSION['role'])) {
                                $role = $_SESSION['role'];
                                $name = $_SESSION['nameaccount'];
                                $description = "Thêm hợp đồng";
                                $string_sql = mysqli_real_escape_string($connect, $sqlAddEmployee); // Escape single quotes in the SQL string

                                $logAddContract = "INSERT INTO modification (`name`, `role`, `text_log`, `description`) VALUES ('$name', '$role', '$string_sql', '$description')";

                                if ($connect->query($logAddContract) === TRUE) {
                                    echo "Đã thêm vào check log<br>";
                                } else {
                                    echo "Lỗi: " . $connect->error . "<br>";
                                }
                            }

                            if ($connect->query($sqlAddEmployee) === TRUE) {
                                echo "Thêm hợp đồng thành công!";
                                header('Location: contract.php');
                            } else {
                                echo "Thêm không thành công. Nhập lại!";
                            }
                        } else {
                            echo "<h3 class='text-center text-primary'></h3>";
                        }

                        $connect->close();
                        ?>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php
                                    require 'connect_database.php';
                                    mysqli_set_charset($connect, 'UTF8');
                                    $user_id = $_SESSION['nameaccount'];
                                    $department = $_SESSION['department'];

                                    if (isset($_SESSION['role'])) {
                                        $role = $_SESSION['role'];

                                        if ($role == 'admin' || $role == 'President' || $role == 'Vice President') {
                                            $sql = "SELECT * FROM `contract`";
                                        } elseif (isset($_SESSION['role']) && ($_SESSION['role'] == 'Vice President' || $_SESSION['role'] == 'manager')) {
                                            $sql = "SELECT contract.contract_date, contract.salary, contract.user_id, contract.type, contract.contract_id
                                            FROM `contract` 
                                            INNER JOIN user_data 
                                            ON contract.user_id = user_data.user_id 
                                            WHERE user_data.department = '$department';";
                                        }
                                        if (isset($_SESSION['role']) && ($_SESSION['role'] == 'employee')) {
                                            $sql = "SELECT * FROM `contract` WHERE user_id = '$user_id';";
                                        }
                                        $result = $connect->query($sql);
                                        if ($result->num_rows > 0) {
                                            echo "
                                            <table class='table table-bordered' id='ContractTable' width='100%' cellspacing='0'>
                                                <thead>
                                                    <tr>
                                                        <th>Mã hợp đồng</th>
                                                        <th>User ID</th>
                                                        <th>Ngày bắt đầu</th>
                                                        <th>Lương</th>
                                                        <th>Loại hợp đồng</th>";
                                            if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'President' || $_SESSION['role'] == 'Vice President')) {
                                                echo "<th>Chỉnh sửa</th>";
                                            }
                                            echo "</tr>
                                                </thead>
                                                <tbody>";

                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>" .
                                                    "<td>" . $row["contract_id"] . "</td>" .
                                                    "<td>" . $row["user_id"] . "</td>" .
                                                    "<td>" . $row["contract_date"] . "</td>" .
                                                    "<td>" . $row["salary"] . "</td>" .
                                                    "<td>" . $row["type"] . "</td>";
                                                if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'President'|| $_SESSION['role'] == 'Vice President')) {
                                                    echo " <td>
                                                                <button href='#' class='btn btn-danger' data-toggle='modal' data-target='#deleteContract" . $row['id'] . "'>
                                                                <i class='fa-solid fa-trash'></i>
                                                                </button> 
                                                                <button href='#' class='btn btn-primary' data-toggle='modal' data-target='#updateContract" . $row["id"] . "'>
                                                                    <i class='fa-solid fa-pen-to-square'></i>
                                                                </button>";
                                                }

                                                echo "<div class='modal fade' id='deleteContract" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                                <div class='modal-dialog' role='document'>
                                                                    <div class='modal-content'>
                                                                        <div class='modal-header'>
                                                                            <h5 class='modal-title' id='exampleModalLabel'>Xác nhận xóa hợp đồng: <span style='color: #e74a3b;'>" . $row["user_id"] . "</span></h5>
                                                                            <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                                                                                <span aria-hidden='true'>×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class='modal-body'>Bạn chắc chắn muốn xoá hợp đồng này?</div>
                                                                        <div class='modal-footer'>
                                                                            <button class='btn btn-secondary' type='button' data-dismiss='modal'>Không</button>
                                                                            <form action='delete_contract.php' method='post'>
                                                                                <button class='btn btn-danger' type='submit' name='delete' value='" . $row["id"] . "'>Xoá</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            ";
                                                if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'President')) {
                                                    echo "<div class='modal fade' id='updateContract" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                                                    <div class='modal-dialog' role='document'>
                                                                                        <div class='modal-content'>
                                                                                            <div class='modal-header'>
                                                                                                <h5 class='modal-title' id='exampleModalLabel'>Chỉnh sửa thông tin hợp đồng: <span style='color: #4e73df'>" . $row["user_id"] . "</span></h5>
                                                                                                <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                                                                                                    <span aria-hidden='true'>×</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class='modal-body'>
                                                                                                <form action = 'update_contract.php' method='post'>
                                                                                                    <input class='form-control' type='hidden' name='id' value='" . $row["id"] . "' />
                                                                                                    <div class='input-group mb-3'>
                                                                                                        <div class='input-group-prepend'>
                                                                                                            <span class='input-group-text' id='basic-addon3'>User ID</span>
                                                                                                        </div>
                                                                                                        <input type='text' class='form-control' id='user_id' name='user_id' aria-describedby='basic-addon3' value='" . $row["user_id"] . "'/><br>
                                                                                                    </div>                                                                          
                                                                                                    <div class='input-group mb-3'>
                                                                                                        <div class='input-group-prepend'>
                                                                                                            <span class='input-group-text' id='basic-addon3'>Lương</span>
                                                                                                        </div>
                                                                                                        <input type='text' class='form-control' id='salary' name='salary' aria-describedby='basic-addon3' value='" . $row["salary"] . "' /><br>
                                                                                                    </div>
                                                                                                    <div class='input-group mb-3'>
                                                                                                        <div class='input-group-prepend'>
                                                                                                            <span class='input-group-text' id='basic-addon3'>Loại hợp đồng</span>
                                                                                                        </div>
                                                                                                        <input type='text' class='form-control' id='type' name='type' aria-describedby='basic-addon3' value='" . $row["type"] . "' /><br>
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
                                                echo "</tr>";
                                            }

                                            echo "</tbody></table>";
                                        } else {
                                            echo "<p>Chưa có dữ liệu</p>";
                                        }
                                    } else {
                                        echo "<p>Chưa có dữ liệu</p>";
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
    <script>
        $(document).ready(function() {
            $('#ContractTable').DataTable({
                "lengthMenu": [
                    [1, 3, 5, 7, -1],
                    [1, 3, 5, 7, "All"]
                ],
            });
        });
    </script>
</body>

</html>