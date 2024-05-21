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
    <title>Bàn giao công việc</title>
    <script src="checkform.js"></script>
    <style>
        /* CSS styles */
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
    <a class="link_home" href="employee_information.php">Trang chủ</a>
    <div class="blue-box">
        <h1>Bàn giao công việc</h1>
    </div>
    <form class="form-container" id="form" method="post">
        <div class="form-group">
            <label>Mã nhân viên</label>
            <select name="user_id" id="user_id">
                <?php     
                    require 'connect_database.php'; 
                    if($_SESSION['role'] == 'President'){
                        $sql = "SELECT user_id FROM user_data WHERE role='Vice President'";
                        $result = $connect->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="'.$row['user_id'].'">'.$row["user_id"].'</option>';
                            } 
                        }
                    }
                    if($_SESSION['role'] == 'Vice President'){
                        $sql = "SELECT user_id FROM user_data WHERE role Like 'manager'";
                        $result = $connect->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="'.$row['user_id'].'">'.$row["user_id"].'</option>';
                            } 
                        }
                    }
                    if($_SESSION['role'] == 'manager'){
                        $sql = "SELECT user_id FROM user_data WHERE role Like 'employee'";
                        $result = $connect->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="'.$row['user_id'].'">'.$row["user_id"].'</option>';
                            } 
                        }
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>Chức vụ</label>
            <?php
                if($_SESSION['role'] == 'President'){
                    echo '<input type="text" class="form-control" value="Phó chủ tịch">';
                }
                if($_SESSION['role'] == 'Vice President'){
                    echo '<input type="text" class="form-control" value="Quản lý">';
                }
                if($_SESSION['role'] == 'manager'){
                    echo '<input type="text" class="form-control" value="Nhân viên">';
                }
            ?>
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

    <?php
        if($_SESSION['role'] == 'Vice President' || $_SESSION['role'] == 'manager'){
            require 'connect_database.php';
            $user_id =  $_SESSION['nameaccount'];
            
            $sql = "SELECT user_data.fisrt_name, user_data.last_name, assignment.user_id, assignment.deadline, assignment.assignment_type, 
            assignment.status, assignment.assignment_id
            FROM user_data 
            INNER JOIN assignment 
            ON user_data.user_id = assignment.user_id
            WHERE assignment.user_id = '$user_id' and assignment.status = 'Incomplete'";
            $result = $connect->query($sql);

                if($result->num_rows > 0)
                {
                    echo "<table id='information-table'>
                        <tr> 
                        <th></th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>ID</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Assignment</th>
                    </tr>";
            
                    while ($row = $result->fetch_assoc())
                    {
                        echo "<tr><td> <input type=radio name='radio' id='radio' value='" .$row['assignment_id']. "' onclick='setAssignment(\"" . $row['assignment_type'] . "\", \"" . $row['deadline'] . "\")'>" . "</td>". 
                            "<td>" . $row["fisrt_name"] . "</td>" .
                            "<td>" . $row["last_name"] . "</td>" .
                            "<td>" . $row["user_id"] . "</td>" .
                            "<td>" . $row["deadline"] . "</td>" .
                            "<td>" . $row["status"] . "</td>" .
                            "<td>" . $row["assignment_type"] . "</td></tr>"; 
                    }
                    echo "</table>";
                }
            else {
                    echo "Không có nhiệm vụ nào được giao";
            }
        }
    ?>

    <script>
        function setAssignment(assignmentType, deadline) {
            document.getElementById('assignment').value = assignmentType;
            document.getElementById('deadline').value = deadline;
        }
    </script>
    </form>


    <?php
        if (isset($_POST['add_assignment'])) {
            require 'connect_database.php'; 

            if($_SESSION['role'] == 'President'){
                $user_id = $_POST['user_id'];
                $assignment = $_POST['assignment'];
                $deadline = $_POST['deadline'];
                $status = "Incomplete";
    
                $sqlAssignment = "INSERT INTO assignment (`user_id`, `assignment_type`, `deadline`, `status`)  
                        VALUES ('$user_id', '$assignment', '$deadline', '$status')";
                
                
    
                if (isset($_SESSION['nameaccount']) && isset($_SESSION['role'])) {
                    $role = $_SESSION['role'];
                    $name = $_SESSION['nameaccount'];
                    $description = "Thêm công việc";
                    $string_sqlAssignment = mysqli_real_escape_string($connect, $sqlAssignment); 
                    
                    $logAssignment = "INSERT INTO modification (`name`, `role`, `text_log`, `description`) VALUES ('$name', '$role', '$string_sqlAssignment', '$description')";
    
                    if ($connect->query($logAssignment) === TRUE) {
                        echo "Đã thêm vào check log.<br>";
                    } else {
                        echo "Lỗi: " . $connect->error . "<br>";
                    }
                }
    
                if ($connect->query($sqlAssignment) === TRUE) {
                    echo "Thêm công việc thành công!";
                } else {
                    echo "Thêm không thành công. Nhập lại!";
                    echo "Lỗi: " . $connect->error . "<br>";
                }
            }

            if($_SESSION['role'] == 'Vice President'){
                if(isset($_POST['radio'])) {
                    $user_id = $_POST['user_id'];
                    $assignmentID = $_POST['radio'];
        
                    $sqlAssignment1 = "UPDATE `assignment` SET user_id = '$user_id'  WHERE assignment_id = '$assignmentID'";
                    
                    
        
                    if (isset($_SESSION['nameaccount']) && isset($_SESSION['role'])) {
                        $role = $_SESSION['role'];
                        $name = $_SESSION['nameaccount'];
                        $description = "Thêm công việc";
                        $string_sqlAssignment1 = mysqli_real_escape_string($connect, $sqlAssignment1); 
                        
                        $logAssignment = "INSERT INTO modification (`name`, `role`, `text_log`, `description`) VALUES ('$name', '$role', '$string_sqlAssignment1', '$description')";
        
                        if ($connect->query($logAssignment) === TRUE) {
                            echo "Đã thêm vào check log.<br>";
                        } else {
                            echo "Lỗi: " . $connect->error . "<br>";
                        }
                    }
        
                    if ($connect->query($sqlAssignment1) === TRUE) {
                        echo "Thêm công việc thành công!";
                    } else {
                        echo "Thêm không thành công. Nhập lại!";
                        echo "Lỗi: " . $connect->error . "<br>";
                    }
                }
            }

            if($_SESSION['role'] == 'manager'){
                if(isset($_POST['radio'])) {
                    $user_id = $_POST['user_id'];
                    $assignmentID = $_POST['radio'];
        
                    $sqlAssignment1 = "UPDATE `assignment` SET user_id = '$user_id'  WHERE assignment_id = '$assignmentID'";
                    
                    
        
                    if (isset($_SESSION['nameaccount']) && isset($_SESSION['role'])) {
                        $role = $_SESSION['role'];
                        $name = $_SESSION['nameaccount'];
                        $description = "Thêm công việc";
                        $string_sqlAssignment1 = mysqli_real_escape_string($connect, $sqlAssignment1); 
                        
                        $logAssignment = "INSERT INTO modification (`name`, `role`, `text_log`, `description`) VALUES ('$name', '$role', '$string_sqlAssignment1', '$description')";
        
                        if ($connect->query($logAssignment) === TRUE) {
                            echo "Đã thêm vào check log.<br>";
                        } else {
                            echo "Lỗi: " . $connect->error . "<br>";
                        }
                    }
        
                    if ($connect->query($sqlAssignment1) === TRUE) {
                        echo "Thêm công việc thành công!";
                    } else {
                        echo "Thêm không thành công. Nhập lại!";
                        echo "Lỗi: " . $connect->error . "<br>";
                    }
                }
            }
        }
    ?>
</body>

</html>
