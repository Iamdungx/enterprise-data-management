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
    <h1>Hiệu suất làm việc</h1>
    <div class="form-data_manager-table">
        <table id="information-table">
            <?php
                require 'connect_database.php';
                mysqli_set_charset($connect, 'UTF8');
                
                $sql = "SELECT user_data.id, user_data.fisrt_name, user_data.last_name, performance_employee.rating, 
                performance_employee.date, performance_detail.deadline, performance_detail.assignment_type, 
                performance_detail.result, performance_detail.reason_fail 
                FROM user_data 
                INNER JOIN performance_employee 
                ON user_data.id = performance_employee.employee_id 
                    INNER JOIN performance_detail 
                    ON performance_employee.id = performance_detail.performance_id";
                $result = $connect->query($sql);
                    echo '<tr>
                        <th>ID Employee</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Assignment type</th>
                        <th>Deadline</th>
                        <th>Result</th>
                        <th>Rating</th>
                        <th>Reason fail</th>
                        <th>Date</th>
                        </tr>';
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>".
                                    "<td>".$row["id"]." </td>".
                                    "<td>".$row["fisrt_name"]."</td>".
                                    "<td>".$row["last_name"]."</td>".
                                    "<td>".$row["assignment_type"]."</td>".
                                    "<td>".$row["deadline"]."</td>".
                                    "<td>".$row["result"]."</td>".
                                    "<td>".$row["rating"]." </td>".
                                    "<td>".$row["reason_fail"]." </td>".
                                    "<td>".$row["date"]." </td>
                                </tr>";
                            }
                        }
                $connect->close();
            ?>
        </table>
    <a class="link_home" href='employee-information.php'>Trang chủ</a>
</body>