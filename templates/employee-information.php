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
                    <form action="attendance.php" method="post">
                        <i class="fa-solid fa-calendar-days"></i>
                        <input name = "attendance_button" type = "submit" value="Chấm công">
                    </form>
                    
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
            <?php
                if(isset($_SESSION['role'])){
                    if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager'){
                        echo '
                        <div class="nav_bar-function">
                            <div class="nav_bar-function-content close"> 
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
                        </div>';
                    }
                    else{
                        echo '
                        <div class="nav_bar-function">
                            <div class="nav_bar-function-content close"> 
                                <i class="nav_bar-function-icon fa-solid fa-sitemap fa-lg"></i>
                                <a>Thông tin nhân viên</a>
                                <div class="function-icon_arrow_Manager">
                                    <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                                </div>
                            </div>
                            <div class="nav_bar-function_child">
                                <ul class="nav_bar-function_child_Manager none">
                                    <li class="nav_bar-list-item"><a href="">Thông tin chi tiết</a></li>
                                    <li class="nav_bar-list-item"><a href="employee_salary.php">Bảng lương</a></li>
                                </ul>
                            </div>
                        </div>';
                    }
                }
                ?>


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
                                        echo '<li class="nav_bar-list-item"><a href="approve_form.php">Duyệt đơn</a></li>
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
                                        <li class="nav_bar-list-item"><a href="dashboard.php">Thông tin chi tiết</a></li>
                                        <li class="nav_bar-list-item"><a href="check_log.php">Check Log</a></li>
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


            
            <!-- 80% -->
            <div class="grid_system_row container-content">
                <!-- search data  -->
                <div class="container-search"> 
                    <form action="" method="post">
                        <div class ="search-box">
                            <div class="search-box_item">
                                <div for="department">Bộ phận</div>
                                <input type="text" placeholder="VD: Van Chuyen" name="position_employee">
                            </div>
                            <div class="search-box_item">
                                <div for="identification">Mã nhân viên</div>
                                <input type="text" placeholder="VD: AB21210">
                            </div>
                            <div class="search-box_item">
                                <div for="name">Tên</div>
                                <input type="text" placeholder="VD: Nguyen Van A" name="name_employee">
                                <input type="submit" name="search" value="Tìm kiếm"></inp>
                            </div>
                        </div>
                    </form>
                </div> 

    <style>
        .add-btn, .data_manager_report-btn {
            display: inline-block;
            padding: 4px 2px;
            margin: 0px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            height: 20px;
        }
        .add-btn {
            background-color: #9FD7F9;
            color: black;
            margin-right: 0px;
        }
        .data_manager_report-btn {
            background-color: #9FD7F9;
            color: black;
            margin-right: 35px;
        }
        .add-btn:hover, .data_manager_report-btn:hover {
            background-color: #3EAEF4;
        }
        button {
            background-color: #9FD7F9;
            color: black;
            border: none;
            padding: 2px 4px;
            cursor: pointer;
            border-radius: 8px;
            width: 48px;
        }
        button:hover {
            background-color: #3EAEF4;
        }
        #information-table {
            width: 100%;
            height: 500px;
            border-collapse: collapse;
            table-layout: fixed;
        }
        #information-table tr:first-child th {
            position: sticky; 
            top: 0; 
            background-color: #9FD7F9; 
        }
        #information-table th,
        #information-table td {
            border: 1px solid #ddd; 
            padding: 10px; 
            text-align: left; 
        }
    </style>

                <!-- render data  -->
                <div class="form-data_manager">
                    <div class="form-data_manager_report">
                        <p class="data_manager_report-text">Báo cáo từ ngày ... đến ngày ...</p>
                        <!-- Chuyển dữ liệu bảng thành file  -->
                        <script src="./js/convert2Excel.js"></script>
                        <?php
                            if(isset($_SESSION['role'])){
                                if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager'){
                                    echo'<a type="button" class="add-btn" href="add-employee.php">Add Employee Data</a>';
                                }
                                elseif ($_SESSION['role'] == 'employee'){
                                    echo '<a type="button" class="delete-btn" href="assignment.php">Công việc</a>';
                                }
                            }
                        ?>

                        <button class="data_manager_report-btn" onclick="downloadExcel()">Export</button>
                    </div>  

                        
                    <div class="form-data_manager-table">
                        <table id="information-table">
                        <?php
                            require 'connect_database.php';
                            mysqli_set_charset($connect, 'UTF8');

                            $sql = "SELECT * FROM user_data";
                            $result = $connect->query($sql);

                                    echo '<tr>
                                        <th>User ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Address</th>
                                        <th>Date Of Birth</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Hire Date</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Action</th>
                                    </tr>';
            
                                    if ($result->num_rows > 0) {
                                        if (isset($_POST['search'])) {
                                            $name = $_POST['name_employee'];
                                            $position = $_POST['position_employee'];
                                            $sql1 = "SELECT * from user_data where last_name='$name' ";
                                            $sql2 = "SELECT * FROM user_data WHERE position = '$position'";
                                            $result1 = $connect->query($sql1);
                                            if ($result1->num_rows > 0) {
                                                while($row = $result1->fetch_assoc()) {
                                                    echo "<tr>
                                                <td>"  . $row["user_id"] . "</td>" .
                                                "<td>" . $row["fisrt_name"] . "</td>" .
                                                "<td>" . $row["last_name"] . "</td>" .
                                                "<td>" . $row["address"] . "</td>" .
                                                "<td>" . $row["date_of_birth"] . "</td>" .
                                                "<td>" . $row["phone"] . "</td>" .
                                                "<td>" . $row["email"] . "</td>" .
                                                "<td>" . $row["hire_date"] . "</td>" .
                                                "<td>" . $row["department"] . "</td>" .
                                                "<td>" . $row["position"] . "</td>" .
                                                "<td>
                                                    <form action='delete-employee.php' method='post'>
                                                        <button type='submit' name='delete' value='".$row['id']."'>Delete</button>
                                                    </form>
                                                    <form action='update-employee.php' method='post'>
                                                        <button type='submit' name='update' value='".$row['id']."'>Update</button>
                                                    </form>
                                                </td>
                                                </tr>";
                                                }
                                            }
                                            $result2 = $connect->query($sql2);
                                            if ($result2->num_rows > 0) {
                                                while($row = $result2->fetch_assoc()) {
                                                    echo "<tr>
                                                <td>"  . $row["user_id"] . "</td>" .
                                                "<td>" . $row["fisrt_name"] . "</td>" .
                                                "<td>" . $row["last_name"] . "</td>" .
                                                "<td>" . $row["address"] . "</td>" .
                                                "<td>" . $row["date_of_birth"] . "</td>" .
                                                "<td>" . $row["phone"] . "</td>" .
                                                "<td>" . $row["email"] . "</td>" .
                                                "<td>" . $row["hire_date"] . "</td>" .
                                                "<td>" . $row["department"] . "</td>" .
                                                "<td>" . $row["position"] . "</td>" .
                                                "<td>
                                                    <form action='delete-employee.php' method='post'>
                                                        <button type='submit' name='delete' value='".$row['id']."'>Delete</button>
                                                    </form>
                                                    <form action='update-employee.php' method='post'>
                                                        <button type='submit' name='update' value='".$row['id']."'>Update</button>
                                                    </form>
                                                </td>
                                                </tr>";
                                                }
                                            }
                                        }
                                        else{
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                <td>"  . $row["user_id"] . "</td>" .
                                                "<td>" . $row["fisrt_name"] . "</td>" .
                                                "<td>" . $row["last_name"] . "</td>" .
                                                "<td>" . $row["address"] . "</td>" .
                                                "<td>" . $row["date_of_birth"] . "</td>" .
                                                "<td>" . $row["phone"] . "</td>" .
                                                "<td>" . $row["email"] . "</td>" .
                                                "<td>" . $row["hire_date"] . "</td>" .
                                                "<td>" . $row["department"] . "</td>" .
                                                "<td>" . $row["position"] . "</td>" .
                                                "<td>
                                                    <form action='delete-employee.php' method='post'>
                                                        <button type='submit' name='delete' value='".$row['id']."'>Delete</button>
                                                    </form>
                                                    <form action='update-employee.php' method='post'>
                                                        <button type='submit' name='update' value='".$row['id']."'>Update</button>
                                                    </form>
                                                </td>
                                                </tr>";
                                            }
                                        }
                                    }
                                    
                            $connect->close();
                        ?>
                                <!-- <div class="model-updated">
                                    <div class="modal-dialog-update">
                                        <div class="modal-content-update">
                                            <div class="modal-header-update">
                                                <h4 class="modal-title">Update Data</h4>
                                            </div>
                                            <div class="modal-body"> -->
                                                <?php
                                                    require 'connect_database.php';
                                                    if (isset($_POST['choose'])) {
                                                        echo '<form action="" method="POST">
                                                            <div class="form-group-update">
                                                                <label>ID</label>
                                                                <input type="text" class="form-control-update" name="update_id" value="'.$_POST['choose'].'" readonly>
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
                                                    if (isset($_POST['update']))
                                                    {
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
                                                        if ($connect->query($sql2)==True) {

                                                            echo "Update succesfully <br>";
                                                        }
                                                        else{
                                                            echo "Update fail";
                                                        }
                                                    }


                                                    $connect->close();
                                                ?>
                                            <!-- </div>
                                        </div>
                                    </div>
                                </div> -->
                            </table>
                    </div>
                </div>
            </div>
        </div>
        <nav>

        </nav>
    </body>
    <script src="./js/index.js"></script>
    </html>
