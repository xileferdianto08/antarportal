<?php
include '../config/connect_db.php';

if(isset($_POST['signup'])){

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$birthDate = $_POST['birthDate'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashedPwd = hash('sha512', $password);

$profileImageName = time() . '-' . $_FILES["fotoUser"]["name"];
// For image upload
$target_dir = "../profileUser/";
$target_file = $target_dir . basename($profileImageName);
move_uploaded_file($_FILES["fotoUser"]["tmp_name"], $target_file);

$queryInsert = $db->prepare("INSERT INTO users (userId, firstName, lastName, email, password, userType, birthDate, gender, fotoUser) 
                            values (NULL, :firstName, :lastName, :email, :password, 'user', :birthDate, :gender, :fotoUser)");
$queryInsert->bindParam(':fotoUser', $profileImageName);
$queryInsert->bindParam(':firstName', $firstName);
$queryInsert->bindParam(':lastName', $lastName);
$queryInsert->bindParam(':birthDate', $birthDate);
$queryInsert->bindParam(':gender', $gender);
$queryInsert->bindParam(':email', $email);
$queryInsert->bindParam(':password', $hashedPwd);
$resultInsert = $queryInsert->execute();
}

header("location: $base_url/login.php");
?>

