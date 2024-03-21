<?php
    $employeeId = $_POST['employee_id'];
    $salary = $_POST['salary'];
    $bonus = $_POST['bonus'];
    require 'connect_database.php';
    mysqli_set_charset($connect, 'UTF8');

    $sql = "UPDATE salary_and_bonus SET salary = $salary, bonus = $bonus WHERE employee_id = $employeeId;";
    if ($connect->query($sql) === TRUE) {
        header("Location: salary.php");
        exit();
    } else {
        echo "Lỗi khi cập nhật bản ghi: " . $connect->error;
    }
?>