<?php
session_start();
require 'connect_database.php';

if(isset($_POST['submit'])) {
    $employee_id = $_POST['employee_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $role = $_POST['role'];

    $sqlProcessUpdate = "UPDATE user_data
    SET fisrt_name = '$first_name', last_name = '$last_name', address = '$address', phone = '$phone', email = '$email', department = '$department', position = '$position', role = '$role'
    WHERE id = '$employee_id'";
    if($connect->query($sqlProcessUpdate) === TRUE) {
        // Redirect to employee_information.php after successful update
        header("Location: employee_information.php");
        exit(); // Ensure script stops execution after redirection
    } else {
        echo "Error updating employee details: " . $connect->error;
    }
} else {
    echo "No data received for update.";
}

$connect->close();
?>
