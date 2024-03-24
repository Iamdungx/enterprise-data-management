<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags and CSS links -->
</head>
<body>
    <a class="link_home" href='employee-information.php'>Trang chủ</a>
    <div class="blue-box">
        <h1>Update Employee</h1>
    </div>
    <?php
        session_start();
        require 'connect_database.php';

        if(isset($_POST['update'])) {
            $employee_id = $_POST['update'];

            // Fetch employee details from database
            $sql = "SELECT * FROM user_data WHERE id = '$employee_id'";
            $result = $connect->query($sql);

            if($result->num_rows > 0) {
                $employee = $result->fetch_assoc();

                // Display update form
                echo "<form action='process-update.php' method='post'>
                        <input type='hidden' name='employee_id' value='".$employee['id']."' />
                        <label for='first_name'>First Name:</label>
                        <input type='text' id='first_name' name='first_name' value='".$employee['first_name']."' /><br>
                        <label for='last_name'>Last Name:</label>
                        <input type='text' id='last_name' name='last_name' value='".$employee['last_name']."' /><br>
                        <label for='address'>Address:</label>
                        <input type='text' id='address' name='address' value='".$employee['address']."' /><br>
                        <!-- Add other fields as needed -->
                        <input type='submit' name='submit' value='Update Employee' />
                    </form>";
            } else {
                echo "Employee not found.";
            }
        } else {
            echo "No employee ID provided.";
        }

        $connect->close();
    ?>
</body>
</html>
