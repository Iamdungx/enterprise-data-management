<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8 vi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>HRM</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/base.css">
    <link href="./icons/fontawesome-free-6.1.1-web/css/all.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="./image/icon-image.png">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- Js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
    <style>
        .link_home {
            margin-right: 10px;
            background-color: #9FD7F9;
            color: black;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 10px;
        }

        .blue-box {
            padding: 10px;
            /* Khoảng cách giữa nội dung và viền của ô */
            border-radius: 5px;
            /* Bo tròn viền của ô */
            text-align: center;
            /* Canh giữa nội dung */
            margin: 20px 10px;
        }

        .blue-box h1 {
            color: black;
            /* Màu chữ trắng */
            margin: 0;
            /* Xóa khoảng cách lề */
        }

        #information-table {
            border-collapse: collapse;
            width: 100%;
            height: auto;
        }

        #information-table th,
        #information-table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        #information-table tr:first-child th {
            position: sticky;
            /* Giữ vị trí */
            top: 0;
            /* Vị trí cố định ở trên */
            background-color: #9FD7F9;
            /* Màu nền của hàng đầu tiên */
        }
    </style>
</head>

<body>
    <?php
    session_start();
    require 'connect_database.php';
    mysqli_set_charset($connect, 'UTF8');
    $standard_work_hours = 26 * 8;

    $id = $_GET['id'];
    $month = $_GET['month'] ?? date('m');
    $year = $_GET['year'] ?? date('Y');
    $employeeSql = "SELECT * FROM `user_data` u INNER JOIN `salary_and_bonus` s ON u.id = s.employee_id WHERE u.id = $id";
    $resultEmployee = $connect->query($employeeSql);
    $employee = $resultEmployee->fetch_assoc();
    $user_id = $employee['user_id'];
    $attendanceSql = "SELECT *, TIME_TO_SEC(TIMEDIFF(check_out, check_in)) / 3600 - 1 as total_time FROM `attendance` WHERE user_id = '$user_id' AND MONTH(date) = $month AND YEAR(date) = $year";
    $resultAttendance = $connect->query($attendanceSql);
    $details = [];
    $count = 0;
    $total_hours = 0;
    while ($row = $resultAttendance->fetch_assoc()) {
        $count++;
        $row['index'] = $count;
        $details[] = $row;
        $total_hours += $row['total_time'];
    }
    $connect->close();

    $ot_hours = $total_hours > $standard_work_hours ? $total_hours - $standard_work_hours : 0;
    $salary_normal = $employee['salary'] / $standard_work_hours * $total_hours;
    $salary_ot = $employee['salary'] / $standard_work_hours * $ot_hours * 1.5;
    ?>
    <header class="header">
        <div class="hrm-title">
            <div class="title close">
                <h4>HRM Admin</h4>
            </div>
            <div class="icon-nav close">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <!--header account-->
        <div class="account" id="dropdown">
            <div class="image-account">
                <img class="avatar-account" src="./image/icon-image.png" alt="hrm-icon">
            </div>

            <?php
            if (isset($_SESSION['nameaccount'])) {
                echo "<div class='account-title'>
                        <h4>" . $_SESSION['nameaccount'] . "</h4>
                    </div>";
            }
            ?>


            <div class="icon-account">
                <i class="fa-solid fa-angle-down"></i>
            </div>

            <div class="dropdown-content">
                <form class="form_attendance" action="attendance.php" method="post">
                    <i class="fa-solid fa-calendar-days"></i>
                    <input name="attendance_button" type="submit" value="Chấm công">
                </form>
                <a href="javascript:void(0);" onclick="confirmLogout()">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Đăng xuất
                </a>


            </div>
            <script>
                function confirmLogout() {
                    if (confirm("Bạn có chắc chắn muốn đăng xuất?")) {
                        window.location.href = "logout.php";
                    }
                }
            </script>
        </div>

    </header>

    <div class="grid_system_column close container">
        <!-- 20% -->
        <div class="container-nav_bar">
            <div class="nav_bar-function">
                <div class="nav_bar-function-content close"> <!-- Quản lí nhân viên -->
                    <i class="nav_bar-function-icon fa-solid fa-sitemap fa-lg"></i>
                    <a>Quản lí nhân viên</a>
                    <div class="function-icon_arrow_Manager none">
                        <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                    </div>
                </div>
                <div class="nav_bar-function_child">
                    <ul class="nav_bar-function_child_Manager none">
                        <li class="nav_bar-list-item">
                            <a href="employee_information.php">Quản lý nhân viên</a>
                        </li>
                        <li class="nav_bar-list-item"><a href="salary.php">Điều chỉnh lương</a></li>
                        <li class="nav_bar-list-item"><a href="payroll.php">Bảng lương</a></li>
                        <?php
                        if (isset($_SESSION['role'])) {
                            if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager') {
                                echo '<li class="nav_bar-list-item"><a href="benefit_admin.php">Bảo hiểm, đãi ngộ</a></li>';
                            }
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['role'])) {
                            if ($_SESSION['role'] == 'employee') {
                                echo '<li class="nav_bar-list-item"><a href="benefit.php">Bảo hiểm, đãi ngộ</a> </li>';
                            }
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['role'])) {
                            if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager') {
                                echo '<li class="nav_bar-list-item"><a href="performance.php">Hiệu suất</a></li>';
                            }
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['role'])) {
                            if ($_SESSION['role'] == 'employee') {
                                echo '<li class="nav_bar-list-item"><a href="employee_performance.php">Hiệu suất</a> </li>';
                            }
                        }
                        ?>
                    </ul>
                </div>

            </div>

            <div class="nav_bar-function">
                <div class="nav_bar-function-content close">
                    <i class="nav_bar-function-icon fa-solid fa-calendar-days fa-lg"></i>
                    <a>Báo cáo chấm công</a>
                    <div class="function-icon_arrow_Report none">
                        <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                    </div>
                </div>
                <div class="nav_bar-function_child">
                    <ul class="nav_bar-function_child_Report none">
                        <?php
                        if (isset($_SESSION['role'])) {
                            if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager') {
                                echo '<li class="nav_bar-list-item"><a href="attendance_report.php">Danh sách chấm công</a></li>';
                            }
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['role'])) {
                            if ($_SESSION['role'] == 'employee') {
                                echo '<li class="nav_bar-list-item"><a href="employee_attendance_report.php">Danh sách chấm công</a> </li>';
                            }
                        }
                        ?>
                    </ul>

                </div>

            </div>

            <div class="nav_bar-function">
                <div class="nav_bar-function-content close">
                    <i class="nav_bar-function-icon fa-solid fa-envelopes-bulk fa-lg"></i>
                    <a>Đơn & giải trình</a>
                    <div class="function-icon_arrow_Assignment none">
                        <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                    </div>
                </div>
                <div class="nav_bar-function_child">
                    <ul class="nav_bar-function_child_Assignment none">
                        <?php
                        if (isset($_SESSION['role'])) {
                            if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager') {
                                echo '<li class="nav_bar-list-item"><a href="form_approval.php">Duyệt đơn</a></li>
                                            <li class="nav_bar-list-item"><a href="unexcused.php">Nghỉ không phép</a></li>';
                            }
                        }
                        ?>

                        <?php
                        if (isset($_SESSION['role'])) {
                            if ($_SESSION['role'] == 'employee') {
                                echo '<li class="nav_bar-list-item"><a href="form_submit.php">Gửi đơn</a> </li>';
                            }
                        }
                        ?>

                    </ul>
                </div>

                <?php
                if (isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'admin') {
                        echo '<div class="nav_bar-function">
                                    <div class="nav_bar-function-content close">
                                        <i class="nav_bar-function-icon fa-solid fa-code fa-lg"></i>
                                        <a>Admin Console</a>
                                        <div class="function-icon_arrow_AdminConsole none">
                                            <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                                        </div>
                                    </div>
                                    <div class="nav_bar-function_child">
                                        <ul class="nav_bar-function_child_AdminConsole none">
                                        <li class="nav_bar-list-item"><a class="nav_bar-list-item" href="add_employee.php">Thêm nhân viên</a></li>
                                        <li class="nav_bar-list-item"><a class="nav_bar-list-item" href="check_log.php">Check Log</a></li>
                                        </ul>
                                    </div>
                                </div>';
                    }
                    if ($_SESSION['role'] == 'manager') {
                        echo '<div class="nav_bar-function">
                                    <div class="nav_bar-function-content close">
                                        <i class="nav_bar-function-icon fa-solid fa-code fa-lg"></i>
                                        <a>Manager Console</a>
                                        <div class="function-icon_arrow_AdminConsole none">
                                            <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                                        </div>
                                    </div>
                                    <div class="nav_bar-function_child">
                                        <ul class="nav_bar-function_child_AdminConsole none">
                                            <a class="nav_bar-list-item" href="add_assignment.php">Bàn giao công việc</a>
                                        </ul>
                                    </div>
                                </div>';
                    }
                }

                ?>
            </div>
        </div>
        <div class="form-edit">
            <a class="link_home" href='employee_information.php'>Trang chủ</a>
            <div class="blue-box">
                <h1>Thông tin nhân viên chi tiết</h1>
            </div>
            <div class="form-data_manager-table">
                <table id="information-table">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Position</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <th>Bonus</th>
                        <th>Total Working Hours</th>
                        <th>Standard work Hours</th>
                        <th>OT Hours</th>
                        <th>Salary Normal</th>
                        <th>Salary OT</th>
                        <th>Total earnings</th>
                    </tr>
                    <tr>
                        <td><?php echo $employee['fisrt_name']; ?></td>
                        <td><?php echo $employee['last_name']; ?></td>
                        <td><?php echo $employee['email']; ?></td>
                        <td><?php echo $employee['phone']; ?></td>
                        <td><?php echo $employee['address']; ?></td>
                        <td><?php echo $employee['position']; ?></td>
                        <td><?php echo $employee['department']; ?></td>
                        <td><?php echo $employee['salary']; ?></td>
                        <td><?php echo $employee['bonus']; ?></td>
                        <td><?php echo round($total_hours, 2); ?></td>
                        <td><?php echo $standard_work_hours; ?></td>
                        <td><?php echo round($ot_hours, 2); ?></td>
                        <td><?php echo number_format($salary_normal); ?></td>
                        <td><?php echo number_format($salary_ot); ?></td>
                        <td><?php echo number_format($salary_normal + $salary_ot); ?></td>
                    </tr>
                </table>

                <form action="" method="GET">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <select name="month" id="month">
                        <?php 
                        for($i = 1; $i <= 12; $i++) {
                            $selected = $i == $month ? 'selected' : '';
                            echo "<option value='$i' $selected>Tháng $i</option>";
                        }
                        ?>
                    </select>
                    <select name="year" id="year">
                        <?php 
                        $current_year = date('Y');
                        for($i = $current_year - 3; $i <= $current_year; $i++) {
                            $selected = $i == $year ? 'selected' : '';
                            echo "<option value='$i' $selected>Năm $i</option>";
                        }
                        ?>
                    <input type="submit" value="Tìm kiếm">
                </form>

                <table id="information-table">
                    <tr>
                        <th>STT</th>
                        <th>Ngày</th>
                        <th>Checkin</th>
                        <th>Checkout</th>
                        <th>Total</th>
                    </tr>
                    <?php

                    foreach ($details as $row) {

                    ?>
                        <tr>
                            <td><?php echo $row['index']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['check_in']; ?></td>
                            <td><?php echo $row['check_out']; ?></td>
                            <td><?php echo round($row['total_time'], 2); ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
</body>
<script src="./js/index.js"></script>

</html>