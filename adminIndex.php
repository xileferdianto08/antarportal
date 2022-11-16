<?php 
    include './config/connect_db.php';

    $email = $_SESSION['email'];
    $query = $db->prepare("SELECT * FROM users WHERE email =:email");
    $query->bindParam(":email", $email);
    $query->execute();

    $result = $query->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './include/header.php'; ?>
    <title>Home</title>
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
                    <a type="button" href="profileAdmin.php" class="btn btn-outline-info" >Profile</a>
                    <button type="button" class="btn btn-warning" data-toggle="collapse" data-bs-toggle="modal" data-bs-target="#logout">Logout</button>
                </div>       
        </div>
    </nav>  
    <!-- category list -->
    <header>
        <ul class="nav nav-pills mb-auto justify-content-center ">            
            <li class="nav-item" style="margin-top: 2%; margin-bottom: 2%" >
                <a class="nav-link active" href="<?=$base_url?>adminIndex.php" style="background-color: #17a2b8;"><i class="fas fa-house-user"></i> Home</a>
            </li>
            <?php
                $query = $db->prepare("SELECT * FROM category");
                $query->execute();
                $dataCategory = $query->fetchAll();
                foreach($dataCategory as $data){
                    if(isset($_GET['category'])){
                        if($data['categoryId'] === $_GET['category']){
                            $active = "active";
                        }else{
                            $active = " ";
                        }
                    }
                    if(!isset($_GET['category'])) $active = "" ?>
                <li class="nav-item" style="margin-top: 2%; margin-bottom:2%;" >
                    <a class="nav-link <?=$active;?>"  href="<?=$base_url?>adminIndex.php?page=home&category=<?= $data['categoryId'];?>"><?=$data['categoryName'];?></a>
                </li>
            <?php }?>
            <li class="nav-item" style="margin-top: 2%; margin-bottom:2%">
                <a class="nav-link active" href="addPostAdmin.php"><i class="fas fa-plus-square"></i> Add Post</a>
            </li>
        </ul>

    </header>


    <!-- log out confirmation -->
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

    <!-- back to top -->
    <button type="button" id="btn-back-to-top" class="btn btn-warning btn-floating btn-lg">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script src="<?= $base_url;?>assets/js/bootstrap.js" ></script>
    <script src="<?= $base_url;?>assets/js/additionalJs.js"></script>
    <script src="<?= $base_url;?>assets/js/all.js"></script>
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    

    <script>
        AOS.init();
    </script>

        <!-- Get category id -->
        <?php
        if (isset($_GET['id'])) {
            $sql="select * from posts where postId=".$_GET['id']."";
            $hasil= $db->query($sql);
            $data = $hasil->fetch(PDO::FETCH_ASSOC);
        }else if (isset($_GET['category'])){
            $sql="select * from category where categoryId=".$_GET['category']."";
            $hasil= $db->query($sql);
            $data = $hasil->fetch(PDO::FETCH_ASSOC);
        }

        
        //redirect
        if(isset($_GET['page'])){
            $halaman = $_GET['page'];
            switch ($halaman) {
                case 'home':
                    include "adminHome.php";
                    break;
                case 'delete':
                    include "./processing/doDeletePost.php";
                    break;
                default:
                    echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                break;
            }
        }else {
            include "adminHome.php";
        }
        

    } else {
        include 'login.php';
    } ?>
            
</body>
<footer class="footer">UTS Pemrograman Web (IF-330)</footer>
</html>