<?php
session_start();
require 'connect_database.php';

if(isset($_POST['completed'])) {
    if(isset($_POST['checkbox'])) {
        $checkedCount = count($_POST['checkbox']);
        
        $sql = "SELECT COUNT(*) AS total FROM assignment";
        $result = $connect->query($sql);
        $row = $result->fetch_assoc();
        $totalCount = $row['total'];
        
        if($checkedCount == $totalCount) {
            $user_id =  $_SESSION['nameaccount'];
            $date = date("Y-m-d");
            $result = "Hoàn thành công việc";
            $rating = "Đạt";

            $performance_employeeAdd = "INSERT INTO performance_employee (`user_id`, `date`, `result`, `rating`) VALUES ('$user_id', '$date', '$result', '$rating')";
            if ($connect->query($performance_employeeAdd) === TRUE) {
                echo "Đã hoàn thành tất cả công việc!<br>";
            } else {
                echo "Error adding Performance: " . $connect->error . "<br>";
            }
        } 
        else{
            echo "Chưa hoàn thành hết công việc hôm nay. Vui lòng nhập lý do chưa hoàn thành công việc:";
            echo '<form class="form-container" id="reasonForm" method="post">
                    <input type="text" id="reason" name="reason"> 
                    <input class="btn btn-primary" type="submit" value="Submit" name="submit_reason">
                </form>';
        }
    } 
    else {
        echo "Chưa chọn công việc nào để hoàn thành!";
    }
}
if (isset($_POST['submit_reason'])) {
    $user_id =  $_SESSION['nameaccount'];
    $date = date("Y-m-d");
    $result = "Chưa hoàn thành công việc";
    $reason = $_POST['reason'];
    $rating = "Không đạt";

    $performance_employeeAdd = "INSERT INTO performance_employee (`user_id`, `date`, `result`, `fail_reason`, `rating`) VALUES ('$user_id', '$date', '$result', '$reason', '$rating')";
        if ($connect->query($performance_employeeAdd) === TRUE) {
            echo "Đã gửi lý do thành công!<br>";
        } else {
                echo "Error adding Performance: " . $connect->error . "<br>";
        }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="base.css">
    <title>Assignment</title>
    <script src="checkform.js"></script>

</head>

<body>
    <h1>Công việc</h1><br>

    <form action="" method="post">
        <?php
        require 'connect_database.php';
        
        $sql = "SELECT user_data.fisrt_name, user_data.last_name, assignment.user_id, assignment.deadline, assignment.assignment_type 
        FROM user_data 
        INNER JOIN assignment 
        ON user_data.user_id = assignment.user_id";
        $result = $connect->query($sql);
            if($result->num_rows > 0)
            {
                echo "<table id='information-table'>
                    <tr> 
                    <th></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>ID</th>
                    <th>Deadline</th>
                    <th>Assignment</th>
                </tr>";
        
                while ($row = $result->fetch_assoc())
                {
                    echo "<tr><td> <input type=checkbox name = 'checkbox[]' value='" .$row['user_id']."'>" . "</td>". 
                        "<td>" . $row["fisrt_name"] . "</td>" .
                        "<td>" . $row["last_name"] . "</td>" .
                        "<td>" . $row["user_id"] . "</td>" .
                        "<td>" . $row["deadline"] . "</td>" .
                        "<td>" . $row["assignment_type"] . "</td>"; 
                }
            }
        ?>
        <input class="input_submit"  type="submit" name="completed" value="COMPLETED ASSIGNMENT" />
    </form>

    <a class="link_home" href="employee-information.php">Home</a>

</body>

</html>
