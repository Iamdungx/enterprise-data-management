<?php
    require 'connect_database.php';
    mysqli_set_charset($connect, 'UTF8');
    $sql = "SELECT count(*) as tong_so_ngay_cong, COUNT(CASE WHEN a.total < '08:00:00' THEN 1 ELSE NULL END) as so_ngay_thieu_gio, u.*, s.* FROM `user_data` u INNER JOIN `salary_and_bonus` s ON u.id = s.employee_id INNER JOIN `attendance` a ON u.user_id = a.user_id WHERE a.total > '00:00:00' GROUP BY a.user_id;";
    $result = $connect->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8 vi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            padding: 10px; /* Khoảng cách giữa nội dung và viền của ô */
            border-radius: 5px; /* Bo tròn viền của ô */
            text-align: center; /* Canh giữa nội dung */
            margin: 20px 10px;
        }
        .blue-box h1 {
            color: black; /* Màu chữ trắng */
            margin: 0; /* Xóa khoảng cách lề */
        }
        #information-table {
            border-collapse: collapse;
            width: 100%;
            height: auto;
        }
        #information-table th, #information-table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: canter;
            
        }
        #information-table tr:first-child th {
            position: sticky; /* Giữ vị trí */
            top: 0; /* Vị trí cố định ở trên */
            background-color: #9FD7F9; /* Màu nền của hàng đầu tiên */
        }
    </style>
</head>
<body>
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
                if (isset($_SESSION['nameaccount']))
                {
                    echo "<div class='account-title'>
                        <h4>".$_SESSION['nameaccount']."</h4>
                    </div>";
                }
            ?>


            <div class="icon-account">
                <i class="fa-solid fa-angle-down"></i>
            </div>
            
            <div class="dropdown-content">
                <a href="attendance.php">
                    <i class="fa-solid fa-calendar-days"></i>
                    Chấm Công
                </a>
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
                    <div class="function-icon_arrow_Manager">
                        <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                    </div>
                </div>
                <div class="nav_bar-function_child">
                    <ul class="nav_bar-function_child_Manager none">
                        <li class="nav_bar-list-item">
                            <a href="employee-information.php">Quản lý nhân viên</a>
                        </li>
                        <li class="nav_bar-list-item"><a href="salary.php">Bảng lương</a></li>
                        <li class="nav_bar-list-item"><a href="benefit.php">Bảo hiểm, đãi ngộ</a></li>
                        <li class="nav_bar-list-item"><a href="performance.php">Hiệu suất</a></li>
                    </ul>
                </div>

            </div>

            <div class="nav_bar-function">
                <div class="nav_bar-function-content close">
                    <i class="nav_bar-function-icon fa-solid fa-calendar-days fa-lg"></i>
                    <a>Báo cáo chấm công</a>
                    <div class="function-icon_arrow_Report">
                        <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                    </div>
                </div>
                <div class="nav_bar-function_child">
                    <ul class="nav_bar-function_child_Report none">
                        <li class="nav_bar-list-item"><a href="attendance_report.php">Danh sách chấm công</a></li>
                    </ul>

                </div>

            </div>

            <div class="nav_bar-function">
                <div class="nav_bar-function-content close">
                    <i class="nav_bar-function-icon fa-solid fa-envelopes-bulk fa-lg"></i>
                    <a>Đơn & giải trình</a>
                    <div class="function-icon_arrow_Assignment">
                        <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                    </div>
                </div>
                <div class="nav_bar-function_child">
                    <ul class="nav_bar-function_child_Assignment none">
                        <?php
                            if(isset($_SESSION['role'])){
                                if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager'){
                                    echo '<li class="nav_bar-list-item"><a href="approve_form.php">Duyệt đơn</a></li>
                                    <li class="nav_bar-list-item"><a href="unexcused.php">Nghỉ không phép</a></li>';
                                }
                            }
                        ?>

                        <?php
                            if(isset($_SESSION['role'])){
                                if($_SESSION['role'] == 'employee'){
                                    echo '<li class="nav_bar-list-item"><a href="form_employee.php">Gửi đơn</a> </li>';
                                }
                            }
                        ?>
                        
                    </ul>
                </div>
                
                <?php
                    if(isset($_SESSION['role'])){
                        if($_SESSION['role'] == 'admin' ){
                            echo '<div class="nav_bar-function">
                            <div class="nav_bar-function-content close">
                                <i class="nav_bar-function-icon fa-solid fa-code fa-lg"></i>
                                <a>Admin Console</a>
                                <div class="function-icon_arrow_AdminConsole">
                                    <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                                </div>
                            </div>
                            <div class="nav_bar-function_child">
                                <ul class="nav_bar-function_child_AdminConsole none">
                                    <a class="nav_bar-list-item" href="create-accounts.php">Hiệu suất</a>
                                </ul>
                            </div>
                        </div>';
                        }
                        if($_SESSION['role'] == 'manager' ){
                            echo '<div class="nav_bar-function">
                            <div class="nav_bar-function-content close">
                                <i class="nav_bar-function-icon fa-solid fa-code fa-lg"></i>
                                <a>Manager Console</a>
                                <div class="function-icon_arrow_AdminConsole">
                                    <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                                </div>
                            </div>
                            <div class="nav_bar-function_child">
                                <ul class="nav_bar-function_child_AdminConsole none">
                                    <a class="nav_bar-list-item" href="performance_detail.php">Bàn giao công việc</a>
                                </ul>
                            </div>
                        </div>';
                        }
                    }
                    
                ?>


            </div>
        </div>
    <div class="form-edit">
        <a class="link_home" href='employee-information.php'>Trang chủ</a>
        <div class="blue-box">
            <h1>Bảng lương nhân viên</h1>
        </div>
    <div class="form-data_manager-table">
        <table id="information-table">
            <tr>
                <th>Họ và tên</th>
                <th>Lương cơ bản</th>
                <th>Phụ cấp</th>
                <th>Ngày công</th>
                <th>Ngày làm thiếu giờ</th>
                <th>Tổng lương</th>
                <th>Chi tiết</th>
            </tr>
            <?php
                while ($row = $result->fetch_assoc()) {
                    $cong_thuc_te = 30;
                    $salary = $row['salary'];
                    $total_salary = $salary * $row['tong_so_ngay_cong'] / $cong_thuc_te - ($row['so_ngay_thieu_gio'] * 100000) + $row['bonus'];
            ?>
            <tr>
                <td><?php echo $row['fisrt_name'] . " " . $row['last_name']; ?></td>
                <td><?php echo number_format($row['salary']); ?></td>
                <td><?php echo number_format($row['bonus']); ?></td>
                <td><?php echo $row['tong_so_ngay_cong']. "/". $cong_thuc_te; ?></td>
                <td><?php echo $row['so_ngay_thieu_gio']; ?></td>
                <td><?php echo number_format($total_salary); ?></td>
                <td><a href='payroll_details.php?id=<?php echo $row["employee_id"]; ?>'><i class="fa-solid fa-bars"></i></a></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
        
</body>
<script src="./js/index.js"></script>
</html>