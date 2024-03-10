<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="base.css">
    <title>Add Employee</title>
    <script src="checkform.js"></script>

</head>

<body>
    <h1>Add Employee</h1><br>
    <form id="form" method="post">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>

        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="form-group">
            <label>Date Of Birth</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Hire Date</label>
            <input type="date" class="form-control" id="hire_date" name="hire_date" required>
        </div>

        <div class="form-group">
            <label>Department</label>
            <input type="text" class="form-control" id="department" name="department" required>
        </div>

        <div class="form-group">
            <label>Position</label>
            <input type="text" class="form-control" id="position" name="position" required>
        </div>

        <div class="form-group">
            <label>User ID</label>
            <input type="text" class="form-control" id="user_id" name="user_id" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label>Role</label>
            <select name="role" id="role">
                <option value="employee">Employee</option>
                <option value="manager">Manager</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="ADD EMPLOYEE" name="add_employee">
        </div>
    </form>

    <?php
if (isset($_POST['add_employee'])) {
    require 'connect_database.php';
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $date_of_birth = $_POST['date_of_birth'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $hire_date = $_POST['hire_date'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $role = $_POST['role'];


    $sql = "INSERT INTO user_data (`fisrt_name`, `last_name`, `address`, `date_of_birth`, `phone`, `email`, `hire_date`, `department`, `position`, `user_id`, `password`, `role`) 
                                VALUES ('$first_name' ,'$last_name', '$address', '$date_of_birth', '$phone', '$email', '$hire_date','$department','$position', '$user_id', '$password', '$role')";
    
    session_start();
    if (isset($_SESSION['nameaccount']) && isset($_SESSION['role'])) {
        $role = $_SESSION['role'];
        $name = $_SESSION['nameaccount'];
        $description = "Thêm nhân viên";
        $string_sql = (string) $sql;

        // Escape single quotes in the SQL string
        $string_sql = mysqli_real_escape_string($connect, $string_sql);

        $log = "INSERT INTO modification (`name`, `role`, `text_log`, `description`) VALUES ('$name','$role','$string_sql', '$description')";

        // Execute the log query and check for errors
        if ($connect->query($log) === TRUE) {
            echo "Log entry added successfully!<br>";
        } else {
            echo "Error adding log entry: " . $connect->error . "<br>";
        }
    }

    // Execute the employee query and check for errors
    if ($connect->query($sql) === TRUE) {
        echo "Thêm nhân viên thành công!";
    } else {
        echo "Thêm không thành công. Nhập lại!";
        echo "Error: " . $connect->error . "<br>";
    }
}
?>
    <a class="link_home" href="employee-information.php">Home</a>

</body>

</html>