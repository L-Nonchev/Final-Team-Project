<?php 

$user = json_decode($_SESSION['user']);
$sessuionUserId = $user->userId;
$userPic = $user->profilPicName;
$userName = $user->username;
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
	
	<title>Circle Video</title>
	
	<!-- =-=-=-=-=-=-= Bootstrap core CSS =-=-=-=-=-=-= -->
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- player -->
    <link rel="stylesheet" href="assets/js/vendor/player/johndyer-mediaelement-89793bc/build/mediaelementplayer.min.css" />


	<!-- =-=-=-=-=-=-= Theme CSS =-=-=-=-=-=-= -->
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/form-awesome.css" rel="stylesheet">
	<link href="assets/css/font-circle-video.css" rel="stylesheet">

	<!-- font-family: 'Hind', sans-serif; -->
	<link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700|Hind+Guntur:300,400,500,700' rel='stylesheet' type='text/css'>
</head>

<body class="channel light single-video">

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
											<li><a href="./HomePageController.php">Home Page</a></li>
											<li><a href="search.php">Searched Videos Page</a></li>
											<li><a href="singleVideoPlaylist.php">Single Videos Page With Playlist</a></li>
											<li><a href="subscription.php">Subscription Page</a></li>
										</ul></li>
									<li><a href="./AllCategoriesController.php">Categories</a></li>
									<li><a href="./channels.php">Channels</a></li>
								</ul>
							</div>
							<div class="visible-xs visible-sm clearfix"></div>
							<div class="col-lg-5 col-sm-8 col-xs-12">
								<form action="SearchController.php" method="post" id='search-form'>
									<div class="topsearch">
										<div class="input-group">
											<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-search"></i></span> 
											<input type="text" id='searchField' name='searchField'  class="form-control" placeholder="Search" aria-describedby="sizing-addon2">
											<input id='search-page' type="hidden" value = "<?=((isset($search)?$search:''))?>" />
											<div class="input-group-btn">
											
												<button id='searchButton' name='searchButton' type="button"	class="btn btn-default dropdown-toggle"	data-toggle="dropdown" aria-haspopup="true"
													aria-expanded="false">
													<i class="cv cvicon-cv-video-file"></i>&nbsp;&nbsp;&nbsp;
												</button>
											</div>
											<!-- /btn-group -->
										</div>
									</div>
								</form>
								<input id='category-id' type="hidden" value = "<?=((isset($categoryId)?$categoryId:''))?>" />
							</div>
							<div class="visible-xs clearfix"></div>
							<div class="col-lg-3 col-sm-8  col-xs-8">
								<div class="avatar pull-left">
		                            <img src="./assets/images/user-pictures/<?= $userPic?>" alt="avatar"  	/>
		                            <span class="status"></span>
		                        </div>
								<div class="selectuser pull-left">
									<div class="btn-group pull-right dropdown">
										<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="true"><?= $userName ?><span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $sessuionUserId ?>&page=Video">My Channel</a></li>
											<li><a href="./options.php">Options</a></li>
											<li><a href="./logOUT.php">Log Out</a></li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div>
							<a href="UploadController.php">
								<div class="upload-button">
									<i class="cv cvicon-cv-upload-video"></i>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- goto -->
		<div class="container-fluid">
			<div class="row">
				<div class="navbar-container2">
					<div class="container">
						<div class="row">
							<div class="col-lg-1 col-sm-2 col-xs-12">
								<div class="goto">Go to:</div>
							</div>
							<div class="col-lg-3  col-sm-10 col-xs-12">
								<div class="h-icons">
									<a href="likedVideos.php"><i class="cv cvicon-cv-liked" data-toggle="tooltip" data-placement="top" title="Liked Videos"></i></a> 
									<a href="watchLater.php"><i class="cv cvicon-cv-watch-later" data-toggle="tooltip" data-placement="top" title="Watch Later"></i></a> 
									<a href="savedPlaylist.php"><i class="cv cvicon-cv-play-circle" data-toggle="tooltip" data-placement="top" title="Saved Playlist"></i></a> 
									<a href="history.php"><i class="cv cvicon-cv-history" data-toggle="tooltip" data-placement="top" title="History"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /goto -->
	</header>
	<!-- =-=-=-=-=-=-= HEADER END =-=-=-=-=-=-= -->