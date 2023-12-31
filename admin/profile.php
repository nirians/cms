<?php include "includes/admin_header.php"; ?>

<?php

if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";

    $select_user_profile_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }
}

?>
<?php 

if (isset($_POST['edit_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $query = "UPDATE users SET ";
    $query .= "user_firstname = '$user_firstname', ";
    $query .= "user_lastname = '$user_lastname', ";
    $query .= "user_role = '$user_role', ";
    $query .= "username = '$username', ";
    $query .= "user_email = '$user_email', ";
    $query .= "user_password = '$user_password' ";
    $query .= "WHERE username = '{$username}'";
    $create_user_query = mysqli_query($connection, $query);

     confirm($create_user_query);
     header("Location: users.php");

}

?>
<div id="wrapper">
    <?php include "includes/admin_navigation.php"; ?>   
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">First Name</label>
                            <input type="text" value="<?php echo $user_firstname ?>" name="user_firstname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="post_status">Last Name</label>
                            <input type="text" value="<?php echo $user_lastname ?>" name="user_lastname" class="form-control">
                        </div>
                        <div class="form-group">
                            <select name="user_role" id="">
                                <option value="subscriber"><?php echo $user_role; ?></option>
                                    <?php if($user_role == 'admin') {
                                        echo "<option value='subscriber'>subscriber</option>";
                                    } else {
                                        echo "<option value='admin'>admin</option>";
                                    } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_tags">Username</label>
                            <input type="text" value="<?php echo $username ?>" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="post_content">Email</label>
                            <input type="email" value="<?php echo $user_email ?>" name="user_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="post_content">Password</label>
                            <input type="password" value="<?php echo $user_password ?>" name="user_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
                        </div>

                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
        <!-- /#page-wrapper -->
<?php "include/admin_footer.php" ?>