<?php
session_start();
require 'connect_database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $employee_id = $_POST['employee_id'];
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    if ($new_password === $confirm_password) {
        // Hash the password before storing it
        $password = $new_password;

        // Use a prepared statement to prevent SQL injection
        $sqlChangePassword = "UPDATE user_data SET password = ? WHERE id = ?";
        if ($stmt = $connect->prepare($sqlChangePassword)) {
            $stmt->bind_param('si', $password, $employee_id);
            if ($stmt->execute()) {
                $alertMessage = "Đổi mật khẩu thành công";
                $alertType = "success";
            } else {
                $alertMessage = "Lỗi khi cập nhật mật khẩu: " . $stmt->error;
                $alertType = "error";
            }
            $stmt->close();
        } else {
            $alertMessage = "Không thể chuẩn bị truy vấn SQL.";
            $alertType = "error";
        }
    } else {
        $alertMessage = "Mật khẩu không trùng khớp.";
        $alertType = "error";
    }

    // Generate the JavaScript code to display the alert
    if (!isset($resultAddEmployee)) {
        $alertMessage = "Invalid File: Please Upload CSV File.";
        echo "<script type='text/javascript'>
                alert('$alertMessage');
                window.location.href = 'employee_information.php';
              </script>";
        exit();
    } else {
        $alertMessage = "CSV File has been successfully Imported.";
        echo "<script type='text/javascript'>
                alert('$alertMessage');
                window.location.href = 'employee_information.php';
              </script>";
        exit();
    }
}
$connect->close();
?>
