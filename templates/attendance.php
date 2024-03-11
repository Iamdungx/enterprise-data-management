<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chấm Công</title>
</head>
<body>

    <h2>Trang Chấm Công</h2>

    <form action="attendance.php" method="post">
    <label for="user_id">Mã Nhân viên:</label>
    <input type="text" name="user_id" required>
    <br>
    <input type="submit" value="Chấm Công" name="attendance_button">
    </form>

    <a class="link_home" href="employee-information.php">Home</a>

</body>
</html>

<?php
include 'connect_database.php';

if (isset($_POST["attendance_button"])) {
    $id = test_input($_POST["user_id"]);

    $date = date("Y-m-d");

    $check_in = date("H:i:s");

    if (validate_employee_id($id)) {
        $sql = "INSERT INTO attendance (user_id, date, check_in) VALUES ('$id', '$date', '$check_in')";
        if ($connect->query($sql) === TRUE) {
            echo "Chấm công thành công!";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $connect->error;
        }
    } else {
        echo "Mã nhân viên không hợp lệ!";
    }
}

if ($connect !== null) {
    $connect->close();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validate_employee_id($id) {
    global $connect;

    $query = "SELECT COUNT(*) as count FROM user_data WHERE user_id = '$id'";
    $result = $connect->query($query);

    if (!$result) {
        echo "Lỗi trong truy vấn: " . $connect->error;
        return false;
    }

    $row = $result->fetch_assoc();
    $id_exists = $row['count'];

    return $id_exists > 0;
}
?>
</body>
</html>