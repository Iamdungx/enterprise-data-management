<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="base.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Add Assingment</title>
    <script src="checkform.js"></script>
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
        .btn {
            width: 100%; /* Độ rộng của nút */
            padding: 10px; /* Khoảng cách giữa nội dung và viền của nút */
            border-radius: 5px; /* Bo tròn viền của nút */
            border: none; /* Loại bỏ viền của nút */
            background-color: #0654ba; /* Màu nền xanh dương cho nút */
            color: white; /* Màu chữ trắng cho nút */
            cursor: pointer; /* Hiển thị con trỏ khi di chuột qua nút */
        }
        .btn:hover {
            background-color: #04408c; /* Màu nền xanh dương sậm khi di chuột qua nút */
        }
    </style>

</head>

<body>
    <?php
        session_start(); // Gọi session_start() trước khi sử dụng $_SESSION
    
    ?>
    <a class="link_home" href="employee-information.php">Trang chủ</a>
    <div class="blue-box">
        <h1>Bàn giao công việc</h1>
    </div>
    <form class="form-container" id="form" method="post">
        <div class="form-group">
            <label>Mã nhân viên</label>
            <input type="text" class="form-control" id="user_id" name="user_id" required>
        </div>

        <div class="form-group">
            <label>Công việc</label>
            <input type="text" class="form-control" id="assignment" name="assignment" required>
        </div>

        <div class="form-group">
            <label>Deadline</label>
            <input type="date" class="form-control" id="deadline" name="deadline" required>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Thêm công việc" name="add_assignment">
        </div>
    </form>
<?php

    if (isset($_POST['add_assignment'])) {
        require 'connect_database.php'; 

        $user_id = $_POST['user_id'];
        $assignment = $_POST['assignment'];
        $deadline = $_POST['deadline'];
        $status = "Chưa hoàn thành";

        $sql = "INSERT INTO assignment (`user_id`, `assignment_type`, `deadline`, `status`)  
                VALUES ('$user_id', '$assignment', '$deadline', '$status')";

        if (isset($_SESSION['nameaccount']) && isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
            $name = $_SESSION['nameaccount'];
            $description = "Thêm công việc";
            $string_sql = mysqli_real_escape_string($connect, $sql); 
            
            $log = "INSERT INTO modification (`name`, `role`, `text_log`, `description`) VALUES ('$name', '$role', '$string_sql', '$description')";

            if ($connect->query($log) === TRUE) {
                echo "Log entry added successfully!<br>";
            } else {
                echo "Error adding log entry: " . $connect->error . "<br>";
            }
        }

        if ($connect->query($sql) === TRUE) {
            echo "Thêm công việc thành công!";
        } else {
            echo "Thêm không thành công. Nhập lại!";
            echo "Error: " . $connect->error . "<br>";
        }
    }
?>


</body>

</html>