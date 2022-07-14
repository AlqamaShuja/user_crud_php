<?php
        include_once('connection.php');
        if(isset($_POST['search'])){
            $search = $_POST['search'];
            $selQuery = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
        }else{
            $selQuery = 'SELECT * FROM users';
        }
        $res = mysqli_query($conn, $selQuery);
        if(mysqli_num_rows($res)>0){
            $i=1;
            $output = "<tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date Of Birth</th>
                        <th>Update User</th>
                        <th>Delete User</th>
                    </tr>";
            
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
            echo $output;
        }
        else{
            echo "No Record Found";
        }
    ?>