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
    <style>
        .link_home {
            margin-right: 10px;
            background-color: #6586E6;
            color: white;
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
    </style>
</head>
<body>
    <a class="link_home" href='employee-information.php'>Trang chủ</a>
    <div class="form-data_manager-table">
        <table id="information-table">
            <?php
                session_start();
                require 'connect_database.php';
                mysqli_set_charset($connect, 'UTF8');   
                $date = date("m");
                $user_id =  $_SESSION['nameaccount'];

                
                $sql = "SELECT COUNT(*) AS dateWork FROM `attendance` WHERE date like '%$date%' AND user_id = '$user_id'";
                $result = $connect->query($sql);
                $row = $result->fetch_assoc();
                $totalCountDateWork = $row['dateWork'];

                $salaryEmployeeSql = "SELECT user_data.user_id, salary_and_bonus.salary, salary_and_bonus.bonus from attendance
                    INNER JOIN user_data ON user_data.user_id = attendance.user_id 
                    INNER JOIN salary_and_bonus ON user_data.id = salary_and_bonus.employee_id
                    WHERE user_data.user_id = 'HUMG175040'
                    LIMIT 1;";
                $resultSalaryEmployeeSql = $connect->query($salaryEmployeeSql);
                if ($resultSalaryEmployeeSql->num_rows > 0) {
                    $row1 = $resultSalaryEmployeeSql->fetch_assoc();
                    $salary = $row1["salary"];
                    $bonus = $row1["bonus"];

                    $totalSalary = ($salary / 26) * $totalCountDateWork + $bonus;
                    
                    echo " " . $salary;
                    echo " " . $totalCountDateWork;
                    echo " " . $bonus;
                    echo " " . $user_id;
                    echo " " . $date;


                    echo "Salary is: " . $totalSalary;

                }


                $connect->close();
            ?>
        </table>
        <!-- <a type="button" class="update-btn" href="">Add Salary</a> -->
</body>