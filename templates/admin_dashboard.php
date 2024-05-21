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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>        
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

        <div class="container">

            <div class="grid_system_column close">
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
                                        if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager' || $_SESSION['role'] == 'President' || $_SESSION['role'] == 'Vice President'){
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
                                        if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager' || $_SESSION['role'] == 'President' || $_SESSION['role'] == 'Vice President'){
                                            echo '<li class="nav_bar-list-item"><a href="form_approval.php">Duyệt đơn</a></li>
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
                                            <li class="nav_bar-list-item"><a class="nav_bar-list-item" href="add_employee.php">Thêm nhân viên</a></li>
                                            <li class="nav_bar-list-item"><a class="nav_bar-list-item" href="check_log.php">Check Log</a></li>
                                        </ul>
                                    </div>
                                </div>';
                                }
                                if($_SESSION['role'] == 'manager' || $_SESSION['role'] == 'President' || $_SESSION['role'] == 'Vice President'){
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
                                            <li class="nav_bar-list-item"><a class="nav_bar-list-item" href="add_assignment.php">Bàn giao công việc</a></li>
                                        </ul>
                                    </div>
                                </div>';
                                }
                            }
                            
                        ?>
                    </div>
                </div>
                <!-- 80%  -->
    
                <div class="dashboard-container">
                    <div class="flex-container">
    
                        
                        <div class="total-report-monthly" onclick="window.location.href='performance.php'">
                            <h4>Trạng Thái DEADLINE</h4>
                                <?php
                                    require "connect_database.php";
                                    mysqli_set_charset($connect, 'UTF8');
    
                                    $sql_Dat = ("SELECT COUNT(*) AS soLuongDat FROM performance_employee where result ='Completed'");
                                    $sql_khongDat = ("SELECT COUNT(*) AS soLuongKhongDat FROM performance_employee WHERE result != 'Completed'");
                                    $result_Dat = $connect->query($sql_Dat);
                                    $result_khongDat = $connect->query($sql_khongDat);
    
                                    if ($result_Dat->num_rows > 0) {
                                        while($row_Dat = $result_Dat->fetch_assoc()) {
                                            echo "<h1>" . $row_Dat["soLuongDat"] . "</h1>";
                                            echo "<div>Hoàn thành</div>";
                                        }
                                    } 
                                    if ($result_Dat->num_rows > 0) {
                                        while($row_khongDat = $result_khongDat->fetch_assoc()) {
                                            echo "<h1>" . $row_khongDat["soLuongKhongDat"] . "</h1>";
                                            echo "<div>Không hoàn thành</div>";
                                        }
                                    }else {
                                        echo "Không có dữ liệu";
                                    }
                                ?>
                        </div>
                        <div class="total-employee" onclick="window.location.href='employee_information.php'">
                            <h4>TỔNG NHÂN VIÊN</h4>
    
                            <?php
                                require "connect_database.php";
                                mysqli_set_charset($connect, 'UTF8');
    
                                $sql_totalEmployee = ("SELECT COUNT(*) AS tongNhanVien FROM user_data");
                                $result_totalEmployee = $connect->query($sql_totalEmployee);
    
                                if ($result_totalEmployee->num_rows > 0) {
                                    while($row_totalEmployee = $result_totalEmployee->fetch_assoc()) {
                                        echo "<h1 style='padding: 10px'>" . $row_totalEmployee["tongNhanVien"] . "</h1>";
                                        echo "<div>Đang làm việc<br>tại công ty</div>";
                                    }
                                } else {
                                    echo "Không có dữ liệu";
                                }
                            ?>
    
                        </div>  
                    
                        <div class="total-form" onclick="window.location.href='form_approval.php'">
                            <h4>Thống kê số đơn yêu cầu</h4>
                            <div class="formSystem">

                                <?php
                                    require "connect_database.php";
                                    mysqli_set_charset($connect, 'UTF8');
    
                                    $sql_totalForm = ("SELECT COUNT(*) AS tongSoDon FROM form");
                                    $sql_duyet = ("SELECT COUNT(*) AS soLuongDuyet FROM form WHERE status ='Approved'");
                                    $sql_chuaDuyet = ("SELECT COUNT(*) AS soLuongChoDuyet FROM form WHERE status != 'Approved'");
                                    $sql_choDuyet;
    
                                    $result_totalForm = $connect->query($sql_totalForm);
                                    $result_duyet = $connect->query($sql_duyet);
                                    $result_chuaDuyet = $connect->query($sql_chuaDuyet);
    
                                    $row_duyet = $result_duyet->fetch_assoc();
                                    $row_chuaDuyet = $result_chuaDuyet->fetch_assoc();
    
                                    if ($result_totalForm->num_rows > 0) {
                                        while($row_totalForm = $result_totalForm->fetch_assoc()) {
                                            echo "<div class='thongKeSoDon'>
                                                    <h1 style='padding: 10px'>" . $row_totalForm["tongSoDon"] . "</h1></div>";
                                            echo "<div class='trangThaiDuyetDon'>
                                                        <p  style='font-size: 14px; line-height: 28px; font-weight: 400; background-color: rgb(14 255 0 / 77%); border-radius: 6px; padding: 4px 0px; text-align: center; margin-top: 12px;'>"
                                                            . $row_duyet['soLuongDuyet']. " duyệt
                                                        </p>
                                                        <br>
                                                    <p style='font-size: 14px; line-height: 28px; font-weight: 400; background-color: rgb(255 252 0 / 66%); border-radius: 6px; padding: 4px 8px; text-align: center; margin-bottom: 12px;'>" 
                                                            . $row_chuaDuyet['soLuongChoDuyet'] . 
                                                
                                                    " chờ duyệt</p>
                                                </div>";
                                        }
                                    }
                                ?>
                            </div>
                        
                        </div>
                        <div class="total-form">
                            <h4>Thống kê số đơn yêu cầu</h4>
                                <?php
                                    require "connect_database.php";
                                    mysqli_set_charset($connect, 'UTF8');
    
                                    $sql_totalForm = ("SELECT COUNT(*) AS tongSoDon FROM form");
                                    $sql_duyet = ("SELECT COUNT(*) AS soLuongDuyet FROM form WHERE status ='Đã duyệt'");
                                    $sql_chuaDuyet = ("SELECT COUNT(*) AS soLuongChoDuyet FROM form WHERE status != 'Đã Duyệt'");
                                    $sql_choDuyet;
    
                                    $result_totalForm = $connect->query($sql_totalForm);
                                    $result_duyet = $connect->query($sql_duyet);
                                    $result_chuaDuyet = $connect->query($sql_chuaDuyet);
    
                                    $row_duyet = $result_duyet->fetch_assoc();
                                    $row_chuaDuyet = $result_chuaDuyet->fetch_assoc();
    
                                    if ($result_totalForm->num_rows > 0) {
                                        while($row_totalForm = $result_totalForm->fetch_assoc()) {
                                            echo "<div class='thongKeSoDon'>
                                                    <h1 style='padding: 10px'>" . $row_totalForm["tongSoDon"] . "</h1></div>";
                                            echo "<div class='trangThaiDuyetDon'>
                                                        <p  style='font-size: 14px; line-height: 18px; font-weight: 400; background-color: rgb(203 255 200); border-radius: 6px; padding: 4px 0px; text-align: center;'>"
                                                            . $row_duyet['soLuongDuyet']. " duyệt
                                                        </p>
                                                        <br>
                                                    <p style='font-size: 14px; line-height: 18px; font-weight: 400; background-color: rgb(255 215 215); border-radius: 6px; padding: 4px 0px; text-align: center;'>" 
                                                            . $row_chuaDuyet['soLuongChoDuyet'] . 
                                                
                                                    " chờ duyệt</p>
                                                </div>";
                                        }
                                    }
                                ?>
                        
                        </div>
                        <div class="total-form">
                            <h4>Thống kê số đơn yêu cầu</h4>
                                <?php
                                    require "connect_database.php";
                                    mysqli_set_charset($connect, 'UTF8');
    
                                    $sql_totalForm = ("SELECT COUNT(*) AS tongSoDon FROM form");
                                    $sql_duyet = ("SELECT COUNT(*) AS soLuongDuyet FROM form WHERE status ='Đã duyệt'");
                                    $sql_chuaDuyet = ("SELECT COUNT(*) AS soLuongChoDuyet FROM form WHERE status != 'Đã Duyệt'");
                                    $sql_choDuyet;
    
                                    $result_totalForm = $connect->query($sql_totalForm);
                                    $result_duyet = $connect->query($sql_duyet);
                                    $result_chuaDuyet = $connect->query($sql_chuaDuyet);
    
                                    $row_duyet = $result_duyet->fetch_assoc();
                                    $row_chuaDuyet = $result_chuaDuyet->fetch_assoc();
    
                                    if ($result_totalForm->num_rows > 0) {
                                        while($row_totalForm = $result_totalForm->fetch_assoc()) {
                                            echo "<div class='thongKeSoDon'>
                                                    <h1 style='padding: 10px'>" . $row_totalForm["tongSoDon"] . "</h1></div>";
                                            echo "<div class='trangThaiDuyetDon'>
                                                        <p  style='font-size: 14px; line-height: 18px; font-weight: 400; background-color: rgb(203 255 200); border-radius: 6px; padding: 4px 0px; text-align: center;'>"
                                                            . $row_duyet['soLuongDuyet']. " duyệt
                                                        </p>
                                                        <br>
                                                    <p style='font-size: 14px; line-height: 18px; font-weight: 400; background-color: rgb(255 215 215); border-radius: 6px; padding: 4px 0px; text-align: center;'>" 
                                                            . $row_chuaDuyet['soLuongChoDuyet'] . 
                                                
                                                    " chờ duyệt</p>
                                                </div>";
                                        }
                                    }
                                ?>
                        
                        </div>
                        <div class="total-form">
                            <h4>Thống kê số đơn yêu cầu</h4>
                                <?php
                                    require "connect_database.php";
                                    mysqli_set_charset($connect, 'UTF8');
    
                                    $sql_totalForm = ("SELECT COUNT(*) AS tongSoDon FROM form");
                                    $sql_duyet = ("SELECT COUNT(*) AS soLuongDuyet FROM form WHERE status ='Đã duyệt'");
                                    $sql_chuaDuyet = ("SELECT COUNT(*) AS soLuongChoDuyet FROM form WHERE status != 'Đã Duyệt'");
                                    $sql_choDuyet;
    
                                    $result_totalForm = $connect->query($sql_totalForm);
                                    $result_duyet = $connect->query($sql_duyet);
                                    $result_chuaDuyet = $connect->query($sql_chuaDuyet);
    
                                    $row_duyet = $result_duyet->fetch_assoc();
                                    $row_chuaDuyet = $result_chuaDuyet->fetch_assoc();
    
                                    if ($result_totalForm->num_rows > 0) {
                                        while($row_totalForm = $result_totalForm->fetch_assoc()) {
                                            echo "<div class='thongKeSoDon'>
                                                    <h1 style='padding: 10px'>" . $row_totalForm["tongSoDon"] . "</h1></div>";
                                            echo "<div class='trangThaiDuyetDon'>
                                                        <p  style='font-size: 14px; line-height: 18px; font-weight: 400; background-color: rgb(203 255 200); border-radius: 6px; padding: 4px 0px; text-align: center;'>"
                                                            . $row_duyet['soLuongDuyet']. " duyệt
                                                        </p>
                                                        <br>
                                                    <p style='font-size: 14px; line-height: 18px; font-weight: 400; background-color: rgb(255 215 215); border-radius: 6px; padding: 4px 0px; text-align: center;'>" 
                                                            . $row_chuaDuyet['soLuongChoDuyet'] . 
                                                
                                                    " chờ duyệt</p>
                                                </div>";
                                        }
                                    }
                                ?>
                        
                        </div>
                    </div>
                    <div class="chart-box">
                        <div class="chart-container">
                            <canvas id="completed-quantity" style="max-width: 320px; width: 100%; margin: 0 0 0 38px;"></canvas>
                        </div>
                        <div class="empty1">
    
                        </div>
                    </div>
                        <?php
                            require "connect_database.php";
                            mysqli_set_charset($connect, 'UTF8');
    
                            $sql_Dat = ("SELECT COUNT(*) AS soLuongDat FROM performance_employee where result ='Completed'");
                            $sql_khongDat = ("SELECT COUNT(*) AS soLuongKhongDat FROM performance_employee WHERE result != 'Completed'");
                            $result_Dat = $connect->query($sql_Dat);
                            $result_khongDat = $connect->query($sql_khongDat);
    
                            if ($result_Dat->num_rows > 0) {
                                $row_Dat = $result_Dat->fetch_assoc();
                            } 
                            if ($result_Dat->num_rows > 0) {
                                $row_khongDat = $result_khongDat->fetch_assoc(); 
                            }
    
                            $yValues_ReportMonthly = array();
    
                            $yValues_ReportMonthly[] = $row_Dat['soLuongDat'];
                            $yValues_ReportMonthly[] = $row_khongDat['soLuongKhongDat'];
                        ?>
    
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
                        <script>
                            var xValues_ReportMonthly = ['Đạt', 'Không Đạt'];
                            var yValues_ReportMonthly = <?php echo json_encode($yValues_ReportMonthly); ?>;
                            var barColors_ReportMonthly = ["#4EEE94", "#FF6A6A"];
    
                            const ctx = document.getElementById('completed-quantity');
    
                            new Chart(ctx, {
                                type: "doughnut",
                                data: {
                                    labels: xValues_ReportMonthly,
                                    datasets: [{
                                        backgroundColor: barColors_ReportMonthly,
                                        data: yValues_ReportMonthly
                                    }]
                                },
                                options: {
                                    plugins: { 
                                        subtitle: {
                                            display: true,
                                            text: "Thống kê số lượng hoàn thành chỉ tiêu."
                                        }
                                    }
                                }
                            });
                        </script>
            </div>  
        </div>
    </body>
        <script src="./js/index.js"></script>
    </html>