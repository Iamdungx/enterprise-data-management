<?php
    $employeeId = $_GET['employee_id'];
    require 'connect_database.php';
    mysqli_set_charset($connect, 'UTF8');

    $sql = "SELECT user_data.id, user_data.fisrt_name, user_data.last_name, salary_and_bonus.salary, salary_and_bonus.bonus 
    FROM user_data 
    INNER JOIN salary_and_bonus 
    ON user_data.id = salary_and_bonus.employee_id
    WHERE user_data.id = " . $employeeId . ";";
    $result = $connect->query($sql)->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8 vi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Emloyee's Salary</title>
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
            background-color: #6586E6;
            color: black;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 10px;
        }
        .blue-box {
            background-color: #9FD7F9; /* Màu nền xanh dương */
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
            padding: 20px;
            border-radius: 5px;
            width: 300px; /* Điều chỉnh kích thước form tùy ý */
            margin: auto;
        }
        /* CSS cho label */
        label {
            display: block;
            margin-bottom: 5px;
        }
        /* CSS cho input fields */
        .form-control {
            width: calc(100% - 22px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        /* CSS cho button */
        .btn {
            background-color: #27A4F2; /* Màu xanh dương đậm */
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            margin: auto;
        }
        /* CSS cho button khi hover */
        .btn:hover {
            background-color: #6586E6; /* Màu xanh dương đậm khi hover */
        }
        .form-edit {
            background-color: #CFEBFC;
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
    <div class="form-edit">
        <a class="link_home" href='employee-information.php'>Trang chủ</a>
        <div class="blue-box">
            <h1>Edit Emloyee's Salary</h1>
        </div>
        <form class="form-container" id="form" method="post" action="edit_salary_handle.php" >
            <div class="">
                <label>ID Employee</label>
                <input type="text" class="form-control" id="employee_id" name="employee_id" required readonly="true" value="<?php echo $result['id']?>">
            </div>

            <div class="">
                <label>Salary</label>
                <input type="number" class="form-control" id="salary" name="salary" required value="<?php echo $result['salary']?>">
            </div>

            <div class="">
                <label>Bonus</label>
                <input type="number" class="form-control" id="bonus" name="bonus" value="<?php echo $result['bonus']?>">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="EDIT SALARY" name="add_salary">
            </div>
        </form>
    </div>

</body>
<script src="./js/index.js"></script>
</html>