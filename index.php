<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/login.php"; ?>

<?php
if (isset($error_message)) {
    echo '<script language="javascript">';
    echo 'alert("' . $error_message . '")';
    echo '</script>';
    unset($error_message); // Clear the error message to prevent it from showing on subsequent visits
}
?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php 
            $query ="SELECT * FROM posts ";
            $select_all_posts_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date= $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'], 0, 150);
                $post_status = $row['post_status'];

                if($post_status == 'Published' || $post_status == 'published') {
                ?>

                <!-- First Blog Post -->
                <h2>
                    <a style="background: none; color: inherit;" 
                       href="post.php?p_id=<?php echo $post_id; ?>">
                    <?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a style="background: none; color: inherit;" href="index.php"><?php echo $post_author ?></a>
                </p>
                <p>
                    <span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">
                    Read More
                <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>

            <?php } 
            }
             ?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>
                    <!-- /.row -->
                </div>
        </div>
        <!-- /.row -->
        <hr>
        <?php include "includes/footer.php";?>