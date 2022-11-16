<?php 
    include '../config/connect_db.php';

    $post = $_GET['post'];

    $query = $db->prepare("SELECT * FROM posts WHERE postId = :postId");
    $query->bindParam(":postId", $post);
    $query->execute();
    $result = $query->fetch();

    $postPicture = $result['postPicture'];

    if(file_exists("../postAssets/$postPicture")){
        unlink("../postAssets/$postPicture");
    }

    $db->query("DELETE FROM posts WHERE postId ='$post'");

    echo "<script>alert('Post succesfully deleted');</script>";
    echo "<script>location='$base_url/adminIndex.php';</script>";

?>