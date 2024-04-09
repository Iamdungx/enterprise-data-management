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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
    </head>
    <body>
        <!-- header -->
        <header class="header">
            <div class="hrm-title">
                <div class="title close">
                    <h4>HRM Admin</h4>
                </div>
                <div class="icon-nav close">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <!--header account-->
            <div class="account" id="dropdown">
                <div class="image-account">
                    <img class="avatar-account" src="./image/icon-image.png" alt="hrm-icon">
                </div>

                <?php
                    session_start();
                    if (isset($_SESSION['nameaccount']))
                    {
                        echo "<div class='account-title'>
                            <h4>".$_SESSION['nameaccount']."</h4>
                        </div>";
                    }
                ?>

                <div class="icon-account">
                    <i class="fa-solid fa-angle-down"></i>
                </div>
                
                <div class="dropdown-content">
                    <a href="attendance.php">
                        <i class="fa-solid fa-calendar-days"></i>
                        Chấm Công
                    </a>
                    <a href="javascript:void(0);" onclick="confirmLogout()">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Đăng xuất
                    </a>
                    

                </div>
                <script>
                function confirmLogout() {
                    if (confirm("Bạn có chắc chắn muốn đăng xuất?")) {
                    window.location.href = "logout.php";
                        }
                    }
                </script>
            </div>

        </header>

        <div class="grid_system_column close container">
            <!-- 20% -->
            <div class="container-nav_bar">
                <div class="nav_bar-function">
                    <div class="nav_bar-function-content close"> <!-- Quản lí nhân viên -->
                        <i class="nav_bar-function-icon fa-solid fa-sitemap fa-lg"></i>
                        <a>Quản lí nhân viên</a>
                        <div class="function-icon_arrow_Manager">
                            <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                        </div>
                    </div>
                    <div class="nav_bar-function_child">
                        <ul class="nav_bar-function_child_Manager none">
                            <li class="nav_bar-list-item">
                                <a href="emplpyee_profile.php">Thông tin nhân viên chi tiết</a>
                            </li>
                            <li class="nav_bar-list-item"><a href="salary.php">Bảng lương</a></li>
                            <li class="nav_bar-list-item"><a href="benefit.php">Bảo hiểm, đãi ngộ</a></li>
                            <li class="nav_bar-list-item"><a href="performance.php">Hiệu suất</a></li>
                        </ul>
                    </div>

                </div>

                <div class="nav_bar-function">
                    <div class="nav_bar-function-content close">
                        <i class="nav_bar-function-icon fa-solid fa-calendar-days fa-lg"></i>
                        <a>Báo cáo chấm công</a>
                        <div class="function-icon_arrow_Report">
                            <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                        </div>
                    </div>
                    <div class="nav_bar-function_child">
                        <ul class="nav_bar-function_child_Report none">
                            <li class="nav_bar-list-item">Báo cáo theo tuần</li>
                            <li class="nav_bar-list-item">Danh sách ca</li>
                            <li class="nav_bar-list-item">Báo cáo theo tháng</li>
                            <li class="nav_bar-list-item"><a href="attendance_report.php">Danh sách chấm công</a></li>
                        </ul>

                    </div>

                </div>

                <div class="nav_bar-function">
                    <div class="nav_bar-function-content close">
                        <i class="nav_bar-function-icon fa-solid fa-envelopes-bulk fa-lg"></i>
                        <a>Đơn & giải trình</a>
                        <div class="function-icon_arrow_Assignment">
                            <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                        </div>
                    </div>
                    <div class="nav_bar-function_child">
                        <ul class="nav_bar-function_child_Assignment none">
                            <?php
                                if(isset($_SESSION['role'])){
                                    if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager'){
                                        echo '<li class="nav_bar-list-item"><a href="form_take_off.php">Đơn xin nghỉ</a></li>
                                        <li class="nav_bar-list-item"><a href="form_change_shift.php">Đơn xin đổi ca</a></li>
                                        <li class="nav_bar-list-item"><a href="form_explanation.php">Đơn giải trình</a></li>
                                        <li class="nav_bar-list-item"><a href="unexcused.php">Nghỉ không phép</a></li>';
                                    }
                                }
                            ?>

                            <?php
                                if(isset($_SESSION['role'])){
                                    if($_SESSION['role'] == 'employee'){
                                        echo '<li class="nav_bar-list-item"><a href="form_employee.php">Gửi đơn</a> </li>';
                                    }
                                }
                            ?>
                            
                        </ul>
                    </div>
                    
                    <?php
                        if(isset($_SESSION['role'])){
                            if($_SESSION['role'] == 'admin' ){
                                echo '<div class="nav_bar-function">
                                <div class="nav_bar-function-content close">
                                    <i class="nav_bar-function-icon fa-solid fa-code fa-lg"></i>
                                    <a>Admin Console</a>
                                    <div class="function-icon_arrow_AdminConsole">
                                        <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                                    </div>
                                </div>
                                <div class="nav_bar-function_child">
                                    <ul class="nav_bar-function_child_AdminConsole none">
                                        <a class="nav_bar-list-item" href="create-accounts.php">Hiệu suất</a>
                                    </ul>
                                </div>
                            </div>';
                            }
                            if($_SESSION['role'] == 'manager' ){
                                echo '<div class="nav_bar-function">
                                <div class="nav_bar-function-content close">
                                    <i class="nav_bar-function-icon fa-solid fa-code fa-lg"></i>
                                    <a>Manager Console</a>
                                    <div class="function-icon_arrow_AdminConsole">
                                        <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                                    </div>
                                </div>
                                <div class="nav_bar-function_child">
                                    <ul class="nav_bar-function_child_AdminConsole none">
                                        <a class="nav_bar-list-item" href="performance_detail.php">Bàn giao công việc</a>
                                    </ul>
                                </div>
                            </div>';
                            }
                        }
                        
                    ?>
                </div>
            </div>
            <!-- 80%  -->

            <div class="dashboard-container">
                <div class="dashboard-grid-info">
                    <div class="dashboard-information">
                        <div class="dashboard-information_header">
                            <p>Thông tin nhân viên</p>
                        </div>
                        <div class="dashboard-information_containner">
                            <div class="dashboard-information_containner_field">
                                <p>Mã NV</p>
                                <p>Họ</p>
                                <p>Tên</p>
                                <p>Ngày sinh</p>
                                <p>Giới tính</p>
                                <p>Điện thoại</p>
                                <p>Email</p>
                                <p>Phòng ban</p>
                                <p>Vị trí</p>
                                <p>Chức vu</p>
                            </div>
                            <div class="dashboard-information_containner_detail">
                                <p>HUMG175040</p>
                                <p>Trịnh</p>
                                <p>Sơn</p>
                                <p>30/12/2003</p>
                                <p>Nam</p>
                                <p>0328510096</p>
                                <p>trinhson301203@gmail.com</p>
                                <p>IT</p>
                                <p>Software Engineer</p>
                                <p>Nhân viên</p>
                            </div>
                            <div class="dashboard-information_containner_image">
                                <img class="avatar-user" src="./image/user.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-profile">
                        <div class="dashboard-profile_header">
                            <p>Hồ sơ nhân viên</p>
                        </div>
                        <div class="dashboard-profile_containner">
                            <div class="dashboard-profile_containner_detail">
                                <p>Trình độ học vấn</p>
                                <p>Công nghệ thông tin (chương trình chất lượng cao) Đại học Mỏ Địa Chất</p>
                            </div>
                            <div class="dashboard-profile_containner_detail">
                                <p>Kinh nghiệm làm việc</p>
                                <p>Chưa có</p>
                            </div>
                            <div class="dashboard-profile_containner_detail">
                                <p>Chứng chỉ</p>
                                <p>F8-Javascript Basic, HTML CSS</p>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-benefit">
                        <div class="dashboard-benefit_header">
                                <p>Bảo hiểm nhân viên</p>
                            </div>
                            <div class="dashboard-benefit_containner">
                                <div class="dashboard-benefit_containner_detail">
                                    <p>Bảo hiểm y tế</p>
                                    <p>Bảo hiểm y tế</p>

                                </div>
                                <div class="dashboard-benefit_containner_detail">
                                    <p>Bảo hiểm nhân thọ</p>
                                    <p>Bảo hiểm nhân thọ</p>
                                </div>
                                <div class="dashboard-benefit_containner_detail">
                                    <p>Bảo hiểm khác</p>
                                    <p>Bảo hiểm sinh kỳ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="dashboard-grid-active">
                    <div class="dashboard-notice">
                        <span>Nhắc nhở mới, chưa xem</span>
                        <div class="quanlity-notice">
                            <span>1</span>
                            <i class="fa-regular fa-bell"></i>
                        </div>
                        <a href="#">Xem chi tiết</a>
                    </div>
                    <div class="dashboard-list">
                        <div class="dashboard-assignment">
                            <div class="dashboard-assignment_content">
                                <span>Công việc</span>
                                <div class="quanlity-notice">
                                    <span>3</span>
                                    <i class="fa-solid fa-briefcase"></i>
                                </div>
                                <a href="assignment.php">Xem chi tiết</a>
                            </div>
                        </div>

                        <div class="dashboard-salary">
                            <div class="dashboard-salary_content">
                                <span>Lương</span>
                                <div><p class="salary_employee">30000000 VND</p></div>
                                <a href="employee_salary.php">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


            
           
    </body>
        <script src="./js/index.js"></script>
    </html>
