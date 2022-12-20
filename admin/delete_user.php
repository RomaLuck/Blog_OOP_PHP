<?php require_once "includes/init.php";
if (!$session->is_signed_in()) {
    redirect("users.php");
}

if(empty($_GET["id"])){
    redirect("users.php");
}

$user = User_db::find_by_Id($_GET['id']);
if($user){
    $user->delete();
    redirect("users.php");
}else{
    redirect("users.php");
}