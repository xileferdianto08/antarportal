<?php
    include 'config/connect_db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= $base_url?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?=$base_url?>assets/css/additionalCss.css" rel="stylesheet">
    <link href="<?=$base_url?>assets/css/all.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>

    <h1 style="text-align:center; margin:2%"><strong>User Login</strong></h1>

    <form action="<?= $base_url ?>processing/doLogin.php" method="post">
            <div class="mb-2" align="center">
                <label for="email" class="form-label" style="width:35%">Email address</label>
                <input type="email" class="form-control" name="email" id="email"  style="width: 30%" placeholder="name@example.com">
            </div>
            <div class="mb-3" align="center">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" style="width: 30%" placeholder="Password">
            </div>
            <div class="mb-2" align="center">
                <label for="captcha" class="form-label">Captcha</label>
                <img src="<?=$base_url?>processing/captcha.php" style="width: 8%; height: 60px; margin-bottom:1%" alt="gambar"/>
                <input class="form-control" name="kodecaptcha" value="" maxlenght="6" style="width: 15%" placeholder="Captcha Result"/>
            </div>
            <div class="mb-6" align="center">
                <a href="<?= $base_url ?>index.php" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </div>

        <?php if(isset($errorLogin)){?>
        <div class="mt-4" align="center">
            <p class="alert alert-danger" role="alert" style="text-align:center;width: 30%;"> <strong>Email/Password salah</strong> </p>
        </div>
    <?php } if(isset($errorCaptcha)){ ?>
        <div class="mt-4" align="center">
            <p class="alert alert-danger" role="alert" style="text-align:center;width: 30%;"> <strong>Captcha salah</strong> </p>
        </div>
     <?php } if(isset($errorInput)){ ?>   
        <div class="mt-4" align="center">
            <p class="alert alert-danger" role="alert" style="text-align:center;width: 30%;"> <strong>Email/Password masih kosong</strong> </p>
        </div>
    <?php } ?>
    <?php if(isset($errorEmail)){ ?>   
        <div class="mt-4" align="center">
            <p class="alert alert-danger" role="alert" style="text-align:center;width: 30%;"> <strong>Email/Password salah</strong> </p>
        </div>
    <?php } ?>
    </form>

</body>
</html>