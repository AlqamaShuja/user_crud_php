<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>User Data</title>
</head>
<body>
    <div class="container" >
        <a class="addUser" href="addUser.php">Add New User</a>
        <table id="users">
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date Of Birth</th>
                <th>Update User</th>
                <th>Delete User</th>
            </tr>
        </table>
    </div>

    <script src="ajax_get.js"></script>
</body>
</html>


<?php 
    include_once('connection.php');
    if(isset($_POST["subBtnForAddUser"])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $dob = $_POST['dob'];
        $addQuery = "INSERT INTO `users`(`id`, `name`, `email`, `password`, `dob`) VALUES (null,'$name','$email','$password','$dob')";
        if(mysqli_query($conn, $addQuery)){
            // header("Location: index.php");
        }
    }
    else if(isset($_POST["subBtnForUpdateUser"])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $dob = $_POST['dob'];
        $updateQuery = "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password',`dob`='$dob' WHERE `id`=$id";
        if(mysqli_query($conn, $updateQuery)){
            // header("Location: index.php");
        }
    }
    else if(isset($_GET['delUserId'])){
        $id = $_GET['delUserId'];
        $dltQuery = "DELETE FROM `users` WHERE id=$id";
        if(mysqli_query($conn, $dltQuery)){
            // header("Location: index.php");
        }
    }

?>