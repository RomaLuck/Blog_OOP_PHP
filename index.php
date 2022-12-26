<?php require_once("admin/includes/init.php"); ?>
<?php include("includes/header.php"); ?>
<?php
$page  = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 4;
$items_total_count = Photo_db::count_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);
$sql = "SELECT * FROM photos LIMIT {$items_per_page} OFFSET {$paginate->offset()}";
$photos = Photo_db::find_by_query($sql);

// $photos = Photo_db::find_all(); 
?>

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="thumbnails row">
                    <?php foreach ($photos as $photo) : ?>
                        <div class="col-xs-6 col-md-3">
                            <a class="thumbnail" href="photo.php?id=<?php echo $photo->id ?>">
                                <img class="home_page_photo" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <ul class="pager">
                        <?php
                        if ($paginate->page_total() > 1) :
                            if ($paginate->has_next()) : ?>
                                <li class='next'><a href="index.php?page=<?php echo $paginate->next(); ?>">next</a></li>
                        <?php endif;
                        endif;

                        for ($i=1; $i <= $paginate->page_total(); $i++) { 
                            if($i==$paginate->current_page){
                                echo "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
                            }else{
                                echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                            }
                        }

                        if ($paginate->page_total() > 1) :
                            if ($paginate->has_previous()) : ?>
                                <li class='previous'><a href="index.php?page=<?php echo $paginate->previous(); ?>">previous</a></li>
                        <?php endif;
                        endif;
                        ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>




    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">


        <?php include("includes/sidebar.php"); ?>



    </div>
    <!-- /.row -->

    <?php include("includes/footer.php"); ?>