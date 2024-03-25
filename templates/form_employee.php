<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="base.css">
    <title>Gửi đơn</title>
    <script src="checkform.js"></script>
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
        <h1>Gửi đơn</h1>
    </div>
    <form class="form-container" id="form" method="post">
        <div class="form-group">
            <label>Loại đơn</label>
            <select name="form_type" id="form_type">
                <option value="Đơn xin đổi ca">Đơn xin đổi ca</option>
                <option value="Đơn xin nghỉ">Đơn xin nghỉ</option>
                <option value="Đơn giải trình">Đơn giải trình</option>
            </select>
        </div>
        <div class="form-group">
            <label>Nội dung xin nghỉ (Tối đa 255 ký tự)</label>
            <input type="text" class="form-control" id="content_form" name="content_form" required>
        </div>


        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Gửi" name="add_form">
        </div>
    </form>
<?php
    if (isset($_POST['add_form'])) {
        require 'connect_database.php'; 

        $form_type = $_POST['form_type'];
        $content_form = $_POST['content_form'];
        $user_id = $_SESSION['nameaccount'];
        $date = date("Y-m-d");
        $status = 'Chưa duyệt';

        $sql = "INSERT INTO form (`user_id`, `form_type`, `date`, `content`, `status`) VALUES ('$user_id', '$form_type', '$date', '$content_form', '$status')";


        if ($connect->query($sql) === TRUE) {
            echo "Gửi đơn thành công!";
        } else {
            echo "Gửi không thành công. Nhập lại!";
            echo "Error: " . $connect->error . "<br>";
        }
    }
?>


</body>

</html>