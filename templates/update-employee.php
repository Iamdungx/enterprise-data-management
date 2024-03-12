<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8 vi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HRM</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/base.css">
    <link href="./icons/font-awesome-free-6.1.1-web/css/all.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="./image/icon-image.png">
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
            width: auto;
            height: auto;
        }

        #information-table th,
        #information-table td {
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <a class="link_home" href='employee-information.php'>Trang chủ</a>
    <div class="blue-box">
        <h1>Update Employee</h1>
    </div>
    <table id="information-table">
        <?php
        require 'connect_database.php';
        mysqli_set_charset($connect, 'UTF8');

        $sql = "SELECT * FROM user_data";
        $result = $connect->query($sql);
        session_start();

        echo "<form method='post' action=''>
        <tr> 
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Date Of Birth</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Hire Date</th>
            <th>Department</th>
            <th>Position</th>
            <th>Acion</th>
        </tr>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>" .
                    "<td>" . $row["fisrt_name"] . "</td>" .
                    "<td>" . $row["last_name"] . "</td>" .
                    "<td>" . $row["address"] . "</td>" .
                    "<td>" . $row["date_of_birth"] . "</td>" .
                    "<td>" . $row["phone"] . "</td>" .
                    "<td>" . $row["email"] . "</td>" .
                    "<td>" . $row["hire_date"] . "</td>" .
                    "<td>" . $row["department"] . "</td>" .
                    "<td>" . $row["position"] . "</td>" .
                    "<td><button class='update-btn' type='submit' name='choose' value='" . $row["id"] . "'>Update</button></td>
                                        </tr>";
            }
        }
        else{
            echo "<h1>No employee in database</h1>";
        }
        $connect->close();
        ?>
    </table>
        <?php
        require 'connect_database.php';
        if (isset($_POST['choose'])) {
            echo '<form action="" method="POST">
            <div class="form-group-update">
                <label>ID</label>
                <input type="text" class="form-control-update" name="update_id" value="' . $_POST['choose'] . '" readonly>
            </div>
            <div class="form-group-update">
                <label>First Name</label>
                <input type="text" class="form-control-update" name="first_name" value="" required>
            </div>

            <div class="form-group-update">
                <label>Last Name</label>
                <input type="text" class="form-control-update" name="last_name" value="" required>
            </div>

            <div class="form-group-update">
                <label>Address</label>
                <input type="text" class="form-control-update" name="address" value="" required>
            </div>
            
            <div class="form-group-update">
                <label>Date Of Birth</label>
                <input type="date" class="form-control-update" name="date_of_birth" value="" required>
            </div>

            <div class="form-group-update">
                <label>Phone</label>
                <input type="text" class="form-control-update" name="phone" value="" required>
            </div>

            <div class="form-group-update">
                <label>Email</label>
                <input type="text" class="form-control-update" name="email" value="" required>
            </div>

            <div class="form-group-update">
                <label>Hire Date</label>
                <input type="date" class="form-control-update" name="hire_date" value="" required>
            </div>

            <div class="form-group-update">
                <label>Department</label>
                <input type="text" class="form-control-update" name="department" value="" required>
            </div>

            <div class="form-group-update">
                <label>Position</label>
                <input type="text" class="form-control-update" name="position" value="" required>
            </div>

            <div class="form-group-update">
                <input class="btn btn-primary" type="submit" name="update">Update Data</input>          
            </div>    
        </form>';
        }
        ?>
        <?php
        if (isset($_POST['update'])) {
            $update_id = $_POST['update_id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $address = $_POST['address'];
            $date_of_birth = $_POST['date_of_birth'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $hire_date = $_POST['hire_date'];
            $department = $_POST['department'];
            $position = $_POST['position'];

            $sql2 = "UPDATE user_data 
                SET fisrt_name = '$first_name', last_name = '$last_name', address = '$address', date_of_birth = '$date_of_birth', phone = '$phone', email = '$email' , hire_date = '$hire_date', department = '$department', position = '$position'
                WHERE user_data.id = '$update_id' ";

            if (isset($_SESSION['nameaccount']) && isset($_SESSION['role'])) {
                $name = $_SESSION['nameaccount'];
                $role = $_SESSION['role'];
                $description = "Cập nhật thông tin nhân viên.";
                $string_sql = (string) $sql2;

                // Escape single quotes in the SQL string
                $string_sql = mysqli_real_escape_string($connect, $string_sql);

                $log = "INSERT INTO modification (`name`, `role`, `text_log`, `description`) VALUES ('$name','$role','$string_sql', '$description')";

                // Execute the log query and check for errors
                if ($connect->query($log) === TRUE) {
                    echo "Log entry added successfully!<br>";
                } else {
                    echo "Error adding log entry: " . $connect->error . "<br>";
                }
            }
            if ($connect->query($sql2) == True) {

                echo "Update succesfully <br>";
            } else {
                echo "Update fail";
            }
        }

        $connect->close();
        ?>
    </table>
</html>