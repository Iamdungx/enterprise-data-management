
<?php
session_start();
require 'connect_database.php';




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
        <div class="blue-box">
            <h1>Tiến độ Công việc cấp dưới</h1>
        </div>
        <form action="" method="post">
            <?php
            require 'connect_database.php';
            $user_id =  $_SESSION['nameaccount'];
            if($_SESSION['role'] != 'President'){
                $sqlLeader = "SELECT assingment_id FROM `assignment` WHERE user_id = '$user_id' and status = 'Incomplete';";
                $resultSqlLeader = $connect->query($sqlLeader);
                if($resultSqlLeader->num_rows > 0){
                    while ($rowLeader = $resultSqlLeader->fetch_assoc()){
                        $assignmentIDLeader = $rowLeader['assingment_id'];
                        $assignmentIDLeaderString =  $assignmentIDLeader.='__';
                        
    
                        $sqlCountAssignTotal = "SELECT  COUNT(*) as totalcount FROM `assignment` WHERE assingment_id like '$assignmentIDLeaderString';";
                        $resultSqlCountAssignTotle = $connect->query($sqlCountAssignTotal);
                        if($resultSqlCountAssignTotle->num_rows > 0){
                            $rowTotal = $resultSqlCountAssignTotle->fetch_assoc();
                            $countTotal = $rowTotal['totalcount']; 
                            if($countTotal == 0){
                                echo "Tổng Số lượng công việc: 0";
                            }
                            else{
                                echo "Tổng Số lượng công việc: " . $countTotal;
                            }
                    
                            $sqlCountAssign = "SELECT  COUNT(*) as count FROM `assignment` WHERE assingment_id like '$assignmentIDLeaderString' and status = 'Completed';";
                            $resultSqlCountAssign = $connect->query($sqlCountAssign);
                            if($resultSqlCountAssign->num_rows > 0){
                                $row = $resultSqlCountAssign->fetch_assoc();
                                $count = $row['count']; 
                                if($count != 0){
                                    echo "Số lượng công việc đã hoàn thành: " . $count;
                                    $percentCountTotal = $count / $countTotal * 100;
                                    echo "Tỷ lệ hoàn thành: " . round($percentCountTotal, 2) . "%";
                                }
                                else{
                                    echo "Số lượng công việc đã hoàn thành: 0" ;
                                }
  
                            }
    
                            $sql = "SELECT * FROM `assignment` WHERE assingment_id like '$assignmentIDLeaderString' and status = 'Incomplete';";
                            $result = $connect->query($sql);
    
                                if($result->num_rows > 0)
                                {
                                    echo "<table id='information-table'>
                                        <caption>Công việc chưa hoàn thành</caption>
                                        <tr> 
                                        <th>ID</th>
                                        <th>assingment_id</th>
                                        <th>user_id</th>
                                        <th>Deadline</th>
                                        <th>Assignment_type</th>
                                        <th>Status</th>
                                        <th>leader</th>
                                    </tr>";
                            
                                    while ($row = $result->fetch_assoc())
                                    {
                                        echo "<tr>
                                            <td>" . $row["id"] . "</td>" .
                                            "<td>" . $row["assingment_id"] . "</td>" .
                                            "<td>" . $row["user_id"] . "</td>" .
                                            "<td>" . $row["deadline"] . "</td>" .
                                            "<td>" . $row["assignment_type"] . "</td>" .
                                            "<td>" . $row["status"] . "</td>" .
                                            "<td>" . $row["leader"] . "</td> 
                                            </tr></table>"; 
                                    }
                                }
                        }
                    
                    }
                }
            }
            else{
                $sqlLeader = "SELECT * FROM `assignment` WHERE leader = '$user_id' and status = 'Incomplete';";
                $resultSqlLeader = $connect->query($sqlLeader);
                if($resultSqlLeader->num_rows > 0){


                        echo "<table id='information-table'>
                            <caption>Công việc chưa hoàn thành đã giao</caption>
                            <tr> 
                            <th>ID</th>
                            <th>assingment_id</th>
                            <th>user_id</th>
                            <th>Deadline</th>
                            <th>Assignment_type</th>
                            <th>Status</th>
                            <th>leader</th>
                        </tr>";
                
                        while ($row = $resultSqlLeader->fetch_assoc())
                        {
                            $assignmentIDLeader = $row['assingment_id'];
                            $sql = "SELECT count(*) as count FROM `assignment` WHERE assingment_id like '%$assignmentIDLeader%'";
                            $resultSql = $connect->query($sql);
                            
                            if($resultSql->num_rows > 0){
                                $rowTotal = $resultSql->fetch_assoc();
                                $countTotal = $rowTotal['count']; 
                                echo "Tổng Số lượng công việc: " . $countTotal;

                                $sqlCompleteAssign = "SELECT count(*) as countTotal FROM `assignment` WHERE assingment_id like '%$assignmentIDLeader%' and status = 'Completed';";
                                $resultSqlCountAssign = $connect->query($sqlCompleteAssign);
                                if($resultSqlCountAssign->num_rows > 0){
                                    $rowTotal = $resultSqlCountAssign->fetch_assoc();
                                    $count = $rowTotal['countTotal']; 
                                    echo "Số lượng công việc đã hoàn thành: " . $count;
                                    $percentCountTotal = $count / $countTotal * 100;
                                    echo "Tỷ lệ hoàn thành: " . round($percentCountTotal, 2) . "%";
                                }
                            }


                            echo "<tr>
                                <td>" . $row["id"] . "</td>" .
                                "<td>" . $row["assingment_id"] . "</td>" .
                                "<td>" . $row["user_id"] . "</td>" .
                                "<td>" . $row["deadline"] . "</td>" .
                                "<td>" . $row["assignment_type"] . "</td>" .
                                "<td>" . $row["status"] . "</td>" .
                                "<td>" . $row["leader"] . "</td>
                                </tr></table>"; 
                            
                            echo '<p></p>';
                        }
                    
            
        
                }
            }

            ?>
        </form>
    </div>
    <script src="./js/index.js"></script>
</body>
</html>
