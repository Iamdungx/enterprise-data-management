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

            <div class="account-title">
                <h4>CTy TNHH</h4>
            </div>

            <div class="icon-account">
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <div class="dropdown-content">
                <!-- <a href="{{ url_for('logout') }}">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Đăng xuất
                </a>                 -->
                <a href="./login.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Đăng xuất
                </a>
                
                <script>
                    function logout() {
                        // Use JavaScript to make a POST request to the /logout route
                        fetch('/logout', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({}),
                        })
                        .then(response => response.json())
                        .then(() => {
                            // Redirect the user to the root URL after logout
                            window.location.href = '/';
                        })
                        .catch(error => console.error('Logout failed:', error));
                    }
                </script>
                
            </div>
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
                            <a href="/html/maMau.html">Mã màu</a>
                        </li>
                        <li class="nav_bar-list-item">Thông tin nhân viên</li>
                        <li class="nav_bar-list-item">Danh sách nhân viên</li>
                        <li class="nav_bar-list-item">Quản lí hợp đồng</li>
                        <li class="nav_bar-list-item">Điều chuyển nhân viên</li>
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
                        <li class="nav_bar-list-item">Danh sách chấm công</li>
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
                        <li class="nav_bar-list-item">Quản lí đơn</li>
                        <li class="nav_bar-list-item">Đơn xin đổi ca</li>
                        <li class="nav_bar-list-item">Đơn giải trình</li>
                    </ul>
                </div>

                <div class="nav_bar-function">
                    <div class="nav_bar-function-content close">
                        <i class="nav_bar-function-icon fa-solid fa-code fa-lg"></i>
                        <a>Admin Console</a>
                        <div class="function-icon_arrow_AdminConsole">
                            <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                        </div>
                    </div>
                    <div class="nav_bar-function_child">
                        <ul class="nav_bar-function_child_AdminConsole none">
                            <li class="nav_bar-list-item" href="">Cấp tài khoản</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>


        
        <!-- 80% -->
        <div class="grid_system_row container-content">
            <!-- search data  -->
            <div class="container-search"> 
                <div class ="search-box">
                    <div class="search-box_item">
                        <div for="department">Bộ phận</div>
                        <input type="text" placeholder="VD: Van Chuyen">
                    </div>
                    <div class="search-box_item">
                        <div for="identification">Mã nhân viên</div>
                        <input type="text" placeholder="VD: AB21210">
                    </div>
                    <div class="search-box_item">
                        <div for="name">Tên</div>
                        <input type="text" placeholder="VD: Nguyen Van A">
                    </div>
                </div>
                <div class="search-button">
                    <form action="">
                        <button type="submit" name="search">Tìm kiếm</button>
                    </form>
                </div>
            </div> 
            

            <!-- render data  -->
            <div class="form-data_manager">
                <div class="form-data_manager_report">
                    <p class="data_manager_report-text">Báo cáo từ ngày ... đến ngày ...</p>
                    <!-- Chuyển dữ liệu bảng thành file  -->
                    <script src="./js/convert2Excel.js"></script>
                    <a type="button" class="add-btn" href="add-employee.php">Add Employee</a>
                    <button class="data_manager_report-btn" onclick="downloadExcel()">Export</button>
                </div>  


                <div class="form-data_manager-table">
                        <table id="information-table">
                            <tr>
                                <th>ID</th>
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
                            </tr>
    
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td>
                                    <a href="" class="update-btn">Update</a>
                                    <a href="" class="delete-btn">Delete</a>
                                </td>
                            </tr>
                            
                            <div class="model-updated">
                                <div class="modal-dialog-update">
                                    <div class="modal-content-update">
                                        <div class="modal-header-update">
                                            <h4 class="modal-title">Update Data</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST">
                                                <div class="form-group-update">
                                                    <label>First Name</label>
                                                    <input type="hidden" name="id" value="">
                                                    <input type="text" class="form-control-update" name="first_name" value="" required>
                                                </div>
                
                                                <div class="form-group-update">
                                                    <label>Last Name</label>
                                                    <input type="hidden" name="id" value="">
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
                                                    <button class="btn btn-primary" type="button">Update Data</button>          
                                                </div>    
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
