<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8 vi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duyệt đơn</title>
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
            width: auto;
            height: auto;
        }
        .form-container {
            background-color: #9FD7F9; /* Màu nền xanh dương */
            padding: 20px; /* Khoảng cách giữa nội dung và viền của form */
            border-radius: 10px; /* Bo tròn viền của form */
            width: 400px; /* Độ rộng của form */
            margin: auto; /* Canh giữa form */
        }

        .form-container h1 {
            color: white; /* Màu chữ trắng */
            text-align: center; /* Canh giữa tiêu đề */
        }

        .form-group {
            margin-bottom: 20px; /* Khoảng cách giữa các trường */
        }

        .form-control {
            width: 95%; /* Độ rộng của trường nhập liệu */
            padding: 10px; /* Khoảng cách giữa nội dung và viền của trường */
            border-radius: 5px; /* Bo tròn viền của trường */
            border: none; /* Loại bỏ viền của trường */
            background-color: #FFFFFF; /* Màu nền trắng cho trường nhập liệu */
        }
        select#search_form {
            width: 200px; /* Điều chỉnh chiều rộng của select tùy ý */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-right: 10px;
        }
        /* CSS cho nút tìm kiếm */
        input[type="submit"] {
            background-color: #27A4F2;
            color: black;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        /* CSS cho nút tìm kiếm khi hover */
        input[type="submit"]:hover {
            background-color: #6586E6;
        }
        .input_submit,
        #search_form {
            margin: 10px 10px; 
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
            <h1>Duyệt đơn</h1>
        </div>
        <div class="form-data_manager-table">
            <form action="" method="post">
                <?php
                    require 'connect_database.php';
                    if(isset($_POST['approve'])){
                        if(isset($_POST['checkbox'])){
                            $checkedIds = $_POST['checkbox'];
                            $checkedIdsString = implode(',', $checkedIds);
                            $sql = "UPDATE `form` SET `status`='Approved' WHERE form_id IN ($checkedIdsString)";
                            if ($connect->query($sql) === TRUE){
                            } 
                            else {
                                echo "Error adding Performance: " . $connect->error . "<br>";
                            }
                        }
                    }
                ?>
                <select name="search_form" id="search_form">
                    <option value="Tất cả">Tất cả</option>  
                    <option value="Đơn xin nghỉ">Đơn xin nghỉ</option>
                    <option value="Đơn xin đổi ca">Đơn xin đổi ca</option>
                    <option value="Đơn giải trình">Đơn giải trình</option>
                </select>
                <input type="submit" name="search" value="Tìm kiếm"></input>

                <table id="information-table">
                    <?php
                        require 'connect_database.php';
                        mysqli_set_charset($connect, 'UTF8');
                        
                        $sql = "SELECT form.user_id, form.form_type, form.date, form.content, user_data.fisrt_name, user_data.last_name, form.status, form.form_id
                        from user_data
                        inner join form on form.user_id = user_data.user_id
                        where form.status = 'Pending'";
                        $result = $connect->query($sql);
                            echo '<tr>
                                <th>ID Employee</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Loại đơn</th>
                                <th>Nội dung</th>
                                <th>Trạng thái</th>
                                <th>Thời gian</th>
                                <th></th>

                                </tr>';
                                if ($result->num_rows > 0) {
                                    if(isset($_POST['search'])){
                                        $form_type = $_POST['search_form'];
                                        $sql1 = "SELECT form.user_id, form.form_type, form.date, form.content, user_data.fisrt_name, user_data.last_name, form.status, form.form_id
                                        from user_data
                                        inner join form on form.user_id = user_data.user_id
                                        where form.status = 'Pending' and form.form_type = '$form_type'";
                                        $result1  =$connect->query($sql1);
                                        if($result1->num_rows > 0){
                                            while ($row = $result1->fetch_assoc()) {
                                                echo "<tr>".
                                                    "<td>".$row["user_id"]." </td>".
                                                    "<td>".$row["fisrt_name"]."</td>".
                                                    "<td>".$row["last_name"]."</td>".
                                                    "<td>".$row["form_type"]." </td>".
                                                    "<td>".$row["content"]." </td>".
                                                    "<td>".$row["status"]." </td>".
                                                    "<td>".$row["date"]." </td>".
                                                    "<td> <input type=checkbox name = 'checkbox[]' value='" .$row['form_id']."'></td>
                                                </tr>";
                                            }
                                        }
                                        else{
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>".
                                                    "<td>".$row["user_id"]." </td>".
                                                    "<td>".$row["fisrt_name"]."</td>".
                                                    "<td>".$row["last_name"]."</td>".
                                                    "<td>".$row["form_type"]." </td>".
                                                    "<td>".$row["content"]." </td>".
                                                    "<td>".$row["status"]." </td>".
                                                    "<td>".$row["date"]." </td>".
                                                    "<td> <input type=checkbox name = 'checkbox[]' value='" .$row['form_id']."'></td>
                                                </tr>";
                                            }
                                        }
                                    }
                                    else{
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>".
                                                "<td>".$row["user_id"]." </td>".
                                                "<td>".$row["fisrt_name"]."</td>".
                                                "<td>".$row["last_name"]."</td>".
                                                "<td>".$row["form_type"]." </td>".
                                                "<td>".$row["content"]." </td>".
                                                "<td>".$row["status"]." </td>".
                                                "<td>".$row["date"]." </td>".
                                                "<td> <input type=checkbox name = 'checkbox[]' value='" .$row['form_id']."'></td>
                                            </tr>";
                                        }
                                    }
                                }

                        $connect->close();
                    ?>
                </table>
            <input class="input_submit"  type="submit" name="approve" value="Approve Form" />
            </form>
        </div>
    </div>
    <script src="./js/index.js"></script>    
</body>