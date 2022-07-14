<style>
<?php 
    include_once('addUser.css');
?>
</style>
<div class="container">
    <form action="index.php" method="post">
        <input type="hidden" name="done" id="done" placeholder="">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter Name Here..">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Enter Email Here..">
        <br>
        <label for="password">Password</label>
        <input type="text" name="password" id="password" placeholder="Enter Password Here..">
        <br>
        <label for="dob">Date Of Birth</label>
        <input type="text" name="dob" id="dob" placeholder="Date Of Birth format dd/mm/yyyy">
        <br>
        <!-- <input type="submit" name="subBtnForAddUser" id="subBtn" value="Submit"> -->
        <button type="submit" name="cancel" class="subBtn canBtn">Cancel</button>
        <button type="submit" name="subBtnForAddUser" id="subBtnForAddUser" class="subBtn">Submit</button>
        <br>
    </form>
</div>