<?php
    session_start();

    if(isset($_POST['delete'])) {
        if(isset($_POST['checkbox'])) {
            require 'connect_database.php';

            foreach ($_POST['checkbox'] as $id) {
                $sql = "DELETE FROM user_data WHERE id = '$id'";
                $result = $connect->query($sql);

                // Logging logic
                if (isset($_SESSION['nameaccount']) && isset($_SESSION['role'])) {
                    $name = $_SESSION['nameaccount'];
                    $role = $_SESSION['role'];
                    $description = "Xoá nhân viên";
                    $string_sql = (string) $sql;
            
                    $string_sql = mysqli_real_escape_string($connect, $string_sql);
            
                    $log = "INSERT INTO modification (`name`, `role`, `text_log`, `description`) VALUES ('$name','$role','$string_sql', '$description')";
            
                    if ($connect->query($log) === TRUE) {
                        echo "Log entry added successfully!<br>";
                    } else {
                        echo "Error adding log entry: " . $connect->error . "<br>";
                    }
                }
            }
            $connect->close();
            echo "Employees deleted successfully.";
        }
    } else {
        echo "No employees selected for deletion.";
    }
?>
