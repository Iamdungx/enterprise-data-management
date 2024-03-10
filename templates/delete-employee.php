<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/base.css">
    <title>Delete employee</title>
</head>
<body>
    <h1>Delete employee</h1>
    <?php
        echo '<form action="" method="post" >';

        require 'connect_database.php';

        $sql = "SELECT * FROM user_data";
        $result = $connect->query($sql);

        if($result->num_rows > 0)
        {
            echo "<table id='information-table'>
                <caption>Delete Employee</caption>
                <tr> 
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Date Of Birth</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Hire Date</th>
                <th>Department</th>
                <th>Position</th>
                <th>Acion</th>
            </tr>";

            while ($row = $result->fetch_assoc())
            {
                echo "<tr><td> <input type=checkbox name = 'checkbox[]' value='" .$row['id']."' >" . "</td>". 
                    "<td>" . $row["fisrt_name"] . "</td>" .
                    "<td>" . $row["last_name"] . "</td>" .
                    "<td>" . $row["address"] . "</td>" .
                    "<td>" . $row["date_of_birth"] . "</td>" .
                    "<td>" . $row["phone"] . "</td>" .
                    "<td>" . $row["email"] . "</td>" .
                    "<td>" . $row["hire_date"] . "</td>" .
                    "<td>" . $row["department"] . "</td>" .
                    "<td>" . $row["position"] . "</td></tr>" ;
            }
        }

        echo '<input class="input_submit"  type="submit" name="delete" value="DELETE EMPLOYEE" />
        </form>';

    ?>


    <?php
        if(isset($_POST['delete']))
        {
            if(isset($_POST['checkbox']))
            {
                $delete = $_POST['checkbox'];
                foreach ($delete as $id)
                {
                    $sql = "DELETE FROM user_data WHERE id = '$id'";
                    $result = $connect->query($sql);
                    header("location: delete-employee.php");

                    session_start();
                    if (isset($_SESSION['nameaccount']) && isset($_SESSION['role'])) {
                        $name = $_SESSION['nameaccount'];
                        $role = $_SESSION['role'];
                        $description = "Xoá nhân viên";
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
                }
            }
        }
      

        $connect->close();
    ?>
    <a class="link_home" href='employee-information.php'>Trang chủ</a>
</body>
</html>