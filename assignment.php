<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Công việc</title>

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

            <!-- Nav Item - Pages Collapse Menu -->

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

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Thông tin cá nhân
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Chấm công
                                </a>
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
                    <h1 class="h3 mb-2 text-gray-800">Công việc</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Công việc chưa hoàn thành</h6>
                        </div>
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <?php
                                        require 'connect_database.php';
                                        $user_id =  $_SESSION['nameaccount'];
                                        $sql = "SELECT user_data.fisrt_name, user_data.last_name, assignment.user_id, assignment.deadline, assignment.assignment_type, 
                                                assignment.status, assignment.id, assignment.create_date
                                                FROM user_data 
                                                INNER JOIN assignment 
                                                ON user_data.user_id = assignment.user_id
                                                WHERE assignment.user_id = '$user_id' and assignment.status = 'Incomplete'";
                                        $result = $connect->query($sql);

                                        if ($result->num_rows > 0) {
                                            echo "<thead>
                                                <tr> 
                                                <th>Chọn</th>
                                                <th>Mã nhân viên nhận</th>
                                                <th>Ngày giao</th>
                                                <th>Hạn</th>
                                                <th>Trạng thái</th>
                                                <th>Công việc nhận</th>
                                                <th>Chi tiết</th>
                                            </tr>
                                            </thead>";

                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tbody>
                                                    <tr><td> <input type=checkbox name = 'checkbox[]' value='" . $row['id'] . "'>" . "</td>" .
                                                    "<td>" . $row["user_id"] . "</td>" .
                                                    "<td>" . $row["create_date"] . "</td>" .
                                                    "<td>" . $row["deadline"] . "</td>" .
                                                    "<td>" . $row["status"] . "</td>" .
                                                    "<td>" . $row["assignment_type"] . "</td>" .
                                                    "<td>" . $row["details"] . "</td>
                                                    </tbody>";
                                            }
                                        } else {
                                            echo "<h3 class='text-center'>Không có nhiệm vụ nào được giao</h3>";
                                        }
                                        ?>
                                    </table>
                                    <?php
                                    require 'connect_database.php';
                                    if (isset($_POST['completed'])) {
                                        if (isset($_POST['checkbox'])) {
                                            $user_id =  $_SESSION['nameaccount'];
                                            $checkedIds = $_POST['checkbox'];
                                            $checkedCount = count($_POST['checkbox']);

                                            $sqlAssignmentStatus = "SELECT COUNT(*) AS total FROM assignment WHERE assignment.user_id = '$user_id' and assignment.status = 'Incomplete'";
                                            $result = $connect->query($sqlAssignmentStatus);
                                            $row = $result->fetch_assoc();
                                            $totalCount = $row['total'];

                                            if ($checkedCount == $totalCount) {
                                                $date = date("Y-m-d");
                                                $result = "Hoàn thành";
                                                $rating = "Hoàn thành đúng tiến độ";


                                                $performance_employeeAdd = "INSERT INTO report_assignment (`user_id`, `status`, `rate`) VALUES ('$user_id', '$result', '$rating')";
                                                if ($connect->query($performance_employeeAdd) === TRUE) {
                                                    echo "Đã hoàn gửi báo cáo<br>";
                                                } else {
                                                    echo "Lỗi: " . $connect->error . "<br>";
                                                }
                                            }
                                            $checkedIdsString = implode(',', $checkedIds);
                                            $sqlAssignmentStatusUpdate = "UPDATE `assignment` SET `status`='Completed' WHERE id IN ($checkedIdsString)";
                                            if ($connect->query($sqlAssignmentStatusUpdate) === TRUE) {
                                            } else {
                                                echo "Lỗi: " . $connect->error . "<br>";
                                            }
                                        } else {
                                            echo "Chưa chọn công việc nào để hoàn thành!";
                                        }
                                    }
                                    if (isset($_POST['completed'])) {
                                        $user_id =  $_SESSION['nameaccount'];
                                        $date = date("Y-m-d");
                                        $resultFail = "Chưa hoàn thành";
                                        $reasonFail = $_POST['reason'];
                                        $rating = "Hoàn thành chậm tiến độ";

                                        $performance_employeeAdd = "INSERT INTO report_assignment (`user_id`, `status`, `report_form`, `rate`) VALUES ('$user_id', '$resultFail', '$reasonFail', '$rating')";
                                        if ($connect->query($performance_employeeAdd) === TRUE) {
                                            echo "Đã gửi báo cáo thành công!<br>";
                                        } else {
                                            echo "Lỗi: " . $connect->error . "<br>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <div>
                                    <a href="#" class="btn btn-success btn-icon-split" data-toggle='modal' data-target='#submitReport'>
                                        <span class="icon text-white-50">
                                            <i class="fas fa-user-plus"></i>
                                        </span>
                                        <span class="text">Hoàn thành công việc</span>
                                    </a>
                                </div>
                                <!-- <input class="btn btn-success" type="submit" value="Hoàn thành công việc" name="completed"> -->
                            </div>

                            <!--Gửi báo cáo Modal-->
                            <div class='modal fade' id='submitReport' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModalLabel'>Báo cáo tiến độ</h5>
                                            <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>×</span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <form method='post'>
                                                <div class='input-group mb-3'>
                                                    <div class='input-group-prepend'>
                                                        <span class='input-group-text' id='basic-addon3'>Nhập báo cáo</span>
                                                    </div>
                                                    <input type='text' class='form-control' id='reason' name='reason' aria-describedby='basic-addon3' /><br>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button class='btn btn-secondary' type='button' data-dismiss='modal'>Không</button>
                                                    <!-- <input type='submit' name='submit_reason' value="Gửi báo cáo" class='btn btn-success'> -->
                                                    <input class="btn btn-success" type="submit" value="Hoàn thành công việc" name="completed">
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Công việc đã hoàn thành</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <?php
                                require 'connect_database.php';
                                $user_id =  $_SESSION['nameaccount'];
                                $sql = "SELECT user_data.fisrt_name, user_data.last_name, assignment.user_id, assignment.deadline, assignment.assignment_type, 
                                            assignment.status, assignment.id, assignment.create_date
                                            FROM user_data 
                                            INNER JOIN assignment 
                                            ON user_data.user_id = assignment.user_id
                                            WHERE assignment.user_id = '$user_id' and assignment.status = 'Completed'";
                                $result = $connect->query($sql);

                                if ($result->num_rows > 0) {
                                    echo "<thead>
                                            <tr> 
                                            <th>Mã nhân viên</th>
                                            <th>Nhiệm vụ</th>
                                            <th>Ngày giao</th>
                                            <th>Hạn</th>
                                            <th>Trạng thái</th>
                                            <th>Chi tiết</th>
                                        </tr>
                                        </thead>";

                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tbody>
                                                <td>" . $row["user_id"] . "</td>" .
                                            "<td>" . $row["assignment_type"] . "</td>" .
                                            "<td>" . $row["create_date"] . "</td>" .
                                            "<td>" . $row["deadline"] . "</td>" .
                                            "<td>" . $row["status"] . "</td>" .
                                            "<td>" . $row["details"] . "</td>
                                                </tbody>";
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
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