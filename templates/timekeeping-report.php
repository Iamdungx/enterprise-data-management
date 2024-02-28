  <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>HRM</title>
    <link href="{{ url_for('static', filename='Assets/css/index.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ url_for('static', filename='Assets/css/base.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./Assets/icons/fontawesome-free-6.1.1-web/css/all.css">

    <!-- Js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./Assets/JavaScript/index.js"></script>
</head>
<body>
    <!-- header -->
    <header class="header">
        <div class="hrm-title">
            <div class="title">
                <h4>HRM Admin</h4>
            </div>
            <div class="icon-nav">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        <!--header account-->
        <div class="account" id="dropdown">
            <div class="image-account">
                <img class="avatar-account" src="/Assets/image/icon-image.png" alt="hrm-icon">
            </div>

            <div class="account-title">
                <h4>CTy TNHH</h4>
            </div>

            <div class="icon-account">
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <div class="dropdown-content">
                <a href="#">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Đăng xuất
                </a>
                
            </div>
        </div>

    </header>

    <div class="grid_system_column container">
        <!-- 20% -->
        <div class="container-nav_bar">
            <div class="nav_bar-function">
                 <div class="nav_bar-function-content"> <!-- Quản lí nhân viên -->
                    <i class="nav_bar-function-icon fa-solid fa-sitemap"></i>
                    <a href="employee-manager.html">Quản lí nhân viên</a>
                    <div class="function-icon_arrow">
                        <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                    </div>
                </div>
                <ul class="nav_bar-function_child">
                    <li class="nav_bar-list-item">
                        <a href="maMau.html">Mã màu</a>
                    </li>
                    <li class="nav_bar-list-item">Danh sách phòng ban</li>
                    <li class="nav_bar-list-item">Danh sách nhân viên</li>
                    <li class="nav_bar-list-item">Quản lí hợp đồng</li>
                    <li class="nav_bar-list-item">Điều chuyển nhân viên</li>
                </ul>
            </div>

            <div class="nav_bar-function">
                <div class="nav_bar-function-content">
                    <i class="nav_bar-function-icon fa-solid fa-calendar-days"></i>
                    <a href="timekeeping-report.html">Báo cáo chấm công</a>
                    <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                </div>
                <ul class="nav_bar-function_child">
                    <li class="nav_bar-list-item">Báo cáo theo tuần</li>
                    <li class="nav_bar-list-item">Danh sách ca</li>
                    <li class="nav_bar-list-item">Báo cáo theo tháng</li>
                    <li class="nav_bar-list-item">Danh sách chấm công</li>
                </ul>
            </div>

            <div class="nav_bar-function">
                <div class="nav_bar-function-content">
                    <i class="nav_bar-function-icon fa-solid fa-envelopes-bulk"></i>
                    <a href="form-explaination.html">Đơn & giải trình</a>
                    <i class="nav_bar-function-icon fa-solid fa-angle-up"></i>
                </div>
                <ul class="nav_bar-function_child">
                    <li class="nav_bar-list-item">Quản lí đơn</li>
                    <li class="nav_bar-list-item">Đơn xin đổi ca</li>
                    <li class="nav_bar-list-item">Đơn giải trình</li>
                </ul>
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
                    <button class="data_manager_report-btn">import</button>
                </div>  

                <div class="form-data_manager-table">
                    <table>
                        <tr>
                            <th>#</th>
                            <th>Bộ phận</th>
                            <th>Mã nhân viên</th>
                            <th>Họ và tên</th>
                            <th>Thứ 2</th>
                            <th>Thứ 3</th>
                            <th>Thứ 4</th>
                            <th>Thứ 5</th>
                            <th>Thứ 6</th>
                            <th>Thứ 7</th>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>Buồng phòng</td>
                            <td>1234</td>
                            <td>Sơn</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <nav>

    </nav>
</body>
</html>
