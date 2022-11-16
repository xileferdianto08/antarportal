<?php
    include 'config/connect_db.php';
    
    $loggedUser = $_SESSION['email'];

    $query = $db->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindParam(":email", $loggedUser);
    $query->execute();
    $resultPost = $query->fetch();

    $date = date_create($resultPost['birthDate']);
    $birthDate = date_format($date, "Y/m/d");



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base_url?>assets/css/signup.css">
    <title>Edit Profile</title>
</head>
<body>
<form action="<?= $base_url ?>processing/doEditProfileAdmin.php" method="post" enctype="multipart/form-data">
    <div class="row-cols-sm-1" style="width: 100%" >
        <h1 style="text-align: center;">Edit Profile</h1>
        <hr>
        <div class="row">
      
          <div style="position: relative;text-align: center;margin-bottom: 1%;" >
            <label for="fotouser" > <b>Profile Image</b></label><br>
            <?php 
              if($resultPost['fotoUser'] == null){
                $foto = 'avatar.png';
              }else{
                $foto = $resultPost['fotoUser'];
              }
            ?>

            <img src="profileUser/<?=$foto?>" onclick="triggerClick()" id="profileDisplay" class="img">
            <input type="file" name="fotoUser" onchange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            
          </div>

    	  <div>
	    	  <label for="firstname"><b>First Name</b></label>
        	<input type="text" placeholder="First Name" name="firstName" id="firstName" value="<?=$resultPost['firstName']?>">
   		  </div>

        <div>
        	<label for="lastname"><b>Last Name</b></label>
        	<input type="text" placeholder="Last Name" name="lastName" id="lastName" value="<?=$resultPost['lastName']?>">
        </div>

		    <div>
        	<label for="tanggallahir"><b>Birth Date</b></label>
        	<input type="text" placeholder="yyyy/mm/dd" name="birthDate" id="birthDate" value="<?=$birthDate?>">
        </div>

        <div>
        	  <label for="gender" ><b>Gender</b></label><br>
            <?php 
              if($resultPost['gender'] == 'M'){
                $checked = 'checked';
              } else $checked = '';
              if($resultPost['gender'] == 'F'){
                $checked2 = 'checked';
              } else $checked2 = '';

            ?>
            <input type="radio" name="gender" value="M" id="gender"style="margin-top: 1%" <?= $checked; ?>> Male
            <input type="radio" name="gender" value="F" id="gender" style="margin-left:1%" <?= $checked2; ?>> Female
        </div>

        <div style="margin-top:1%;">
        	<label for="email"><b>Email</b></label>
        	<input type="text" placeholder="andre@example.com" name="email" id="email" value="<?=$resultPost['email']?>">
        </div>


    <div class="clearfix" align="center">
      <a href="<?=$base_url?>adminIndex.php">
      <button type="button" class="btn btn-danger">Cancel</button>
      </a>
      <button type="submit" class="signupbtn" name="save">Save Changes</button>
      
    </div>
  </div>
</form>

<script src="<?=$base_url?>/assets/js/profileimg.js"></script>
</body>
</html>