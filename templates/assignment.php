
<?php
session_start();
require 'connect_database.php';

if(isset($_POST['completed'])) {
    if(isset($_POST['checkbox'])) {
        $user_id =  $_SESSION['nameaccount'];
        $checkedIds = $_POST['checkbox'];
        $checkedCount = count($_POST['checkbox']);
        
        $sqlAssignmentStatus = "SELECT COUNT(*) AS total FROM assignment WHERE assignment.user_id = '$user_id' and assignment.status = 'Chưa hoàn thành'";
        $result = $connect->query($sql);
        $row = $result->fetch_assoc();
        $totalCount = $row['total'];
        
        if($checkedCount == $totalCount) {
            $date = date("Y-m-d");
            $result = "Hoàn thành công việc";
            $rating = "Đạt";

           
            $performance_employeeAdd = "INSERT INTO performance_employee (`user_id`, `date`, `result`, `rating`) VALUES ('$user_id', '$date', '$result', '$rating')";
            if ($connect->query($performance_employeeAdd) === TRUE){
                echo "Đã hoàn thành tất cả công việc!<br>";
            } else {
                echo "Lỗi: " . $connect->error . "<br>";
            }
        } 
        else{
            echo "Chưa hoàn thành hết công việc hôm nay. Vui lòng nhập lý do chưa hoàn thành công việc:";
            echo '<form class="form-container" id="reasonForm" method="post">
                    <input type="text" id="reason" name="reason"> 
                    <input class="btn btn-primary" type="submit" value="Submit" name="submit_reason">
                </form>';
        }

        $checkedIdsString = implode(',', $checkedIds);
        $sqlAssignmentStatusUpdate = "UPDATE `assignment` SET `status`='Hoàn thành' WHERE assignment_id IN ($checkedIdsString)";
        if ($connect->query($sqlAssignmentStatusUpdate) === TRUE){
        } else {
            echo "Lỗi: " . $connect->error . "<br>";
        }

    } 
    else {
        echo "Chưa chọn công việc nào để hoàn thành!";
    }
}
if (isset($_POST['submit_reason'])) {
    $user_id =  $_SESSION['nameaccount'];
    $date = date("Y-m-d");
    $result = "Chưa hoàn thành công việc";
    $reason = $_POST['reason'];
    $rating = "Không đạt";

    $performance_employeeAdd = "INSERT INTO performance_employee (`user_id`, `date`, `result`, `fail_reason`, `rating`) VALUES ('$user_id', '$date', '$result', '$reason', '$rating')";
        if ($connect->query($performance_employeeAdd) === TRUE) {
            echo "Đã gửi lý do thành công!<br>";
        } else {
                echo "Lỗi: " . $connect->error . "<br>";
        }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8 vi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
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
        .form-container {
            background-color: #9FD7F9; /* Màu nền xanh dương */
            padding: 20px; /* Khoảng cách giữa nội dung và viền của form */
            width: 600px; /* Độ rộng của form */
            margin: auto; /* Canh giữa form */
        }
        .form-container h1 {
            color: black; /* Màu chữ trắng */
            text-align: center; /* Canh giữa tiêu đề */
        }
        .form-group {
            margin-bottom: 0px; /* Khoảng cách giữa các trường */
        }
        .form-control {
            width: 76%; /* Độ rộng của trường nhập liệu */
            padding-left: 10px; /* Khoảng cách giữa nội dung và viền của trường */
            border-radius: 5px; /* Bo tròn viền của trường */
            border: none; /* Loại bỏ viền của trường */
        }
        .btn {
            width: 100%; /* Độ rộng của nút */
            padding: 10px; /* Khoảng cách giữa nội dung và viền của nút */
            border-radius: 5px; /* Bo tròn viền của nút */
            border: none; /* Loại bỏ viền của nút */
            background-color: #27A4F2; /* Màu nền xanh dương cho nút */
            color: black; /* Màu chữ trắng cho nút */
            cursor: pointer; /* Hiển thị con trỏ khi di chuột qua nút */
        }
        .btn:hover {
            background-color: #6586E6; /* Màu nền xanh dương sậm khi di chuột qua nút */
        }
        #role {
            margin-right: auto;
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
                <form action="attendance.php" method="post">
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
                    <a>Quản lí nhân viên</a>
                    <div class="function-icon_arrow_Manager">
                        <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                    </div>
                </div>
                <div class="nav_bar-function_child">
                    <ul class="nav_bar-function_child_Manager none">
                        <li class="nav_bar-list-item">
                            <a href="employee_profile.php">Thông tin nhân viên chi tiết</a>
                        </li>
                        <li class="nav_bar-list-item"><a href="salary.php">Bảng lương</a></li>
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
                    <div class="function-icon_arrow_Report">
                        <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                    </div>
                </div>
                <div class="nav_bar-function_child">
                    <ul class="nav_bar-function_child_Report none">
                        <li class="nav_bar-list-item">Báo cáo theo tuần</li>
                        <li class="nav_bar-list-item">Danh sách ca</li>
                        <li class="nav_bar-list-item">Báo cáo theo tháng</li>
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
        <a class="link_home" href="employee_information.php">Trang chủ</a>
        <div class="blue-box">
            <h1>Công việc</h1>
        </div>
        <form action="" method="post">
            <?php
            require 'connect_database.php';
            $user_id =  $_SESSION['nameaccount'];
            
            $sql = "SELECT user_data.fisrt_name, user_data.last_name, assignment.user_id, assignment.deadline, assignment.assignment_type, 
            assignment.status, assignment.assignment_id
            FROM user_data 
            INNER JOIN assignment 
            ON user_data.user_id = assignment.user_id
            WHERE assignment.user_id = '$user_id' and assignment.status = 'Chưa hoàn thành'";
            $result = $connect->query($sql);

                if($result->num_rows > 0)
                {
                    echo "<table id='information-table'>
                        <tr> 
                        <th></th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>ID</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Assignment</th>
                    </tr>";
            
                    while ($row = $result->fetch_assoc())
                    {
                        echo "<tr><td> <input type=checkbox name = 'checkbox[]' value='" .$row['assignment_id']."'>" . "</td>". 
                            "<td>" . $row["fisrt_name"] . "</td>" .
                            "<td>" . $row["last_name"] . "</td>" .
                            "<td>" . $row["user_id"] . "</td>" .
                            "<td>" . $row["deadline"] . "</td>" .
                            "<td>" . $row["status"] . "</td>" .
                            "<td>" . $row["assignment_type"] . "</td>"; 
                    }
                }
            else {
                    echo "Không có nhiệm vụ nào được giao";
            }
            ?>
            <input class="input_submit"  type="submit" name="completed" value="COMPLETED ASSIGNMENT" />
        </form>
    </div>
    <script src="./js/index.js"></script>
</body>
</html>
