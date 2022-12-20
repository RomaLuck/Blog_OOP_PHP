<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>
            <?php
            require_once "init.php";
// $user = new User_db();
// $user->username = "example username";
// $user->password = 12345;
// $user->first_name = "John";
// $user->last_name = "Doy";
// $user->create();

// $user = User_db::find_by_Id(10);
// $user->username = 'Pedro';
// $user->password = 12345;
// $user->first_name = 'Pedro';
// $user->last_name = 'Salvares';
// $user->update();
// var_dump($user);

// $users = User_db::find_all();
// foreach($users as $user){
//     echo $user->username;
// }

// $photo = new Photo_db;
// $photo->title = 'Photo of sea';
// $photo->description='Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi quam aspernatur quidem optio iure, harum est maxime quis! Eveniet unde odio vitae quos nisi odit! Delectus ipsum esse veritatis autem!';
// $photo->filename = 'image.jpg';
// $photo->type = 'image';
// $photo->size = 11;
// $photo->create();

// $photo = Photo::find_by_Id(1);
// var_dump($photo);
echo INCLUDES_PATH;
            ?>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>

