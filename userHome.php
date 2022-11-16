<div class="row-cols-sm-1">
    <!-- show posts per category -->
    <?php

    if (isset($_GET['category'])) {
        $queryPost = "SELECT * FROM posts WHERE categoryId=".$_GET['category']." ORDER BY publishDate asc";
        $queryCategory = "SELECT * FROM category WHERE categoryId=".$_GET['category'];

        $postResult = $db->query($queryPost);
        $dataPost = $postResult->fetchAll();

        $categoryResult = $db->query($queryCategory);
        $dataCategory = $categoryResult->fetchAll();
        

    ?>
    <main class="container">
        <?php foreach($dataPost as $post){?>
            <section class="card" data-aos="fade-left">
            
                <a href="postPage.php?postId=<?=$post['postId'];?>" class="img-hover-zoom"><img src="postAssets/<?= $post['postPicture'];?>" ></a>
                <div>
                    <h3><a href="postPage.php?postId=<?=$post['postId'];?>" class="hyperlink"><?= $post['postTitle'];?></a></h3>
                    <p>By: <?= $post['postAuthor'];?>. Date: <?= $post['publishDate'];?></p>
                    <?php foreach($dataCategory as $category){?>
                    <p>Category: <a href="<?=$base_url?>index.php?page=home&category=<?= $data['categoryId'];?>" class="hyperlink"><?= $category['categoryName']; ?></a>  </p>
                </div>
            </section>
            <?php } ?>
        <?php } ?>
    </main>

    <!-- show all posts -->
    <?php } else {
        $queryPost = $db->prepare("SELECT posts.postId, posts.postTitle, posts.publishDate, posts.postAuthor, posts.postPicture, category.categoryName, category.categoryId FROM posts
        LEFT JOIN category ON posts.categoryId = category.categoryId");
        $queryPost->execute();
        $dataAllPosts = $queryPost->fetchAll();?>
        <main class="container">
            <?php foreach($dataAllPosts as $post){?>
                <section class="card" data-aos="fade-left">
                    <a href="postPage.php?postId=<?=$post['postId'];?>" class="img-hover-zoom"><img src="postAssets/<?= $post['postPicture'];?>" ></a>
                    <div>
                        <h3> <a href="postPage.php?postId=<?=$post['postId'];?>" class="hyperlink"><?= $post['postTitle'];?></a></h3>
                        <p>By: <?= $post['postAuthor'];?>. Date: <?= $post['publishDate'];?></p>
                        <p>Category: <a href="<?=$base_url?>index.php?page=home&category=<?= $post['categoryId'];?>" class="hyperlink"><?= $post['categoryName']; ?></a> </p>
 
                    </div>
                </section>
            <?php } ?>
        </main>
   <?php }?>
    
    

</div>