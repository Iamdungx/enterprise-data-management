<?php
require "connect_database.php";

if (isset($_POST["Import"])) {
    if (!isset($_FILES["file"]) || $_FILES["file"]["size"] == 0) {
        $alertMessage = "No file uploaded or file is empty. Please upload a valid CSV file.";
        echo "<script type='text/javascript'>
                alert('$alertMessage');
                window.location.href = 'employee_information.php';
              </script>";
        exit();
    }

    $filename = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
            $first_name = $getData[0];
            $last_name = $getData[1];
            $gender = $getData[2];
            $address = $getData[3];
            $date_of_birth = $getData[4];
            $phone = $getData[5];
            $email = $getData[6];
            $hire_date = $getData[7];
            $department = $getData[8];
            $position = $getData[9];
            $password = $getData[10];
            $role = $getData[11];

            function generateUserID() {
                $prefix = "HUMG";
                $random_number = sprintf('%06d', mt_rand(0, 999999));
                return $prefix . $random_number;
            }

            do {
                $user_id = generateUserID();
                $check_query = "SELECT COUNT(*) as count FROM user_data WHERE user_id = '$user_id'";
                $result = $connect->query($check_query);
                $row = $result->fetch_assoc();
                $user_id_exists = $row['count'] > 0;
            } while ($user_id_exists);

            $sqlAddEmployee = "INSERT INTO user_data (`first_name`, `last_name`, `gender`, `address`, `date_of_birth`, `phone`, `email`, `hire_date`, `department`, `position`, `user_id`, `password`, `role`) 
            VALUES ('$first_name', '$last_name', '$gender', '$address', '$date_of_birth', '$phone', '$email', '$hire_date', '$department', '$position', '$user_id', '$password', '$role')";

            $resultAddEmployee = mysqli_query($connect, $sqlAddEmployee);

            if (!$resultAddEmployee) {
                $alertMessage = "Error importing file. Please try again.";
                echo "<script type='text/javascript'>
                        alert('$alertMessage');
                        window.location.href = 'employee_information.php';
                      </script>";
                exit();
            }
        }
        fclose($file);

        $alertMessage = "CSV File has been successfully Imported.";
        echo "<script type='text/javascript'>
                alert('$alertMessage');
                window.location.href = 'employee_information.php';
              </script>";
        exit();
    } else {
        $alertMessage = "Uploaded file is empty. Please upload a valid CSV file.";
        echo "<script type='text/javascript'>
                alert('$alertMessage');
                window.location.href = 'employee_information.php';
              </script>";
        exit();
    }
}
?>
