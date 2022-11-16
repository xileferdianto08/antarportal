<?php
    include 'config/connect_db.php';

    $post = $_GET['post'];

    $queryPost = $db->prepare("SELECT * FROM posts WHERE postId=:postId");
    $queryPost->bindParam(":postId", $post);
    $queryPost->execute();
    $resultPost = $queryPost->fetch();

    $dataCategory =array();
    $queryCategory = $db->prepare("SELECT * FROM category");
    $queryCategory->execute();
    while($resultCategory = $queryCategory->fetch(PDO::FETCH_ASSOC)){
        $dataCategory[] = $resultCategory;
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './include/header.php'; ?>
    <title>Edit Post</title>
</head>
<body>
    <?php if (isset($_SESSION['email']) && !empty($_SESSION['email'])) { ?> 
    <!-- navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid justify-content-between ">
            <a class="navbar-brand" href="<?=$base_url?>adminIndex.php" style="font-size:26px">AntarPortal</a>               
                <div class="row-cols-sm-1 " >
                    <?php 
                        $email = $_SESSION['email'];
                        $queryUser = $db->prepare("SELECT * FROM users WHERE email=:email AND userType = 'admin'");
                        $queryUser->bindParam(":email", $email);
                        $queryUser->execute();
                        $users = $queryUser->fetch();
                        if($queryUser->rowCount() > 0){ ?>
                            <span class="navbar-text" style="color:light-gray;">Logged in as Admin <?= $users['firstName'] . " " . $users['lastName'];?></span>
                        <?php } ?>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-warning" data-toggle="collapse" data-bs-toggle="modal" data-bs-target="#logout">Logout</button>
                </div>       
        </div>
    </nav>  
<div class="row-cols-sm-1">
    <h1 style="text-align: center; margin-bottom:2%;margin-top:1%;"><strong>Edit Post</strong></h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group" style="width: 65%; margin-left:15%" >
            <label class="label" for="postTitle"><b>Post Title</b></label>
            <input type="text" class="form-control input" name="postTitle" value="<?=$resultPost['postTitle']?>">
        </div>
        <div class="form-group" style="width: 65%; margin-left:15%">
            <label class="label" for="categoryId"><b>Category Id</b></label>
            <select name="categoryId" id="categoryId" class="form-control input">
                <option value="">Choose category</option>
                <?php foreach($dataCategory as $key => $value): ?>
                    <option value="<?= $value["categoryId"];?>" <?php if($resultPost["categoryId"] === $value["categoryId"]) {echo "selected";}?>><?= $value["categoryName"] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group" style="width: 65%; margin-left:15%">
            <Label class="label" for="postAuthor"><b>Author</b></Label>
            <input type="text" name="postAuthor" id="postAuthor" class="form-control input" value="<?=$resultPost['postAuthor'];?>">
        </div>
        <div class="form-group" style="width: 65%; margin-left:15%">
            <label class="label input" class="input"><b>Post Picture</b></label><br>
            <img src="postAssets/<?=$resultPost['postPicture']?>" onclick="triggerClick()" id="postDisplay" style="width: 35%; height:65%; margin-bottom:2%">
            <input type="file" name="postPicture" onchange="displayImage(this)" id="postImg" class="form-control input" style="display: none;">
        </div>
        <div class="form-group" style="width: 65%; margin-left:15%">
            <label class="label" for="publishDate"><b>Publish Date</b></label>
            <input type="date" name="publishDate" id="publishDate" class="form-control input" value="<?=$resultPost['publishDate'];?>">
        </div>
        <div class="form-group" style="width: 65%; margin-left:15%">
            <label class="label" for="content"><b>Content</b></label>
            <textarea name="content" class="form-control input" id="content" rows="10">
                <?=$resultPost['content'];?>
            </textarea>
        </div>
        <a href="adminIndex.php" class="btn btn-danger" style="margin-left:15%;margin-top:2%; margin-bottom:3%">Cancel</a>
        <button class="btn btn-primary" name="edit" style=" margin-top:2%; margin-bottom:3%"><i class="far fa-edit"></i> Edit</button>
        <script>
                CKEDITOR.replace('content');
        </script>

        
    </form>
</div>


<?php } else {
        include 'login.php';
    } ?>

<script src="<?=$base_url?>assets/js/postImg.js"></script>
<script src="<?= $base_url;?>assets/js/bootstrap.js" ></script>
<script src="<?= $base_url;?>assets/js/additionalJs.js"></script>
<script src="<?= $base_url;?>assets/js/all.js"></script>

</body>
<footer class="footer">UTS Pemrograman Web (IF-330)</footer>
</html>

<?php
if (isset($_POST['edit'])) {
    
    $pictureName=$_FILES['postPicture']['name'];
    $pictureDir=$_FILES['postPicture']['tmp_name'];

    if(!empty($pictureDir)){
       move_uploaded_file($pictureDir,"postAssets/$pictureName");

        $db->query("UPDATE posts SET postTitle='$_POST[postTitle]',categoryId='$_POST[categoryId]',postAuthor='$_POST[postAuthor]',postPicture='$pictureName', content='$_POST[content]', publishDate='$_POST[publishDate]' WHERE postId='$_GET[post]'");
        
    }
    else{
       $db->query("UPDATE posts SET postTitle='$_POST[postTitle]', categoryId='$_POST[categoryId]',postAuthor='$_POST[postAuthor]', content='$_POST[content]', publishDate='$_POST[publishDate]' WHERE postId='$_GET[post]'");

    }
    echo "<script>alert('Post's successfully edited!');</script>";
	echo "<script>location='$base_url/adminIndex.php';</script>";
}
?>