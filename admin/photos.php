<?php include "includes/header.php";
if (!$session->is_signed_in()) {
    redirect("login.php");
}

$page = !empty($_GET['page']) ? $_GET['page'] : 1;
$items_per_page = 4;
$items_total_count = Photo_db::count_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);
$sql = "SELECT * FROM photos LIMIT {$items_per_page} OFFSET {$paginate->offset()}";
$photos = Photo_db::find_by_query($sql);
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
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Id</th>
                                <th>File Name</th>
                                <th>Title</th>
                                <th>Size</th>
                                <th>Photos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($photos as $photo) : ?>
                                <tr>
                                    <td><img src="<?php echo $photo->picture_path(); ?>" alt="">
                                        <div class="picture_actions">
                                            <a href="delete_photo.php?id=<?php echo $photo->id; ?>">delete</a>
                                            <a href="edit_photo.php?id=<?php echo $photo->id; ?>">edit</a>
                                            <a href="../photo.php?id=<?php echo $photo->id; ?>">view</a>
                                        </div>
                                    </td>

                                    <td><?php echo $photo->id; ?></td>
                                    <td><?php echo $photo->filename; ?></td>
                                    <td><?php echo $photo->title; ?></td>
                                    <td><?php echo $photo->size; ?></td>
                                    <td>
                                        <a href="comment_photo.php?id=<?php echo $photo->id; ?>">
                                            <?php
                                            $comment = Comment::find_the_comments($photo->id);
                                            echo count($comment);
                                            ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <ul class="pager">
                        <?php
                        if ($paginate->page_total() > 1) {
                            if ($paginate->has_next()) {
                                echo "<li class='next'><a href='photos.php?page={$paginate->next()}'>next</a></li>";
                            }

                            for ($i = 1; $i <= $paginate->page_total(); $i++) {
                                if ($i == $paginate->current_page) {
                                    echo "<li class='active'><a href='photos.php?page={$i}'>{$i}</a></li>";
                                } else {
                                    echo "<li><a href='photos.php?page={$i}'>{$i}</a></li>";
                                }
                            }

                            if ($paginate->has_previous()) {
                                echo "<li class='previous'><a href='photos.php?page={$paginate->previous()}'>previous</a></li>";
                            }
                        }

                        ?>


                    </ul>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>