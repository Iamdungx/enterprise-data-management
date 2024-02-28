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

        $sql = "SELECT * FROM employee";
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
                    "<td>" . $row["possition"] . "</td></tr>" ;
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
                    $sql = "DELETE FROM films WHERE id = '$id'";
                    $result = $connect->query($sql);
                    header("location: deletefilm.php");

                }

            }
        }
      

        $connect->close();
    ?>
    <a class="link_home" href='Home.php'>Trang chủ</a>
</body>
</html>