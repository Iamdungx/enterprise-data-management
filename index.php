<?php 
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HUMG HRM - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Đăng Nhập</h1>
                                    </div>
                                    <form  method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="user_id" id="user_id" aria-describedby="emailHelp"
                                                placeholder="Enter User ID">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" id="password" placeholder="Password">
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Đăng Nhập
                                        </button>
                                    </form>
                                    <?php
                                        require 'connect_database.php';

                                        if (isset($_POST['login'])) {
                                            $username_login = $_POST['user_id'];
                                            $password_login = $_POST['password'];
                                            
                                            $sql = "SELECT * FROM user_data WHERE user_id = '$username_login' and user_data.password = '$password_login'";
                                            $result = $connect->query($sql);
                                            if($result->num_rows == 0 ){
                                                echo "
                                                    <div class='text-danger text-center mt-3'>
                                                        Tài khoản hoặc mật khẩu không đúng. Vui lòng nhập lại
                                                    </div>";
                                            }
                                            else
                                            {
                                                while ($row = $result->fetch_assoc()){
                                                    $role = $row["role"];
                                                    $department = $row["department"] ;
                                                }
                                                
                                                session_regenerate_id(true); //Tái tạo id session để sử dụng phiên
                                                $_SESSION['nameaccount'] = $_POST['user_id'];
                                                $_SESSION['role'] = $role;
                                                $_SESSION['department'] = $department;

                                                if($role == 'admin' || $role == 'President' || $role == 'Vice President' ||$role == 'manager'){
                                                    //
                                                    //echo $_SESSION['nameaccount'];
                                                    //echo $_SESSION['role'];
                                                    header("Location: dashboard.php");
                                                    exit();
                                                }
                                                else{
                                                    header("Location: profile.php");
                                                    exit();
                                                }
                                            }
                                        }
                                    ?>

                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                    <div class="container my-auto">
                                        <div class="copyright text-center my-auto">
                                            <span>Copyright &copy; NCKH 2024</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>