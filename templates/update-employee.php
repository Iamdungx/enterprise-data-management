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
</head>

<body>

    <table id="information-table">
        <?php
        require 'connect_database.php';
        mysqli_set_charset($connect, 'UTF8');

        $sql = "SELECT * FROM employee";
        $result = $connect->query($sql);

        echo "<form method='post' action=''>
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

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>" .
                    "<td>" . $row["fisrt_name"] . "</td>" .
                    "<td>" . $row["last_name"] . "</td>" .
                    "<td>" . $row["address"] . "</td>" .
                    "<td>" . $row["date_of_birth"] . "</td>" .
                    "<td>" . $row["phone"] . "</td>" .
                    "<td>" . $row["email"] . "</td>" .
                    "<td>" . $row["hire_date"] . "</td>" .
                    "<td>" . $row["department"] . "</td>" .
                    "<td>" . $row["possition"] . "</td>" .
                    "<td><button class='update-btn' type='submit' name='choose' value='" . $row["id"] . "'>Update</button></td>
                                        </tr>";
            }
        }
        else{
            echo "<h1>No employee in database</h1>";
        }
        $connect->close();
        ?>
    </table>
        <?php
        require 'connect_database.php';
        if (isset($_POST['choose'])) {
            echo '<form action="" method="POST">
            <div class="form-group-update">
                <label>ID</label>
                <input type="text" class="form-control-update" name="update_id" value="' . $_POST['choose'] . '" readonly>
            </div>
            <div class="form-group-update">
                <label>First Name</label>
                <input type="text" class="form-control-update" name="first_name" value="" required>
            </div>

            <div class="form-group-update">
                <label>Last Name</label>
                <input type="text" class="form-control-update" name="last_name" value="" required>
            </div>

            <div class="form-group-update">
                <label>Address</label>
                <input type="text" class="form-control-update" name="address" value="" required>
            </div>
            
            <div class="form-group-update">
                <label>Date Of Birth</label>
                <input type="date" class="form-control-update" name="date_of_birth" value="" required>
            </div>

            <div class="form-group-update">
                <label>Phone</label>
                <input type="text" class="form-control-update" name="phone" value="" required>
            </div>

            <div class="form-group-update">
                <label>Email</label>
                <input type="text" class="form-control-update" name="email" value="" required>
            </div>

            <div class="form-group-update">
                <label>Hire Date</label>
                <input type="date" class="form-control-update" name="hire_date" value="" required>
            </div>

            <div class="form-group-update">
                <label>Department</label>
                <input type="text" class="form-control-update" name="department" value="" required>
            </div>

            <div class="form-group-update">
                <label>Position</label>
                <input type="text" class="form-control-update" name="position" value="" required>
            </div>

            <div class="form-group-update">
                <input class="btn btn-primary" type="submit" name="update">Update Data</input>          
            </div>    
        </form>';
        }
        ?>
        <?php
        if (isset($_POST['update'])) {
            $update_id = $_POST['update_id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $address = $_POST['address'];
            $date_of_birth = $_POST['date_of_birth'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $hire_date = $_POST['hire_date'];
            $department = $_POST['department'];
            $position = $_POST['position'];

            $sql2 = "UPDATE employee 
                SET fisrt_name = '$first_name', last_name = '$last_name', address = '$address', date_of_birth = '$date_of_birth', phone = '$phone', email = '$email' , hire_date = '$hire_date', department = '$department', possition = '$position'
                WHERE employee.id = '$update_id' ";
            if ($connect->query($sql2) == True) {

                echo "Update succesfully <br>";
            } else {
                echo "Update fail";
            }
        }


        $connect->close();
        ?>
    </table>
    <script src="./js/index.js"></script>

</html>