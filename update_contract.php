<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'connect_database.php';

if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $salary = $_POST['salary'];


    $sqlUpdateContract = "UPDATE `contract`
                          SET salary = '$salary'
                          WHERE user_id = '$user_id'";

    echo $sqlUpdateContract;

    if ($connect->query($sqlUpdateContract) === TRUE) {
        header("Location: contract.php");
        exit(); // Ensure script stops execution after redirection
    } else {
        echo "Error updating employee details: " . $connect->error;
    }
} else {
    echo "No data received for update.";
}

$connect->close();
?>
