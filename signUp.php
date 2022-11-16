<?php
    include 'config/connect_db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base_url?>assets/css/signup.css">
    <title>Sign Up</title>
</head>
<body>
<form action="<?= $base_url ?>processing/doSignUp.php" method="post" enctype="multipart/form-data">

    <div class="row-cols-sm-1" style="width: 100%" >
        <h1 style="text-align: center;">Sign Up</h1>
        <p style="text-align: center;">Please fill in this form to create an account.</p>
        <hr>
        <div class="row">
      
          <div style="position: relative;text-align: center;margin-bottom: 1%;" >
            <label for="fotouser" > <b>Profile Image</b></label><br>
            <img src="profileUser/avatar.png" onclick="triggerClick()" id="profileDisplay" class="img">
            <input type="file" name="fotoUser" onchange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            
          </div>

    	  <div>
	    	  <label for="firstname"><b>First Name</b></label>
        	<input type="text" placeholder="First Name" name="firstName" id="firstName" required>
   		  </div>

        <div>
        	<label for="lastname"><b>Last Name</b></label>
        	<input type="text" placeholder="Last Name" name="lastName" id="lastName" required>
        </div>

		    <div>
        	<label for="tanggallahir"><b>Birth Date</b></label>
        	<input type="text" placeholder="yyyy/mm/dd" name="birthDate" id="birthDate" required>
        </div>

        <div>
        	  <label for="gender" ><b>Gender</b></label><br>
            <input type="radio" name="gender" value="M" id="gender"style="margin-top: 1%"> Male
            <input type="radio" name="gender" value="F" id="gender" style="margin-left:1%"> Female
        </div>

        <div style="margin-top:1%;">
        	<label for="email"><b>Email</b></label>
        	<input type="text" placeholder="andre@example.com" name="email" id="email" required>
        </div>

        <div>
    		  <label for="password"><b>Password</b></label>
    		  <input type="password" placeholder="Enter Password" name="password" id="password" required>
        </div>

    <div class="clearfix" align="center">
      <a href="<?=$base_url?>index.php">
      <button type="button" class="btn btn-danger">Cancel</button>
      </a>
      <button type="submit" class="signupbtn" name="signup">Sign Up</button>
      
    </div>
  </div>
</form>

<script src="<?=$base_url?>/assets/js/profileimg.js"></script>
</body>
</html>