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
    <div class="form-data_manager-table">
        <h1>Thông tin nhân sự chi tiết</h1>
        <table id="information-table">
            <?php
                require 'connect_database.php';
                mysqli_set_charset($connect, 'UTF8');
                
                $sql = "SELECT user_data.user_id, user_data.fisrt_name, user_data.last_name, user_data.address, user_data.date_of_birth, user_data.phone, 
                user_data.email, user_data.hire_date, user_data.department, user_data.position, user_data.role,
                employee_profile.education, employee_profile.work_exp , employee_profile.certification
                FROM user_data 
                INNER JOIN employee_profile 
                ON user_data.id = employee_profile.employee_id;";
                $result = $connect->query($sql);
                    echo '<tr>
                        <th>ID Employee</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Địa chỉ</th>
                        <th>Ngày sinh</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ngày bắt đầu làm</th>
                        <th>Phòng ban</th>
                        <th>Vị trí</th>
                        <th>Chức vụ</th>
                        <th>Học vấn</th>
                        <th>Kinh nghiệm làm việc</th>
                        <th>Chứng chỉ</th>

                        </tr>';
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>".
                                    "<td>".$row["user_id"]." </td>".
                                    "<td>".$row["fisrt_name"]."</td>".
                                    "<td>".$row["last_name"]."</td>".
                                    "<td>".$row["address"]." </td>".
                                    "<td>".$row["date_of_birth"]." </td>".
                                    "<td>".$row["phone"]." </td>".
                                    "<td>".$row["email"]." </td>".
                                    "<td>".$row["hire_date"]." </td>".
                                    "<td>".$row["department"]." </td>".
                                    "<td>".$row["position"]." </td>".
                                    "<td>".$row["role"]." </td>".
                                    "<td>".$row["education"]." </td>".
                                    "<td>".$row["work_exp"]." </td>".
                                    "<td>".$row["certification"]." </td>
                                </tr>";
                            }
                        }
                $connect->close();
            ?>
        </table>
    <a class="link_home" href='employee-information.php'>Trang chủ</a>
</body>