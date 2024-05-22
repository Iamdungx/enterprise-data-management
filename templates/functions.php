<?php
    require "connect_database.php";

    if(isset($_POST["Import"])){
            
            $filename=$_FILES["file"]["tmp_name"];		


            if($_FILES["file"]["size"] > 0)
            {
                $file = fopen($filename, "r");
                while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
                {

                    $first_name = $getData[0];
                    $last_name = $getData[1];
                    $gender = $getData[2];
                    $address = $getData[3];
                    $date_of_birth = $getData[4];
                    $phone = $getData[5];
                    $email = $getData[6];
                    $hire_date = $getData[7];
                    $department = $getData[8];
                    $position = $getData[9];
                    $password = $getData[10];
                    $role = $getData[11];

                    function generateUserID() {
                        $prefix = "HUMG";
                        $random_number = sprintf('%06d', mt_rand(0, 999999)); // Sinh số ngẫu nhiên từ 000000 đến 999999
                        return $prefix . $random_number;
                    }
                    // Tạo user_id mới và kiểm tra đến khi nào không trùng
                    do {
                        $user_id = generateUserID();
                        $check_query = "SELECT COUNT(*) as count FROM user_data WHERE user_id = '$user_id'";
                        $result = $connect->query($check_query);
                        $row = $result->fetch_assoc();
                        $user_id_exists = $row['count'] > 0;
                    } while ($user_id_exists);

                    $sqlAddEmployee = "INSERT INTO user_data (`fisrt_name`, `last_name`, `gender`, `address`, `date_of_birth`, `phone`, `email`, `hire_date`, `department`, `position`, `user_id`, `password`, `role`) 
                    VALUES ('$first_name', '$last_name', '$gender', '$address', '$date_of_birth', '$phone', '$email', '$hire_date', '$department', '$position', '$user_id', '$password', '$role')";

                    // Kiểm tra file đã được thêm thành công chưa
                    $resultAddEmployee = mysqli_query($connect, $sqlAddEmployee);

                    if(!isset($resultAddEmployee))
                    {
                        echo "<script type=\"text/javascript\">
                                alert(\"Invalid File:Please Upload CSV File.\");
                                window.location = \"add_employee.php\"
                            </script>";		
                    }
                    else {
                        echo "<script type=\"text/javascript\">
                            alert(\"CSV File has been successfully Imported.\");
                            window.location = \"employee_information.php\"
                        </script>";
                    }
                }
                
                fclose($file);	
            }
        }

        // Lấy tất cả records trong file csv
        // function get_all_records(){
        //     require "connect_database.php";
        
        //     $sql_seclect = "SELECT * FROM user_data";
        //     $result_select = mysqli_query($connect, $sql_seclect);  
        
        
        //     if (mysqli_num_rows($result_select) > 0) {
        //     echo "<table>
        //             <thead><tr>
        //                 <th>User ID</th>
        //                 <th>First Name</th>
        //                 <th>Last Name</th>
        //                 <th>Address</th>
        //                 <th>Date Of Birth</th>
        //                 <th>Phone</th>
        //                 <th>Email</th>
        //                 <th>Hire Date</th>
        //                 <th>Department</th>
        //                 <th>Position</th>
        //             </tr></thead><tbody>";
        
        
        //     while($row = mysqli_fetch_assoc($result_select)) {
        
        //         echo "<tr>
        //         <td>"  . $row["user_id"] . "</td>" .
        //             "<td>" . $row["fisrt_name"] . "</td>" .
        //             "<td>" . $row["last_name"] . "</td>" .
        //             "<td>" . $row["address"] . "</td>" .
        //             "<td>" . $row["date_of_birth"] . "</td>" .
        //             "<td>" . $row["phone"] . "</td>" .
        //             "<td>" . $row["email"] . "</td>" .
        //             "<td>" . $row["hire_date"] . "</td>" .
        //             "<td>" . $row["department"] . "</td>" .
        //             "<td>" . $row["position"] . "</td></tr>";        
        //     }
            
        //     echo "</tbody></table>";
            
        //     } else {
        //         echo "you have no records";
        //     }
        // }
?>