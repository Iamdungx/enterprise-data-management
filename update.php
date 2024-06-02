<?php
session_start();
require 'connect_database.php';

function updateEmployeeDetails($employee_id, $first_name, $last_name, $gender, $address, $phone, $email, $department, $position, $role) {
    global $connect;
    
    $sqlProcessUpdate = "UPDATE user_data
        SET first_name = '$first_name', last_name = '$last_name', gender = '$gender', address = '$address', phone = '$phone', email = '$email', department = '$department', position = '$position', role = '$role'
        WHERE id = '$employee_id'";
    
    if($connect->query($sqlProcessUpdate) === TRUE) {
        return true;
    } else {
        return "Error updating employee details: " . $connect->error;
    }
}

if(isset($_POST['submit'])) {
    $employee_id = $_POST['employee_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $role = $_POST['role'];
    
    $update_result = updateEmployeeDetails($employee_id, $first_name, $last_name, $gender, $address, $phone, $email, $department, $position, $role);
    
    if($update_result === true) {
        header("Location: employee_information.php");
        exit(); // Ensure script stops execution after redirection
    } else {
        echo $update_result;
    }
} else {
    echo "No data received for update.";
}

$connect->close();
?>
