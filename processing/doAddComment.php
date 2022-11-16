<?php 
    include '../config/connect_db.php';
    if (isset($_POST['comment'])) { 
        if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {
            echo "<script>alert('You need to login first before comment!');</script>";
            include '../login.php';
            
        } if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
            $comments = $_POST['comment'];
            $date = date("Y-m-d");
            $postId = $_GET['post'];
            
            $email = $_SESSION['email'];
            $queryUser = $db->prepare("SELECT * FROM users WHERE email=:email");
            $queryUser->bindParam(":email", $email);
            $queryUser->execute();
            $users = $queryUser->fetch();
            $userId = $users['userId'];

            $db->query("INSERT INTO comments (commentId, userId, postId, commentDate, comment)
                        VALUES ('NULL', '$userId', '$postId', '$date', '$comments')");
            
                        
            echo "<script>alert('Your comment successfully posted');</script>";
            echo "<script>location='$base_url/postPage.php?postId=$postId';</script>";
        }
    }
?>