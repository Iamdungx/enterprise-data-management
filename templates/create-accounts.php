<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="base.css">
    <title>Create Account</title>
    <script src="checkform.js"></script>

</head>

<body>
    <h1>Create Account</h1><br>
    <form id="form" method="post">
        <div class="form-group">
            <label>User Name</label>
            <input type="text" class="form-control" id="first_name" name="user_name" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" id="last_name" name="password" required>
        </div>

        <div class="form-group">
            <label>Role</label>
            <select name="role" id="">
                <option value="admin"></option>
                <option value="manager"></option>
                <option value="employee"></option>
            </select>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="CREATE ACCOUNT" name="create_account">
        </div>
    
    </form>

    <?php
    if (isset($_POST['create_account'])) {
        require 'connect_database.php';
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $sql = "INSERT INTO login( `user_name`, `password`, `role`) 
                                    VALUES ('$user_name' ,'$password', '$role')";

        if ($connect->query($sql) === TRUE) {
            echo "Tạo tài khoản thành công!";
        } else {
            echo "Tạo không thành công. Nhập lại!";
        }
    }
    ?>
    <a class="link_home" href="employee-information.php">Home</a>

</body>

</html>