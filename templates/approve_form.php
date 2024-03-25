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
        <form action="" method="post">
            <?php
                require 'connect_database.php';
                if(isset($_POST['approve'])){
                    if(isset($_POST['checkbox'])){
                        $checkedIds = $_POST['checkbox'];
                        $checkedIdsString = implode(',', $checkedIds);
                        $sql = "UPDATE `form` SET `status`='Đã duyệt' WHERE form_id IN ($checkedIdsString)";
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
                    where form.status = 'Chưa duyệt'";
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
                                    where form.status = 'Chưa duyệt' and form.form_type = '$form_type'";
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


</body>