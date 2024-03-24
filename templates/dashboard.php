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
        <!-- Js -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
    </head>
    <body>
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

use function PHPSTORM_META\sql_injection_subst;

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
                                <a href="emplpyee_profile.php">Thông tin nhân viên chi tiết</a>
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
                            <li class="nav_bar-list-item">Báo cáo theo tuần</li>
                            <li class="nav_bar-list-item">Danh sách ca</li>
                            <li class="nav_bar-list-item">Báo cáo theo tháng</li>
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
            
            <div class="information-box">
                <div class="flex-container">
                    <div class="total-employee">
                        <h4>TỔNG NHÂN VIÊN</h4>

                        <?php
                                require "connect_database.php";
                                mysqli_set_charset($connect, 'UTF8');

                                $sql_totalEmployee = ("SELECT COUNT(*) AS tongNhanVien FROM user_data");
                                $result_totalEmployee = $connect->query($sql_totalEmployee);

                                if ($result_totalEmployee->num_rows > 0) {
                                    while($row_totalEmployee = $result_totalEmployee->fetch_assoc()) {
                                        echo "<h2>" . $row_totalEmployee["tongNhanVien"] . "</h2>";
                                        echo "<p>ĐANG LÀM VIỆC TẠI CÔNG TY</p>";
                                    }
                                } else {
                                    echo "Không có dữ liệu";
                                }
                            ?>

                    </div>
                    <div class="total-report-monthly">
                        <h4>Trạng Thái DEADLINE</h4>
                            <?php
                                require "connect_database.php";
                                mysqli_set_charset($connect, 'UTF8');

                                $sql_Dat = ("SELECT COUNT(*) AS soLuongDat FROM performance_employee where rating ='Đạt'");
                                $sql_khongDat = ("SELECT COUNT(*) AS soLuongKhongDat FROM performance_employee WHERE rating != 'Đạt'");
                                $result_Dat = $connect->query($sql_Dat);
                                $result_khongDat = $connect->query($sql_khongDat);

                                if ($result_Dat->num_rows > 0) {
                                    while($row_Dat = $result_Dat->fetch_assoc()) {
                                        echo "<h1>" . $row_Dat["soLuongDat"] . "</h1>";
                                        echo "<p>Hoàn thành</p>";
                                    }
                                } 
                                if ($result_Dat->num_rows > 0) {
                                    while($row_khongDat = $result_khongDat->fetch_assoc()) {
                                        echo "<h1>" . $row_khongDat["soLuongKhongDat"] . "</h1>";
                                        echo "<p>Không hoàn thành deadline</p>";
                                    }
                                }else {
                                    echo "Không có dữ liệu";
                                }
                            ?>

                    </div>
                </div>
            </div>
    <style>
        .information-box {
            text-align: center;
        }

        .flex-container {
            display: flex; 
            /* justify-content: space-around; */
            margin-top: 50px;
        }
        .total-employee {
            width: auto;
            height: auto;
        }
        .total-report-monthly{
            display: block;
            width: auto;
            height: auto;
        }
        .total-report-monthly,
        .total-employee {
            padding: 5px 10px 5px 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            margin: 0 10px;
        }
    </style>
    </body>
        <script src="./js/index.js"></script>
    </html>
