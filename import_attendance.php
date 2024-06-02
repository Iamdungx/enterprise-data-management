<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "connect_database.php";

if (isset($_POST["import"])) {
    if (!isset($_FILES["file"]) || $_FILES["file"]["size"] == 0) {
        echo "<script type='text/javascript'>
                alert('No file uploaded or file is empty. Please upload a valid file.');
                window.location.href = 'attendance.php';
              </script>";
        exit();
    }

    $filename = $_FILES["file"]["tmp_name"];
    $user_id = mysqli_real_escape_string($connect, $_POST["user_id"]);

    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");

        // Skip the first row (header)
        fgetcsv($file, 1000, ",");

        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
            $month = isset($getData[0]) ? $getData[0] : '';
            $year = isset($getData[1]) ? $getData[1] : '';
            $total = isset($getData[2]) ? $getData[2] : '';
            $ot = isset($getData[3]) ? $getData[3] : '';
        
            // Debug output
            echo "Tháng: $month, Năm: $year, Số ngày công: $total, OT: $ot<br>";

            // Insert data into database
            $sql = "INSERT INTO attendance (`user_id`, `month`, `year`, `total`, `ot`) 
                    VALUES ('$user_id', '$month', '$year', '$total', '$ot')";    

            if (!mysqli_query($connect, $sql)) {
                echo "<script type='text/javascript'>
                        alert('Error importing file. Please try again.');
                        window.location.href = 'attendance.php';
                      </script>";
                exit();
            }
        }

        fclose($file);

        echo "<script type='text/javascript'>
                alert('CSV File has been successfully imported.');
                window.location.href = 'attendance.php';
              </script>";
        exit();
    } else {
        echo "<script type='text/javascript'>
                alert('Uploaded file is empty. Please upload a valid CSV file.');
                window.location.href = 'attendance.php';
              </script>";
        exit();
    }
}
?>