<?php $errorMessage = isset($errorMessage) ? $errorMessage : ''; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.png">

    <title>Circle Video | Signup Page</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/font-circle-video.css" rel="stylesheet">

    <!-- font-family: 'Hind', sans-serif; -->
    <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700|Hind+Guntur:300,400,500,700' rel='stylesheet' type='text/css'>
</head>

<body class="light">

<!-- =-=-=-=-=-=-= HEADER =-=-=-=-=-=-= -->
<header class="container-fluid">
    <div class="row">
        <div class="btn-color-toggle">
            <img src="assets/images/icon_bulb_light.png" alt="">
        </div>
        <div class="navbar-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-sm-2 col-xs-2">
                        <a class="navbar-brand" href="./index.php"><img src="assets/images/logo.svg" alt="Project name" class="logo" /></a>
                    </div>
                    <div class="col-lg-3 col-sm-10 col-xs-10">
                        <ul class="list-inline menu">
                       		 <li><a href="./HomePageController.php">Home Page</a></li>
                        </ul>
                    </div>
                    <div class="visible-xs visible-sm clearfix"></div>
               
                    <div class="visible-xs clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- =-=-=-=-=-=-= HEADER END =-=-=-=-=-=-= -->


<!-- =-=-=-=-=-=-=  SINGUP  =-=-=-=-=-=-= -->
<div class="container-fluid bg-image">
    <div class="row">
        <div class="login-wraper">
            <img src="assets/images/loginAndSingupBachGround.jpg" alt="" >
            <div class="banner-text">
                <div class="line"></div>
                <div class="b-text">
                    Watch <span class="color-active">millions<br> of</span> <span class="color-b1">v</span><span class="color-b2">i</span><span class="color-b3">de</span><span class="color-active">os</span> for free.
                </div>
                <div class="overtext">
                    Over 6000 videos uploaded Daily.
                </div>
            </div>
            <div class="login-window">
                <div class="l-head">
                    <h3>Sign Up for Free</h3>
                    <p><?= $errorMessage?></p>
                </div>
                <div class="l-form">
                    <form action="./SingUpController.php" method="post">
                    	 <div class="form-group">
                            <label for="username" id ="usernameLabel">Username</label>
                            <input name="username" type="text" class="form-control" id="InputUsername" placeholder="Username" required maxlength="20">
                        </div>
                         <div class="form-group">
                        	<label for="Countres">Country</label>
                        	<select name="country" id="Countres" class="form-control" >
                        	</select>
                        </div>
                        <div class="form-group">
                            <label for="email" id ="emailLabel">Email</label>
                            <input name="email" type="email" class="form-control" id="InputEmail" placeholder="sample@gmail.com" required maxlength="40">
                        </div>
                        <div class="form-group">
                            <label for="password" id ="password1Label">Password</label>
                            <input name="password" type="password" class="form-control" id="InputPassword1" placeholder="**********" required maxlength="40">
                        </div>
                        <div class="form-group">
                            <label for="re-password" id ="password2Label">Re-type Password</label>
                            <input name="re-password" type="password" class="form-control" id="InputPassword2" placeholder="**********" required maxlength="40">
                        </div>
                        <div class="row">
                            <div class="col-lg-7"><button type="submit" class="btn btn-cv1" name="sing-up-button" id="singUpButton">Sign Up</button></div>
                            <div class="col-lg-1 ortext">or</div>
                            <div class="col-lg-4 signuptext"><a href="./LogInController.php">Log In</a></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 forgottext">
                                <a href="#">By clicking "Sign Up" I agree to circle's Terms of Service.</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =-=-=-=-=-=-=  SINGUP END  =-=-=-=-=-=-= -->

<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
<?php 
	require 'view/footer.php';
	
?>