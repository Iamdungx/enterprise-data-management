<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8 vi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hiệu Suất Nhân Viên</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/base.css">
    <link href="./icons/fontawesome-free-6.1.1-web/css/all.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="./image/icon-image.png">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- Js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
</head>
<body>
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
            width: 100%; /* Chiều rộng của bảng là 100% */
            height: 500px;
            border-collapse: collapse; /* Gộp các đường viền của ô */
            table-layout: fixed; /* Cố định chiều rộng cột */
        }
        #information-table tr:first-child th {
            position: sticky; /* Giữ vị trí */
            top: 0; /* Vị trí cố định ở trên */
            background-color: #9FD7F9; /* Màu nền của hàng đầu tiên */
        }
        #information-table th,
        #information-table td {
            border: 1px solid #ddd; /* Đường viền của ô */
            padding: 20px; /* Khoảng cách giữa nội dung và đường viền của ô */
            text-align: left; /* Căn chỉnh văn bản sang trái */
        }
    </style>
    <!-- header -->
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
                session_start();
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
                    <form class="form_attendance" action="attendance.php" method="post">
                        <i class="fa-solid fa-calendar-days"></i>
                        <input name = "attendance_button" type = "submit" value="Chấm công">
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
                        <a>Thông tin chi tiết</a>
                        <div class="function-icon_arrow_Manager none">
                            <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                        </div>
                    </div>
                    <div class="nav_bar-function_child">
                        <ul class="nav_bar-function_child_Manager none">
                            <li class="nav_bar-list-item">
                                <a href="employee_profile.php">Thông tin nhân viên chi tiết</a>
                            </li>
                            <?php
                                    if(isset($_SESSION['role'])){
                                        if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager'){
                                            echo '<li class="nav_bar-list-item"><a href="benefit_admin.php">Bảo hiểm, đãi ngộ</a></li>';
                                        }
                                    }
                                ?>
                                <?php
                                    if(isset($_SESSION['role'])){
                                        if($_SESSION['role'] == 'employee'){
                                            echo '<li class="nav_bar-list-item"><a href="benefit.php">Bảo hiểm, đãi ngộ</a> </li>';
                                        }
                                    }
                                ?>
                                <?php
                                    if(isset($_SESSION['role'])){
                                        if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager'){
                                            echo '<li class="nav_bar-list-item"><a href="performance.php">Hiệu suất</a></li>';
                                        }
                                    }
                                ?>
                                <?php
                                    if(isset($_SESSION['role'])){
                                        if($_SESSION['role'] == 'employee'){
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
                                    if(isset($_SESSION['role'])){
                                        if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager'){
                                            echo '<li class="nav_bar-list-item"><a href="attendance_report.php">Danh sách chấm công</a></li>';
                                        }
                                    }
                                ?>
                                <?php
                                    if(isset($_SESSION['role'])){
                                        if($_SESSION['role'] == 'employee'){
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
                                if(isset($_SESSION['role'])){
                                    if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager'){
                                        echo '<li class="nav_bar-list-item"><a href="form_take_off.php">Đơn xin nghỉ</a></li>
                                        <li class="nav_bar-list-item"><a href="form_change_shift.php">Đơn xin đổi ca</a></li>
                                        <li class="nav_bar-list-item"><a href="form_explanation.php">Đơn giải trình</a></li>
                                        <li class="nav_bar-list-item"><a href="unexcused.php">Nghỉ không phép</a></li>';
                                    }
                                }
                            ?>

                            <?php
                                if(isset($_SESSION['role'])){
                                    if($_SESSION['role'] == 'employee'){
                                        echo '<li class="nav_bar-list-item"><a href="form_submit.php">Gửi đơn</a> </li>';
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
                                    <div class="function-icon_arrow_AdminConsole none">
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
                                    <div class="function-icon_arrow_AdminConsole none">
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
        <a class="link_home" href='employee_dashboard.php'>Trang chủ</a>
        <div class="blue-box">
            <h1>Hiệu suất làm việc</h1>
        </div>
    <div class="form-data_manager-table">
        <table id="information-table">
            <?php
                require 'connect_database.php';
                mysqli_set_charset($connect, 'UTF8');
                $user_id = $_SESSION['nameaccount'];
                
                $sqlSelectInfo = "SELECT user_data.user_id, user_data.fisrt_name, user_data.last_name, performance_employee.rating, 
                performance_employee.date, performance_employee.result, performance_employee.fail_reason , assignment.assignment_type
                FROM user_data 
                INNER JOIN assignment 
                ON user_data.user_id = assignment.user_id
                INNER JOIN performance_employee 
                ON user_data.user_id = performance_employee.user_id 
                WHERE user_data.user_id = '$user_id'";
                $resultSelectInfo = $connect->query($sqlSelectInfo);
                    echo '<tr>
                        <th>ID Employee</th> 
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Assignment Type</th>
                        <th>Result</th>
                        <th>Rating</th>
                        <th>Reason fail</th>
                        <th>Date</th>
                        </tr>';
                        if ($resultSelectInfo->num_rows > 0) {
                            while ($rowSelectInfo = $resultSelectInfo->fetch_assoc()) {
                                echo "<tr>".
                                    "<td>".$rowSelectInfo["user_id"]." </td>".
                                    "<td>".$rowSelectInfo["fisrt_name"]."</td>".
                                    "<td>".$rowSelectInfo["last_name"]."</td>".
                                    "<td>".$rowSelectInfo["assignment_type"]."</td>".
                                    "<td>".$rowSelectInfo["result"]."</td>".
                                    "<td>".$rowSelectInfo["rating"]." </td>".
                                    "<td>".$rowSelectInfo["fail_reason"]." </td>".
                                    "<td>".$rowSelectInfo["date"]." </td>
                                </tr>";
                            }
                        }
                $connect->close();
            ?>
        </table>
    </div>
    <script src="./js/index.js"></script>
</body>