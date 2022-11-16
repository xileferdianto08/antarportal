<?php 
    include 'config/connect_db.php';

    
    $postId = isset($_GET['postId']) ? $_GET['postId'] : null;

    $query = "SELECT posts.postId, posts.postTitle, posts.publishDate, posts.postAuthor, posts.postPicture, posts.content, posts.categoryId, category.categoryName FROM posts
    LEFT JOIN category ON posts.categoryId = category.categoryId WHERE posts.postId =". $postId;

    $result = $db->query($query);
    $post = $result->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$post['postTitle']?></title>
    <link href="<?= $base_url?>assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base_url?>assets/css/postCss.css">
    <link rel="stylesheet" href="<?= $base_url?>assets/css/footer.css">


</head>
<body>
   <!-- navbar -->
   <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid justify-content-between ">
            <a class="navbar-brand" href="<?=$base_url?>index.php" style="font-size:26px">AntarPortal</a>

            <?php if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {?> 
                <div class="col-md-3 text-end">
                    <a href="login.php" class="btn btn-outline-light me-2">Login</a>
                    <a href="signUp.php" class="btn btn-warning">Sign up</a>
                </div>
            <?php } else{?>
                
                    <div class="row-cols-sm-1 " >
                        <?php 
                            $email = $_SESSION['email'];
                            $queryUser = $db->prepare("SELECT * FROM users WHERE email=:email");
                            $queryUser->bindParam(":email", $email);
                            $queryUser->execute();
                            $users = $queryUser->fetch();
                            if($queryUser->rowCount() > 0){ ?>
                                <span class="navbar-text" style="color:light-gray;">Logged in as <?= $users['firstName'] . " " . $users['lastName'];?></span>
                            <?php } ?>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-warning" data-toggle="collapse" data-bs-toggle="modal" data-bs-target="#logout">Logout</button>
                    </div>    
                       
            <?php }?>
        </div>
    </nav>
    <?php
    $postId = isset($_GET['postId']) ? $_GET['postId'] : null;

    $query = "SELECT posts.postId, posts.postTitle, posts.publishDate, posts.postAuthor, posts.postPicture, posts.content, posts.categoryId, category.categoryName FROM posts
    LEFT JOIN category ON posts.categoryId = category.categoryId WHERE posts.postId =". $postId;

    $result = $db->query($query);
    $post = $result->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="container row-cols-sm-1">
        <h2 style="margin-top:1%"><strong><?=$post['postTitle'];?></strong></h2>
        <p style="font-size: 14px; color:grey"><strong>Written By: </strong><?=$post['postAuthor'];?> - <?=$post['publishDate'];?></p>
        <p style="font-size:14px; color:grey" ><strong> Category:</strong> <a href="<?=$base_url?>index.php?page=home&category=<?=$post['categoryId']; ?>" ><?=$post['categoryName']?></a></p>
        <img src="postAssets/<?=$post['postPicture'];?>" class="postImg">
        <p style="font-size: 16px; color:black"><?=$post['content']?></p>
 

    
    <?php
        $postId = isset($_GET['postId']) ? $_GET['postId'] : null;
        
        $commentResult = $db->prepare("SELECT comments.*, users.lastName, users.firstName, users.fotoUser FROM comments
                                    LEFT JOIN users ON comments.userId = users.userId
                                    WHERE postId = ". $postId);
        $commentResult->execute();
        $dataComment = $commentResult->fetchAll(PDO::FETCH_ASSOC);


        
    ?>
    <h3 style="margin-top:2%; margin-bottom:1%"><b>Comments:</b></h3>
    <?php if($commentResult->rowCount() > 0){ ?>
    
        <?php foreach($dataComment as $comments){?>
        <div class="card" style="width: 50%;margin-top:2%; margin-bottom:1%;">
            <div class="card-body">
                <?php if($comments['fotoUser'] == NULL){ ?>
                    <img src="<?=$base_url?>profileUser/avatar.png" class="userImg">
                <?php } else {?>
                    <img src="<?=$base_url?>profileUser/<?=$comments['fotoUser']?>" class="userImg">
                <?php } ?> 

                <h5 class="class-title"><?= $comments['firstName'] . " " . $comments['lastName'] ?></h5>

                <h6 class="card-subtitle mb-2 text-muted"><?=$comments['commentDate']?></h6>
                <p class="card-text"><?=$comments['comment']?></p>
            </div>  
        </div>
        <?php } ?>

   <?php } else { ?>
    <h4 style="margin-top:2%; margin-bottom:1%">No Comment Available Yet</h4>
    <?php } ?>

    <h3 style="margin-top:3%; margin-bottom:1%"><b>Add Comment</b></h3>
    <form action="<?=$base_url?>processing/doAddComment.php?post=<?= $postId?>" method="post" >
        <div class="form-group">
            <label for="comment"><b> Your Comment</b></label><br>
            <textarea name="comment" id="comment" cols="75" rows="5" placeholder="Comment here..." required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" style="margin-bottom: 2%;">Submit</buttont>
        </div>
    </form>

</div>
    <script src="<?= $base_url?>assets/js/bootstrap.js" ></script>
    <div class="modal fade" id="logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Logout confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you wanna log out?</p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-bs-dismiss="modal">Maybe not now</a>
                    <a href="logout.php" class="btn btn-primary">Yes I'm sure enough</a>
                </div>
            </div>
        </div>
    </div>

<script src="<?=$base_url?>assets/js/bootstrap.js"></script>


</body>
<footer class="footer">UTS Pemrograman Web (IF-330)</footer>
</html>


