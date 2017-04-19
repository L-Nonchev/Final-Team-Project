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
	
	<title>Circle Video</title>
	
	<!-- =-=-=-=-=-=-= Bootstrap core CSS =-=-=-=-=-=-= -->
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- =-=-=-=-=-=-= PLAYER =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="js/vendor/player/johndyer-mediaelement-89793bc/build/mediaelementplayer.min.css" />
	
	<!-- =-=-=-=-=-=-= Theme CSS =-=-=-=-=-=-= -->
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/form-awesome.css" rel="stylesheet">
	<link href="assets/css/font-circle-video.css" rel="stylesheet">

	<!-- font-family: 'Hind', sans-serif; -->
	<link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700|Hind+Guntur:300,400,500,700' rel='stylesheet' type='text/css'>
</head>

<body class="channel light single-video ">

	<!-- =-=-=-=-=-=-= HEADER =-=-=-=-=-=-= -->
	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="btn-color-toggle">
					<img src="assets/images/icon_bulb_light.png" alt="">
				</div>
				<div class="navbar-container">
					<div class="container">
						<div class="row">
							<div class="col-lg-1 col-sm-2 col-xs-2">
								<a class="navbar-brand" href="./index.php">
								<img src="assets/images/logo.svg" alt="Project name" class="logo" /></a>
							</div>
							<div class="col-lg-3 col-sm-10 col-xs-10">
								<ul class="list-inline menu">
									<li class="pages color-active">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
										<ul class="dropdown-menu">
											<li><a href="./index.php">Home Page</a></li>
<!-- 											<li><a href="upload.html">Upload Video Page</a></li> -->
<!-- 											<li><a href="upload-edit.html">Upload Video Edit Page</a></li> -->
											<li><a href="search.php">Searched Videos Page</a></li>
											<li><a href="subscription.php">Subscription Page</a></li>
										</ul></li>
									<li><a href="./categories.php">Categories</a></li>
									<li><a href="./channels.php">Channels</a></li>
								</ul>
							</div>
							<div class="visible-xs visible-sm clearfix"></div>
							<div class="col-lg-6 col-sm-8 col-xs-12">
								<form action="search.php" method="post">
									<div class="topsearch">
										<div class="input-group">
											<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-search"></i></span> 
											<input type="text" class="form-control" placeholder="Search" aria-describedby="sizing-addon2">
											
											<div class="input-group-btn">
												<button type="button"	class="btn btn-default dropdown-toggle"	data-toggle="dropdown" aria-haspopup="true"
													aria-expanded="false">
													<i class="cv cvicon-cv-video-file"></i>&nbsp;&nbsp;&nbsp;
												</button>
											</div>
											<!-- /btn-group -->
										</div>
									</div>
								</form>
							</div>
							<div class="visible-xs clearfix"></div>
							<div class="col-lg-2 col-sm-4  col-xs-8">
								<div class="selectuser pull-left">
									<div class="btn-group pull-right dropdown">
										<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="true"> Log In / Sing Up <span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="./LogInController.php">Login</a></li>
											<li><a href="./SingUpController.php">Sign up</a></li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- =-=-=-=-=-=-= HEADER END =-=-=-=-=-=-= -->