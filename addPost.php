<?php
include './config/connect_db.php';

$dataCategory = array();
$queryCategory = $db->query("SELECT * FROM category");
while($resultCategory = $queryCategory->fetch(PDO::FETCH_ASSOC)){
    $dataCategory[] = $resultCategory;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './include/header.php'; ?>
    <title>Add Post</title>
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
                        $queryUser = $db->prepare("SELECT * FROM users WHERE email=:email");
                        $queryUser->bindParam(":email", $email);
                        $queryUser->execute();
                        $users = $queryUser->fetch();
                        if($queryUser->rowCount() > 0){ ?>
                            <span class="navbar-text" style="color:light-gray;">Logged in as<?= $users['firstName'] . " " . $users['lastName'];?></span>
                        <?php } ?>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-warning" data-toggle="collapse" data-bs-toggle="modal" data-bs-target="#logout">Logout</button>
                </div>       
        </div>
    </nav> 
    <div class="row-cols-sm-1">
        <h1 style="text-align: center; margin-bottom:2%; margin-top:1%"><strong>Add Post</strong></h1>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group" style="width: 65%; margin-left:15%">
                <label class="label"><b>Title</b></label>
                <input type="text" class="form-control input" name="postTitle" placeholder="Article/Post Title">
            </div>
            <div class="form-group" style="width: 65%; margin-left:15%">
                <label class="label"><b>Category</b></label>
                <select class="form-control input" name="categoryId">
                    <option value="">Choose Category</option>
                    <?php foreach ($dataCategory as $key => $value): ?>

                    <option value="<?php echo $value["categoryId"] ?>"><?php echo $value["categoryName"] ?></option>
                        
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group" style="width: 65%; margin-left:15%">
                <label class="label"><b>Author</b></label>
                <input type="text" class="form-control input" name="postAuthor"><br>
            </div>
            <div class="form-group" style="width: 65%; margin-left:15%">
                <label class="label"><b>Content</b></label>
                <textarea class="form-control input" name="content" id="content" rows="10"></textarea>
                <script>
                        CKEDITOR.replace('content');
                </script><br>
            </div>
            <div class="form-group" style="width: 65%; margin-left:15%">
                <label class="label"><b>Publish Date</b></label>
                <input type="date" name="publishDate" class="form-control input">
            </div>
            <div class="form-group" style="width: 65%; margin-left:15%">
                <label class="label input"><b>Picture</b></label><br>
                <img src="postAssets/default.png" onclick="triggerClick()" id="postDisplay" style="width: 35%; height:65%; margin-bottom:2%">
                <input type="file" name="postPicture" onchange="displayImage(this)" id="postImg" class="form-control input" style="display: none;">
            </div>
            <a href="index.php" class="btn btn-danger" style="margin-left:15%;margin-top:2%; margin-bottom:3%">Cancel</a>
            <button class ="btn btn-primary" name="save" style="margin-top:2%; margin-bottom:3%;"><i class="fas fa-save"></i> Save</a></button>
        </form>            
    </div>
    </body>
    <footer class="footer">UTS Pemrograman Web (IF-330)</footer>

    <?php } else {
        include 'login.php';
    } ?>

<script src="<?=$base_url?>assets/js/postImg.js"></script>
<script src="<?= $base_url;?>assets/js/bootstrap.js" ></script>
<script src="<?= $base_url;?>assets/js/additionalJs.js"></script>
<script src="<?= $base_url;?>assets/js/all.js"></script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
</body>

</html>

<?php
if (isset ($_POST['save']))
{
	$postPicture = $_FILES['postPicture']['name'];
	$pictureDir =$_FILES['postPicture']['tmp_name'];
	move_uploaded_file($pictureDir, "postAssets/".$postPicture);
	$db->query("INSERT INTO posts
		(postTitle,categoryId, postAuthor,postPicture,content,publishDate)
		VALUES('$_POST[postTitle]','$_POST[categoryId]','$_POST[postAuthor]','$postPicture','$_POST[content]','$_POST[publishDate]')");
	echo "<script>alert('Post Successfully Added');</script>";
	echo "<script>location='$base_url/index.php';</script>";
}
?>