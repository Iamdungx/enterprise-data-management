<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>HRM LOGIN</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/index.css">
    <link href="./icons/fontawesome-free-6.1.1-web/css/all.css" rel="stylesheet" type="text/css" />
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="./image/icon-image.png">
</head>

<body>
    <div class="login-container">
        <div class="login-title">
            <center><h4>Đăng Nhập</h4></center>
        </div>
            <form action="" method="POST">
                <div class ="username-box">
                    <label><span>*</span>Tên đăng nhập:</label><br>
                    <input name="user_id" id="user_id" type="text" class="username-input" required/>
                </div>
        
                <div class="password-container">
                    <label><span>*</span>Mật khẩu:</label>
                    <div class="password-box">
                        <input name="password" id="password" type="password" class="password-input" required/>
                        <i id='eye-icon' class="fa-solid fa-eye-slash" onclick="togglePasswordVisibility()"></i>
                    </div>
                        <script>
                            function togglePasswordVisibility() {
                                
                                var passwordField = document.getElementById("password");
                                var eyeIcon = document.getElementById("eye-icon");
                    
                                // Kiểm tra trạng thái hiện tại của trường mật khẩu
                                var isPasswordFieldVisible = passwordField.type === "text";
                    
                                // Đặt lại kiểu trường mật khẩu
                                passwordField.type = isPasswordFieldVisible ? "password" : "text";
                    
                                // Thay đổi class của biểu tượng mắt
                                eyeIcon.classList.toggle("fa-eye", !isPasswordFieldVisible);
                                eyeIcon.classList.toggle("fa-eye-slash", isPasswordFieldVisible);
                            }
                        </script>
                </div>
                <div class="login-button">
                        <button type="submit" name="login">
                            Đăng nhập
                        </button>
                </div>
            </form>
            <?php
                session_start();
                if (isset($_POST['login'])) {
                    require 'connect_database.php';
                    $username_login = $_POST['user_id'];
                    $password_login = $_POST['password'];
                    
                    $sql = "SELECT * FROM user_data WHERE user_id = '$username_login' and user_data.password = '$password_login'";
                    $result = $connect->query($sql);
                    if($result->num_rows == 0 ){
                        echo "Tài khoản hoặc mật khẩu không đúng. Vui lòng nhập lại";
                    }
                    else
                    {
    
                        while ($row = $result->fetch_assoc()){
                            $role = $row["role"]; 
                        }

                        $_SESSION['nameaccount'] = $username_login;
                        $_SESSION['role'] = $role;

                        if($role == 'admin' || $role == 'manager'){
                            header("location: admin_dashboard.php");
                        }
                        else{
                            header("location: employee_dashboard.php");
                        }
                    }
                }
            ?>
    </div>  
</body>

</html>