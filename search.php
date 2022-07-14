<?php
    include_once('connection.php');
    $search = $_POST['search'];
    $selQuery = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
    $res = mysqli_query($conn, $selQuery);
    $i=1;

    // function deleteUser($id){
    //     $dltQuery = "DELETE FROM `users` WHERE $id";
    //     if(mysqli_query($conn, $dltQuery)){
    //         header("Location: index.php");
    //     }
    // }
    $output = "";
    
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
?>