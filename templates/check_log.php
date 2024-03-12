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
        .link_home {
            margin-right: 10px;
            background-color: #6586E6;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px;
        }
        #information-table {
            width: auto; /* Thay đổi từ 1500px thành auto */
            max-width: 100%; /* Đảm bảo bảng không vượt quá kích thước của phần tử cha */
            height: 500px;
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <a class="link_home" href='employee-information.php'>Trang chủ</a>
    <div class="blue-box">
        <h1>Check Log</h1>
    </div>
    <div class="form-data_manager-table">
        <table id="information-table">
            <?php
                require 'connect_database.php';
                mysqli_set_charset($connect, 'UTF8');
                
                $sql = "SELECT * FROM modification";
                $result = $connect->query($sql);
                    echo '<tr>
                        <th>Name Account</th>
                        <th>Role</th>
                        <th>Text_log</th>
                        <th>Date</th>
                        <th>Action</th>
                        </tr>';
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>".
                                    "<td>".$row["name"]."</td>".
                                    "<td>".$row["role"]."</td>".
                                    "<td>".$row["text_log"]."</td>".
                                    "<td>".$row["timestamp"]."</td>".
                                    "<td>".$row["description"]."</td>
                                </tr>";
                            }
                        }
                $connect->close();
            ?>
        </table>
    </div>
</body>