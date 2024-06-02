<form action="" method="post">
                                            <table class='table table-bordered' id='myDataTable' width='100%' cellspacing='0'>
                                            <?php
                                                require 'connect_database.php';
                                                $user_id = $_SESSION['nameaccount'];

                                                $sql = "SELECT user_data.fisrt_name, user_data.last_name, assignment.user_id, assignment.deadline, assignment.assignment_type, 
                                                assignment.status, assignment.assignment_id
                                                FROM user_data 
                                                INNER JOIN assignment 
                                                ON user_data.user_id = assignment.user_id
                                                WHERE assignment.user_id = '$user_id' and assignment.status = 'Incomplete'";
                                                $result = $connect->query($sql);

                                                if ($result->num_rows > 0) {
                                                    echo "
                                                            <thead>
                                                                <tr> 
                                                                    <th></th>
                                                                    <th>First Name</th>
                                                                    <th>Last Name</th>
                                                                    <th>ID</th>
                                                                    <th>Deadline</th>
                                                                    <th>Status</th>
                                                                    <th>Assignment</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>"; // Bắt đầu tbody ở đây
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>
                                                                <td> <input type='checkbox' name='checkbox[]' value='" . $row['assignment_id'] . "'/> </td>" .
                                                            "<td>" . $row["fisrt_name"] . "</td>" .
                                                            "<td>" . $row["last_name"] . "</td>" .
                                                            "<td>" . $row["user_id"] . "</td>" .
                                                            "<td>" . $row["deadline"] . "</td>" .
                                                            "<td>" . $row["status"] . "</td>" .
                                                            "<td>" . $row["assignment_type"] . "</td>
                                                            </tr>";
                                                    }
                                                    echo "</tbody>
                                                            </table>"; // Kết thúc tbody và table ở đây
                                                } else {
                                                    echo "Không có nhiệm vụ nào được giao";
                                                }
                                            ?>
                                            <input type="submit" value="COMPLETED ASSIGNMENT"/> <!-- Thêm type="submit" cho nút -->
                                        </form>