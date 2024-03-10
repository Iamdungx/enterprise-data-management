<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8 vi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HRM</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/base.css">
    <link href="./icons/fontawesome-free-6.1.1-web/css/all.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="./image/icon-image.png">
    <!-- Js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
</head>
<body>
    <div class="form-data_manager-table">
        <table id="information-table">
            <?php
                require 'connect_database.php';
                mysqli_set_charset($connect, 'UTF8');
                
                $sql = "SELECT user_data.id, user_data.fisrt_name, user_data.last_name, salary_and_bonus.salary, salary_and_bonus.bonus 
                FROM user_data 
                INNER JOIN salary_and_bonus 
                ON user_data.id = salary_and_bonus.employee_id;";
                $result = $connect->query($sql);
                    echo '<tr>
                        <th>ID Employee</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Salary</th>
                        <th>Bonus</th>
                        </tr>';
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>".
                                    "<td>".$row["id"]." </td>".
                                    "<td>".$row["fisrt_name"]."</td>".
                                    "<td>".$row["last_name"]."</td>".
                                    "<td>".$row["salary"]." VND </td>".
                                    "<td>".$row["bonus"]." VND </td>
                                </tr>";
                            }
                        }
                $connect->close();
            ?>
        </table>
        <!-- <a type="button" class="update-btn" href="">Add Salary</a> -->

    <h1>Add Employee's Salary</h1><br>
    <form id="form" method="post">
        <div class="">
            <label>Id Employee</label>
            <input type="text" class="form-control" id="employee_id" name="employee_id" required>
        </div>

        <div class="">
            <label>Salary</label>
            <input type="number" class="form-control" id="salary" name="salary" required>
        </div>

        <div class="">
            <label>Bonus</label>
            <input type="number" class="form-control" id="bonus" name="bonus">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="ADD SALARY" name="add_salary">
        </div>
    </form>
    </div>
    <?php
        if (isset($_POST['add_salary'])) {
        require 'connect_database.php';
        $employee_id = $_POST['employee_id'];
        $salary = $_POST['salary'];
        $bonus = $_POST['bonus'];

        $sql = "INSERT INTO salary_and_bonus (`employee_id`, `salary`, `bonus`) VALUES ('$employee_id' ,'$salary', '$bonus')";
        
        session_start();
        if (isset($_SESSION['nameaccount']) && isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
            $name = $_SESSION['nameaccount'];
            $description = "Thêm lương nhân viên";
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
            echo "Thêm lương cho nhân viên thành công!";
        } else {
            echo "Thêm không thành công. Nhập lại!";
            echo "Error: " . $connect->error . "<br>";
        }
    }
    ?>
    <a class="link_home" href='employee-information.php'>Trang chủ</a>
</body>