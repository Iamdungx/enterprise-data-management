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
            margin: 10px;
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
        .form-import {
            background-color: #9FD7F9;
            padding: 20px;
            max-width: 600px; /* Chỉnh kích thước tối đa của form */
            margin: 0 auto; /* Căn giữa form */
        }
        .form-import input[type="file"] {
            display: block; /* Hiển thị dạng block để nằm dưới nhau */
            margin-bottom: 1px; /* Khoảng cách dưới của ô nhập file */
        }
        .form-import button {
            background-color: #3EAEF4;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: 10px;
        }
        .form-import button:hover {
            background-color: #6586E6;
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
        <a class="link_home" href="employee-information.php">Trang chủ</a>
        <div class="blue-box">
            <h1>Add Employee</h1>
        </div>
        <div class="form-import">
            <form action="" name="excel" require value="" enctype="multipart/form-data" method="POST">
                <input type="file" name="import_file" class="form-control">
                <button type="submit">Import Excel Data</button>
            </form>
        </div>
        <form class="form-container" id="form" method="post">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>

            <div class="form-group">
                <label>Giới tính</label>
                <select name="gender" id="gender">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <div class="form-group">
                <label>Date Of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Hire Date</label>
                <input type="date" class="form-control" id="hire_date" name="hire_date" required>
            </div>

            <div class="form-group">
                <label>Department</label>
                <input type="text" class="form-control" id="department" name="department" required>
            </div>

            <div class="form-group">
                <label>Position</label>
                <input type="text" class="form-control" id="position" name="position" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name="role" id="role">
                    <option value="employee">Employee</option>
                    <option value="manager">Manager</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="ADD EMPLOYEE" name="add_employee">
            </div>
        </form>
        <?php
            if (isset($_POST['add_employee'])) {
                require 'connect_database.php';

                // Lấy dữ liệu từ biểu mẫu HTML
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $date_of_birth = $_POST['date_of_birth'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $hire_date = $_POST['hire_date'];
                $department = $_POST['department'];
                $position = $_POST['position'];
                $password = $_POST['password'];
                $role = $_POST['role'];

                // Hàm tạo user_id ngẫu nhiên
                function generateUserID() {
                    $prefix = "HUMG";
                    $random_number = sprintf('%06d', mt_rand(0, 999999)); // Sinh số ngẫu nhiên từ 000000 đến 999999
                    return $prefix . $random_number;
                }

                // Tạo user_id mới và kiểm tra đến khi nào không trùng
                do {
                    $user_id = generateUserID();
                    $check_query = "SELECT COUNT(*) as count FROM user_data WHERE user_id = '$user_id'";
                    $result = $connect->query($check_query);
                    $row = $result->fetch_assoc();
                    $user_id_exists = $row['count'] > 0;
                } while ($user_id_exists);

                // Câu lệnh SQL để thêm nhân viên vào cơ sở dữ liệu
                $sql = "INSERT INTO user_data (`fisrt_name`, `last_name`, `gender`, `address`, `date_of_birth`, `phone`, `email`, `hire_date`, `department`, `position`, `user_id`, `password`, `role`) 
                        VALUES ('$first_name', '$last_name', '$gender', '$address', '$date_of_birth', '$phone', '$email', '$hire_date', '$department', '$position', '$user_id', '$password', '$role')";

                // Kiểm tra xem người dùng đã đăng nhập và có quyền ghi log hay không
                if (isset($_SESSION['nameaccount']) && isset($_SESSION['role'])) {
                    $role = $_SESSION['role'];
                    $name = $_SESSION['nameaccount'];
                    $description = "Thêm nhân viên";
                    $string_sql = mysqli_real_escape_string($connect, $sql); // Escape single quotes in the SQL string

                    // Câu lệnh SQL để ghi log
                    $log = "INSERT INTO modification (`name`, `role`, `text_log`, `description`) VALUES ('$name', '$role', '$string_sql', '$description')";

                    // Thực thi câu lệnh ghi log và kiểm tra lỗi
                    if ($connect->query($log) === TRUE) {
                        echo "Log entry added successfully!<br>";
                    } else {
                        echo "Error adding log entry: " . $connect->error . "<br>";
                    }
                }

                // Thực thi câu lệnh để thêm nhân viên và kiểm tra lỗi
                if ($connect->query($sql) === TRUE) {
                    echo "Thêm nhân viên thành công!";
                } else {
                    echo "Thêm không thành công. Nhập lại!";
                    echo "Error: " . $connect->error . "<br>";
                }
            }
        ?>
    </div>

    <script src="./js/index.js"></script>
</body>
</html>