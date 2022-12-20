<?php require_once "includes/init.php";
if (!$session->is_signed_in()) {
    redirect("comments.php");
}

if(empty($_GET["id"])){
    redirect("comments.php");
}

$comment = Comment::find_by_Id($_GET['id']);
if($comment){
    $comment->delete();
    redirect("comments.php");
}else{
    redirect("comments.php");
}