<?php
    session_start();
    require 'connect_database.php';

    if(isset($_POST['delete'])) {
        if(isset($_POST['delete'])) {
            $employee_id = $_POST['delete'];

            // Delete employee record from the database
            $sql = "DELETE FROM user_data WHERE id = '$employee_id'";
            $result = $connect->query($sql);

            if ($result) {
                // Redirect back to employee information page
                header("Location: employee-information.php");
                exit();
            } else {
                echo "Error deleting employee: " . $connect->error;
            }
        } else {
            echo "No employee ID provided.";
        }
    }
    
    $connect->close();
?>
