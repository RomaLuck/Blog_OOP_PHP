<?php include "includes/header.php";
if (!$session->is_signed_in()) {
    redirect("login.php");
}
if (empty($_GET['id'])) {
    redirect("photos.php");
} else {
    $photo = Photo_db::find_by_Id($_GET['id']);
    if (isset($_POST['update'])) {
        if ($photo) {
            $photo->title = $_POST['title'];
            $photo->caption = $_POST['caption'];
            $photo->alternate_text = $_POST['alternate_text'];
            $photo->description = $_POST['description'];
            $photo->save();
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
                    Photos
                    <small>Subheading</small>
                </h1>
                <form action="" method="post">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="title" id="" class="form-control" placeholder="" value="<?php echo $photo->title; ?>">
                        </div>
                        <div class="form-group">
                            <a class="thumbnail" href=""><img src="<?php echo $photo->picture_path(); ?>" class="" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <input type="text" name="caption" id="" class="form-control" placeholder="" value="<?php echo $photo->caption; ?>">
                        </div>
                        <div class="form-group">
                            <label for="caption">Alternate text</label>
                            <input type="text" name="alternate_text" id="" class="form-control" placeholder="" value="<?php echo $photo->alternate_text; ?>">
                        </div>
                        <div class="form-group">
                            <label for="summernote">Description</label>
                            <textarea class="form-control" name="description" id="summernote" cols="30" rows="10"><?php echo $photo->description; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="photo-info-box">
                            <div class="info-box-header">
                                <h4>Save <span id="toogle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                            </div>
                            <div class="inside">
                                <div class="box-inner">
                                    <p class="text">
                                        <span class="glyphicon glyphicon-calendar"></span>Uploaded on: Uploaded on: April 22, 2030 @ 5:26
                                    </p>
                                    <p class="text">
                                        Photo id: <span class="data photo_id_box"><?php echo $photo->id;?></span>
                                    </p>
                                    <p class="text">
                                        Filename: <span class="data"><?php echo $photo->filename;?></span>
                                    </p>
                                    <p class="text">
                                        File type: <span class="data"><?php echo $photo->type;?></span>
                                    </p>
                                    <p class="text">
                                        File size: <span class="data"><?php echo $photo->size;?></span>
                                    </p>
                                </div>
                                <div class="info-box-footer clearfix">
                                    <div class="info-box-delete pull-left">
                                        <a class="btn btn-danger btn-lg" href="delete_photo.php?id=<?php echo $photo->id; ?> ">delete</a>
                                    </div>
                                    <div class="info-box-update pull-right">
                                        <input type="submit" name="update" class="btn btn-primary btn-lg" value="update">
                                    </div>
                                </div>
                            </div>
                        </div>
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