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
            <!-- 80%  -->

            <div class="dashboard-container">
            <div class="dashboard-grid-info">
                <div class="dashboard-information">
                    <div class="dashboard-information_header">
                        <p>Thông tin nhân viên</p>
                    </div>
                    <?php
                        echo '<div class="dashboard-information_containner">';
                            echo '<div class="dashboard-information_containner_field">';
                                echo '<p>Mã Nhân Viên: </p>';
                                echo '<p>Họ: </p>';
                                echo '<p>Tên: </p>';
                                echo '<p>Ngày sinh:</p>';
                                echo '<p>Giới tính: </p>';
                                echo '<p>Điện thoại: </p>';
                                echo '<p>Email: </p>';
                                echo '<p>Phòng ban: </p>';
                                echo '<p>Vị trí: </p>';
                                echo '<p>Chức vụ: </p>';
                            echo '</div>';

                            require 'connect_database.php';
                            mysqli_set_charset($connect, 'UTF8');
                
                            $user_id = $_SESSION['nameaccount']; 

                            $sql = "SELECT * FROM user_data WHERE user_id='$user_id'";
                            $result = $connect->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<div class="dashboard-information_containner_detail">';
                                        echo '<p>' . $row["user_id"] . '</p>';
                                        echo '<p>' . $row["fisrt_name"] . '</p>';
                                        echo '<p>' . $row["last_name"] . '</p>';
                                        echo '<p>' . $row["date_of_birth"] . '</p>';
                                        echo '<p>' . $row["gender"] . '</p>';
                                        echo '<p>' . $row["phone"] . '</p>';
                                        echo '<p>' . $row["email"] . '</p>';
                                        echo '<p>' . $row["department"] . '</p>';
                                        echo '<p>' . $row["position"] . '</p>';
                                        echo '<p> Nhân viên </p>';
                                    echo '</div>';
                                }
                            }
                            $sql = "SELECT user_image FROM user_data WHERE user_id='$user_id'";
                            $result = $connect->query($sql);

                            if($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $user_image = $row["user_image"];
                            }
                            
                            echo '<div class="dashboard-information_containner_image">';
                            if(isset($user_image) && !empty($user_image)) {
                                echo '<img class="avatar-user" src="data:image/jpeg;base64,'.base64_encode($user_image).'" alt="User Image">';
                            } else {
                                echo '<img class="no-image" src="./image/no-picture-available-icon.png" alt="NO IMAGE" style="width: 150px; height: 200px;">';
                            }
                            echo '</div>';
                        echo '</div>';                    
                    ?>
                </div>
                    <div class="dashboard-profile">
                        <div class="dashboard-profile_header">
                            <p>Hồ sơ nhân viên</p>
                        </div>
                        <div class="dashboard-profile_containner">
                        <div class="dashboard-profile_containner_field">
                            <p>Trình độ học vấn: </p>
                            <p>Kinh nghiệm làm việc: </p>
                            <p>Chứng chỉ: </p>
                        </div>
                        <?php
                    
                        require 'connect_database.php';
                            mysqli_set_charset($connect, 'UTF8');
                
                            $user_id = $_SESSION['nameaccount']; 

                            $sql = "SELECT education, work_exp, certification FROM employee_profile WHERE user_id='$user_id'";
                            $result = $connect->query($sql);
                            
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '
                                    <div class="dashboard-profile_containner_detail">
                                    <p>' . ($row["education"] !== null && $row["education"] !== '' ? $row["education"] : 'Không có thông tin') . '</p>
                                    <p>' . ($row["work_exp"] !== null && $row["work_exp"] !== '' ? $row["work_exp"] : 'Không có thông tin') . '</p>
                                    <p>' . ($row["certification"] !== null && $row["certification"] !== '' ? $row["certification"] : 'Không có thông tin') . '</p>
                                </div>';
                                }
                            }
                        echo'    
                        </div>';
                        ?>
                    </div>
                    <div class="dashboard-benefit">
                        <div class="dashboard-benefit_header">
                                <p>Bảo hiểm nhân viên</p>
                            </div>
                            <?php
                            echo '<div class="dashboard-benefit_containner">
                                <div class="dashboard-benefit_containner_detail">
                                    <p>Bảo hiểm y tế: </p>
                                    <p>Bảo hiểm nhân thọ: </p>
                                    <p>Khác: </p>
                                </div>';
                                require 'connect_database.php';
                            mysqli_set_charset($connect, 'UTF8');
                
                            $user_id = $_SESSION['nameaccount']; 

                            $sql = "SELECT health_insurance, life_insurance, other FROM benefit WHERE user_id='$user_id'";
                            $result = $connect->query($sql);
                            
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '
                                    <div class="dashboard-benefit_containner_detail">
                                    <p>' . ($row["health_insurance"] !== null && $row["health_insurance"] !== '' ? $row["health_insurance"] : 'Không có thông tin') . '</p>
                                    <p>' . ($row["life_insurance"] !== null && $row["life_insurance"] !== '' ? $row["life_insurance"] : 'Không có thông tin') . '</p>
                                    <p>' . ($row["other"] !== null && $row["other"] !== '' ? $row["other"] : 'Không có thông tin') . '</p>
                                </div>';
                                }
                            }
                            echo '</div>';
                            ?>
                        </div>
                    </div>
                <div class="dashboard-grid-active">
                    <div class="dashboard-notice">
                        <span>Nhắc nhở mới, chưa xem</span>
                        <div class="quanlity-notice">
                            <span>1</span>
                            <i class="fa-regular fa-bell"></i>
                        </div>
                        <a href="#">Xem chi tiết</a>
                    </div>
                    <div class="dashboard-list">
                        <div class="dashboard-assignment">
                            <div class="dashboard-assignment_content">
                                <span>Công việc</span>
                                <div class="quanlity-notice">
                                    <span>
                                        <?php
                                            require 'connect_database.php';
                                            mysqli_set_charset($connect, 'UTF8');   
                                            $user_id =  $_SESSION['nameaccount'];

                                            $sql = "SELECT COUNT(*) AS total FROM assignment WHERE assignment.user_id = '$user_id' and assignment.status = 'Chưa hoàn thành'";
                                            $result = $connect->query($sql);
                                            $row = $result->fetch_assoc();
                                            $totalCount = $row['total'];

                                            echo "$totalCount";
                                        ?>
                                    </span>
                                    <i class="fa-solid fa-briefcase"></i>
                                </div>
                                <a href="assignment.php">Xem chi tiết</a>
                            </div>
                        </div>

                        <div class="dashboard-salary">
                            <div class="dashboard-salary_content">
                                <span>Lương</span>
                            
                                <?php
                                    require 'connect_database.php';
                                    mysqli_set_charset($connect, 'UTF8');
                                    $date = date("m");
                                    $user_id = isset($_SESSION['nameaccount']) ? $_SESSION['nameaccount'] : null;
                                    if ($user_id !== null) {
                                        $sqlSelectTWD = "SELECT count(*) as total_workDay, 
                                                                COUNT(CASE WHEN a.total < '08:00:00' THEN 1 ELSE NULL END) as total_dayLackingHours, 
                                                                u.*, s.* 
                                                        FROM `user_data` u 
                                                        INNER JOIN `salary_and_bonus` s ON u.id = s.employee_id 
                                                        INNER JOIN `attendance` a ON u.user_id = a.user_id 
                                                        WHERE a.total > '00:00:00' AND month(a.date) = '$date' AND u.user_id = '$user_id' 
                                                         GROUP BY a.user_id;";
                                        $resultSelectTWD = $connect->query($sqlSelectTWD);
                                        if ($resultSelectTWD->num_rows > 0) {
                                            $rowSelectTWD = $resultSelectTWD->fetch_assoc();
                                            $actual_workingHours = 30;
                                            $salary = $rowSelectTWD['salary'];
                                            $total_salary = $salary * $rowSelectTWD['total_workDay'] / $actual_workingHours 
                                                        - ($rowSelectTWD['total_dayLackingHours'] * 100000) 
                                                        + $rowSelectTWD['bonus'];
                                            echo '<p class="salary_employee">' . number_format($total_salary) . ' VNĐ</p>';

                                            if (isset($rowSelectTWD['employee_id'])) {
                                                $employee_id = intval($rowSelectTWD['employee_id']);
                                                echo "<a href='employee_salary.php?id={$employee_id}'>Xem chi tiết</a>";
                                            }
                                        } else {
                                            echo '<p class="salary_employee">0 VNĐ</p>';
                                        }
                                    } else {
                                        echo "Không tìm thấy người dùng đang đăng nhập.";
                                    }
                                    ?>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </body>
        <script src="./js/index.js"></script>
    </html>