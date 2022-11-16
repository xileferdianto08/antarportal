<?php
include '../config/connect_db.php';

if(isset($_POST['save'])){

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthDate = $_POST['birthDate'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

    $profileImageName = time() . '-' . $_FILES["fotoUser"]["name"];
    // For image upload
    $target_dir = "../profileUser/";
    $target_file = $target_dir . basename($profileImageName);
    move_uploaded_file($_FILES["fotoUser"]["tmp_name"], $target_file);

    $queryInsert = $db->prepare("UPDATE users 
                                SET fotoUser = :fotoUser, firstName = :firstName, lastName = :lastName, birthDate = :birthDate, gender = :gender, email = :email
                                WHERE email = :email");
    $queryInsert->bindParam(':fotoUser', $profileImageName);
    $queryInsert->bindParam(':firstName', $firstName);
    $queryInsert->bindParam(':lastName', $lastName);
    $queryInsert->bindParam(':birthDate', $birthDate);
    $queryInsert->bindParam(':gender', $gender);
    $queryInsert->bindParam(':email', $email);
    $resultInsert = $queryInsert->execute();
}

header("location: $base_url/index.php");
?>

