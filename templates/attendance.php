<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chấm Công</title>
</head>
<body>

    <h2>Trang Chấm Công</h2>

    <form action="attendance.php" method="post">
        <label for="user_id">Mã Nhân viên:</label>
        <input type="text" name="user_id" required>
        <br>
        <input type="submit" value="Chấm Công" name="attendance_button">
    </form>

    <a class="link_home" href="employee-information.php">Home</a>

    <?php
require 'connect_database.php';
session_start();

if (isset($_POST["attendance_button"])) {
    $user_id = test_input($_POST["user_id"]);
    $date = date("Y-m-d");
    $check_in = date("H:i:s");
    
    // Check if the user has already clocked in for today
    $checkInQuery = "SELECT * FROM attendance WHERE user_id = ? AND date = ?";
    $checkInStmt = $connect->prepare($checkInQuery);
    $checkInStmt->bind_param("ss", $user_id, $date);
    $checkInStmt->execute();
    $result = $checkInStmt->get_result();

    if ($result->num_rows > 0) {
        // User has already clocked in, proceed to clock out
        $row = $result->fetch_assoc();
        $check_in_time = $row['check_in'];

        // Calculate total time (you may need to adjust this based on your needs)
        $check_in_datetime = new DateTime($date . ' ' . $check_in_time);
        $current_datetime = new DateTime();
        $diff = $check_in_datetime->diff($current_datetime);
        $total_time = $diff->format('%H:%i:%s');

        // Update the check-out and total time in the database
        $updateQuery = "UPDATE attendance SET check_out = ?, total = ? WHERE user_id = ? AND date = ?";
        $updateStmt = $connect->prepare($updateQuery);
        $updateStmt->bind_param("ssss", $check_in, $total_time, $user_id, $date);

        if ($updateStmt->execute()) {
            echo "Clock-out successful! Total time: $total_time";
        } else {
            echo "Error: " . $updateStmt->error;
        }

        $updateStmt->close();
    } else {
        // User has not clocked in, proceed to clock in
        $insertQuery = "INSERT INTO attendance (user_id, date, check_in) VALUES (?, ?, ?)";
        $insertStmt = $connect->prepare($insertQuery);
        $insertStmt->bind_param("sss", $user_id, $date, $check_in);

        if ($insertStmt->execute()) {
            echo "Clock-in successful!";
        } else {
            echo "Error: " . $insertStmt->error;
        }

        $insertStmt->close();
    }

    $checkInStmt->close();
}

if ($connect !== null) {
    $connect->close();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

</body>
</html>
