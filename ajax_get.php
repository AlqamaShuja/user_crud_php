<?php
        include_once('connection.php');
        $limitPerPage = 5;
        if(isset($_POST['page'])){
            $pageNo = $_POST['page'];
        }else{
            $pageNo = 1;
        }
        $offset = ($pageNo-1)*$limitPerPage;

        if(isset($_POST['search'])){
            $search = $_POST['search'];
            $selQuery = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%' LIMIT $limitPerPage offset $offset";
        }else{
            $selQuery = "SELECT * FROM users LIMIT $limitPerPage offset $offset";
        }
        $res = mysqli_query($conn, $selQuery);
        if(mysqli_num_rows($res)>0){
            $i = ($pageNo-1)*$limitPerPage + 1;
            $output = "<table>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date Of Birth</th>
                        <th>Update User</th>
                        <th>Delete User</th>
                    </tr>";

            //Loop on each Row
            while($row = mysqli_fetch_assoc($res)){
                $name = $row['name'];
                $email = $row['email'];
                $password = $row['password'];
                $dob = $row['dob'];
                $id = $row['id'];
                $output .= "<tr>
                        <td>$i</td>
                        <td>". $name."</td>
                        <td>". $email."</td>
                        <td>". $dob."</td>
                        <td><a class='update' href='updateUser.php?id=$id&name=$name&email=$email&dob=$dob&pass=$password'>"."Update"."</a></td>
                        <td><a class='update delete' href='index.php?delUserId=$id' name='deleteUser'>"."Delete"."</a></td>
                    </tr>";
                $i++;
            }
            $output .= "</table>";
            
            //Pagination Work
            if(isset($_POST['search'])){
                $search = $_POST['search'];
                $selQuery = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
            }else{
                $selQuery = "SELECT * FROM users";
            }
            $totalRows = mysqli_query($conn, $selQuery);
            if(mysqli_num_rows($totalRows)>0){
                $totalPage = ceil(mysqli_num_rows($totalRows)/$limitPerPage);
                $output .= "<div id='pagination'>";
                for($j=1; $j<=$totalPage; $j++){
                    if($pageNo == $j){
                        $output .= "<a class='active' id='$j' href=''>$j</a>";
                    }else{
                        $output .= "<a class='notActive' id='$j' href=''>$j</a>";
                    }
                }
            }
            $output .= "</div>";
            echo $output;
        }
        else{
            echo "No Record Found";
        }
    ?>