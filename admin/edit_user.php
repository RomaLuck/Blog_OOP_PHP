<?php include "includes/header.php";
if (!$session->is_signed_in()) {
    redirect("login.php");
}
if (empty($_GET['id'])) {
    redirect("users.php");
}
$user = User_db::find_by_Id($_GET['id']);
if (isset($_POST['update'])) {
    if ($user) {
        $user->username = $_POST['username'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->password = $_POST['password'];

        if (empty($_FILES['user_image'])) {
            $user->save();
        } else {
            $user->set_files($_FILES['user_image']);
            $user->save_user_and_image();
            $user->save();
            redirect("edit_user.php?id={$user->id}");
        }
    }
}





?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php include "includes/top_nav.php"; ?>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include "includes/side_nav.php"; ?>
    <!-- /.navbar-collapse -->
</nav>



<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Users
                    <small>Subheading</small>
                </h1>
                <div class="col-md-6">
                    <img src="<?php echo $user->image_path_or_placeholder(); ?>" alt="">
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="file" name="user_image" id="" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="" class="form-control" placeholder="" value="<?php echo $user->username; ?>">
                        </div>
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" name="first_name" id="" class="form-control" placeholder="" value="<?php echo $user->first_name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" name="last_name" id="" class="form-control" placeholder="" value="<?php echo $user->last_name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="" class="form-control" placeholder="" value="<?php echo $user->password; ?>">
                        </div>
                        <a name="" id="" class="btn btn-danger" href="delete_user.php?id=<?php echo $user->id;?>">delete</a>
                        <input name="update" id="" class="btn btn-primary pull-right" type="submit" value="update">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>