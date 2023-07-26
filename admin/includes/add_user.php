<?php

if (isset($_POST['create_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

     $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
     $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}') ";

     $create_user_query = mysqli_query($connection, $query);

     confirm($create_user_query);

    echo "User Created: " . " " . "<a href='users.php'>View Users</a>";

}
?>
<form action="" method="post" enctype="multipart/form-data">
    
<div class="form-group">
        <label for="title">First Name</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>
    <div class="form-group">
        <label for="post_status">Last Name</label>
        <input type="text" name="user_lastname" class="form-control">
    </div>
  
    <div class="form-group">
        <select name="user_role" id="">
            <option value="subscriber">Select Options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
    
    <!-- <div class="form-group">
        <label for="post_image"></label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" name="user_email" class="form-control">
    </div>
    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" name="user_password" class="form-control">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>

</form>
