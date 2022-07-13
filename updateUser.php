<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addUser.css">
    <title>Update User</title>
</head>
<body>
    <?php 
        $name = $_GET['name'];
        $email = $_GET['email'];
        $password = $_GET['pass'];
        $dob = $_GET['dob'];
        $id = $_GET['id'];
    ?>
    <div class="container">
        <form action="index.php" method="post">
            <input type="hidden" name="id" id="id" value='<?php echo $id?>'>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value='<?php echo $name?>'>
            <br>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value='<?php echo $email?>'>
            <br>
            <label for="password">Password</label>
            <input type="text" name="password" id="password" value='<?php echo $password?>'>
            <br>
            <label for="dob">Date Of Birth</label>
            <input type="text" name="dob" id="dob" value='<?php echo $dob?>'>
            <br>
            <!-- <input type="submit" name="subBtnForAddUser" id="subBtn" value="Submit"> -->
            <button type="submit" name="cancel" class="subBtn">Cancel</button>
            <button type="submit" name="subBtnForUpdateUser" class="subBtn canBtn">Submit</button>
            <br>
        </form>
    </div>
</body>
</html>