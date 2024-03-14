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
        <h1>Đãi ngộ/ Bảo hiểm</h1>
        <table id="information-table">
            <?php
                require 'connect_database.php';
                mysqli_set_charset($connect, 'UTF8');
                
                $sql = "SELECT user_data.user_id, user_data.fisrt_name, user_data.last_name, benefit.health_insurance, benefit.life_insurance , benefit.other
                FROM user_data 
                INNER JOIN benefit 
                ON user_data.id = benefit.employee_id;";
                $result = $connect->query($sql);
                    echo '<tr>
                        <th>ID Employee</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Bảo hiểm y tế</th>
                        <th>Bảo hiểm nhân thọ</th>
                        <th>Bảo hiểm khác</th>
                        </tr>';
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>".
                                    "<td>".$row["user_id"]." </td>".
                                    "<td>".$row["fisrt_name"]."</td>".
                                    "<td>".$row["last_name"]."</td>".
                                    "<td>".$row["health_insurance"]." </td>".
                                    "<td>".$row["life_insurance"]." </td>".
                                    "<td>".$row["other"]." </td>
                                </tr>";
                            }
                        }
                $connect->close();
            ?>
        </table>
    <a class="link_home" href='employee-information.php'>Trang chủ</a>
</body>