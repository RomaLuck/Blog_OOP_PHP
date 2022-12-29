<?php require_once "includes/header.php";
require_once "includes/init.php";
if (!$session->is_signed_in()) {
    redirect("login.php");
}
?>
<?php
$message = "";
if (isset($_FILES['file'])) {
    $photo = new Photo_db;
    $photo->title = $_POST['title'];
    $photo->set_files($_FILES['file']);

    if($photo->save()){
        $message = "Photo uploaded succesfully";
    }else{
        $message = join("<br>",$photo->errors);
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
                    Upload
                    <small></small>
                </h1>
                <div class="col-md-6">
                    <?php echo $message ?>
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" id="" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="file" id="" placeholder="" aria-describedby="fileHelpId">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
<div class="col-lg-12">
    <form action="upload.php" class="dropzone"></form>
</div>

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>