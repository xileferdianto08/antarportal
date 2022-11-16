<?php
include '../config/connect_db.php';
if (isset($_POST["login"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == '' || $password == '') {
        $errorInput = true;
        include '../login.php';
    } else {
        $query = $db->prepare("SELECT * FROM users WHERE email =:email");
        $query->bindParam(":email", $email);
        $query->execute();

        $result = $query->fetch();
        if ($email != $result['email']) {
            $errorEmail = true;
            include '../login.php';
        } else {
            $hashedPwd = hash('sha512', $password);
            if ($query->rowCount() > 0) {

                if ($hashedPwd == $result["password"] && $_SESSION["code"] == $_POST["kodecaptcha"]) {
                    if ($result["userType"] == "admin") {
                        $_SESSION['email'] = $result['email'];
                        header("location: $base_url/adminIndex.php");
                    }
                    if ($result["userType"] == "user") {
                        $_SESSION['email'] = $result['email'];
                        header("location: $base_url/index.php");
                    }

                    exit;
                }
                if ($hashedPwd != $result["password"]) {
                    $errorLogin = true;
                }
                if ($_SESSION["code"] != $_POST["kodecaptcha"]) {
                    $errorCaptcha = true;
                }
                include '../login.php';
            }
        }
    }
}
