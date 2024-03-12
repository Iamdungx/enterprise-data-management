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
    <h1>Danh sách chấm công</h1>
    <div class="form-data_manager-table">
        <table id="information-table">
            <?php
                require 'connect_database.php';
                mysqli_set_charset($connect, 'UTF8');
                
                $sql = "SELECT user_data.user_id user_data.fisrt_name, user_data.last_name, attendance.user_id, 
                attendance.date, attendance.check_in, attendance.check_out
                FROM user_data 
                INNER JOIN attendance 
                ON user_data.user_id = attendance.user_id";
                $result = $connect->query($sql);
                    echo '<tr>
                        <th>ID Employee</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date</th>
                        <th>Check in</th>
                        <th>Check out</th>
                        <th>Total</th>
                        </tr>';
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>".
                                    "<td>".$row["id"]." </td>".
                                    "<td>".$row["fisrt_name"]."</td>".
                                    "<td>".$row["last_name"]."</td>".
                                    "<td>".$row["date"]."</td>".
                                    "<td>".$row["check_in"]."</td>".
                                    "<td>".$row["check_out"]."</td>".
                                    "<td>".$row["total"]." </td>
                                </tr>";
                            }
                        }
                $connect->close();
            ?>
        </table>
    <a class="link_home" href='employee-information.php'>Trang chủ</a>
</body>