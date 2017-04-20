<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png">

    <title>Circle Video | Upload Edit Video Page</title>

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

<!-- logo, menu, search, avatar -->
<div class="container-fluid">
    <div class="row">
        <div class="btn-color-toggle">
            <img src="assets/images/icon_bulb_light.png" alt="">
        </div>
        <div class="navbar-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-sm-2 col-xs-2">
                        <a class="navbar-brand" href="index.html"><img src="assets/images/logo.svg" alt="Project name" class="logo" /></a>
                    </div>
       				<div class="col-lg-3 col-sm-10 col-xs-10">
						<ul class="list-inline menu">
							<li class="pages color-active">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li><a href="./index.php">Home Page</a></li>
<!-- 											<li><a href="upload.html">Upload Video Page</a></li> -->
<!-- 											<li><a href="upload-edit.html">Upload Video Edit Page</a></li> -->
									<li><a href="search.html">Searched Videos Page</a></li>
									<li><a href="channels.html">Channels Page</a></li>
									<li><a href="singleVideo.php">Single Videos Page WithTabs</a></li>
									<li><a href="singleVideoPlaylist.php">Single Videos Page With Playlist</a></li>
									<li><a href="categories.html">Browse Categories Page</a></li>
									<li><a href="categories_side_menu.html">Browse Categories Side Menu Page</a></li>
									<li><a href="subscription.html">Subscription Page</a></li>
								</ul></li>
							<li><a href="./categories.php">Categories</a></li>
							<li><a href="./channels.php">Channels</a></li>
						</ul>
					</div>
                    <div class="visible-xs visible-sm clearfix"></div>
                    <div class="col-lg-6 col-sm-8 col-xs-12">
                        <form action="search.html" method="post">
                            <div class="topsearch">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search" aria-describedby="sizing-addon2">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="cv cvicon-cv-video-file"></i>&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>/
                                        <ul class="dropdown-menu">
                                            <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                        </ul>
                                    </div><!-- /btn-group -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="visible-xs clearfix"></div>
               		<div class="col-lg-2 col-sm-4  col-xs-8">
						<div class="avatar pull-left">
                            <img src="slaves1.jpg" alt="avatar"  	/>
                            <span class="status"></span>
                        </div>
						<div class="selectuser pull-left">
							<div class="btn-group pull-right dropdown">
								<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
									aria-haspopup="true" aria-expanded="true"> Bailey <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="./channel.php">My Channel</a></li>
									<li><a href="./signup.php">Sign up</a></li>
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
<!-- /logo -->

<!-- goto -->
<div class="container-fluid">
    <div class="row">
        <div class="navbar-container2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-sm-2 col-xs-12">
                        <div class="goto">
                            Go to:
                        </div>
                    </div>
                    <div class="col-lg-3  col-sm-10 col-xs-12">
                        <div class="h-icons">
                            <a href="#"><i class="cv cvicon-cv-liked" data-toggle="tooltip" data-placement="top" title="Liked Videos"></i></a>
                            <a href="#"><i class="cv cvicon-cv-watch-later" data-toggle="tooltip" data-placement="top" title="Watch Later"></i></a>
                            <a href="#"><i class="cv cvicon-cv-play-circle" data-toggle="tooltip" data-placement="top" title="Saved Playlist"></i></a>
                            <a href="#"><i class="cv cvicon-cv-purchased" data-toggle="tooltip" data-placement="top" title="Purchased Videos"></i></a>
                            <a href="#"><i class="cv cvicon-cv-history" data-toggle="tooltip" data-placement="top" title="History"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-10 col-xs-12">
                        <div class="h-resume">
                            <div class="play-icon">
                                <a href="#"><i class="cv cvicon-cv-play"></i></a>
                            </div>
                            Resume:  <span class="color-default">Daredevil Season 2 : Episode 6 </span>
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-2 hidden-xs">
                        <div class="h-grid">
                            <a href="#"><i class="cv cvicon-cv-grid-view"></i></a>
                            <a href="#"><i class="cv cvicon-cv-list-view"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /goto -->

<div class="content-wrapper upload-page edit-page">
    <div class="container-fluid u-details-wrap">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="u-details">
                            <div class="row">
                                <div class="col-lg-12 ud-caption">Upload Details</div>
                                <div class="col-lg-2"><img id='videoPoster' alt="" src="assets/images/<?= $videoPosterPath?>"></div>
                                <div class="col-lg-10">
                                	<div class="u-title"><?= $fileName ?></div>
                                    <div class="u-title" ><?= $printDuration ?></div>
                                    <div class="u-size"><?= $printFileSize ?></div>
                                    <div class="u-progress">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%;">
                                                <span class="sr-only">35% Complete</span>
                                            </div>
                                        </div>
                                        <div class="u-close">
                                            <a href="#"><i class="cvicon-cv-cancel"></i></a>
                                        </div>
                                    </div>
                                    <div class="u-desc">Your Video is still uploading, please keep this page open until it's done.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 " id='videoDetails'>

			<form action="addVideoController.php" method="post">
                <div class="u-form">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="e1">Video Title</label>
                                <input type="text" class="form-control" name='title' id="title" placeholder=<?php echo $fileName ?>>
                                <input type="hidden" id = 'duration' value = "<?= $printDuration ?>"/>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="e2">About</label>
                                <textarea class="form-control" name="description" id="description" rows="3">Description</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="e4">Privacy Settings</label>
                                <select class="form-control" id="privace" name="privace">
                                    <option value='false'>Public</option>
                                    <option value='true'>Private</option>

                                </select>
                             </div>
                         </div>
                         <div class="col-lg-3">
                            <div class="form-group">
                                <label for="e4">Gategory</label>
                                <select class="form-control" id="category" name="category" onclick='showMusicGenre()'>
                                    <option value='1'>Film & Animation</option>
                                    <option value='2'>Cars & Vehicles</option>
                                    <option value='3'>Music</option>
                                    <option value='4'>Pets & Animals</option>
                                    <option value='5'>Sport</option>
                                    <option value='6'>Travel & Events</option>
                                    <option value='7'>Gaming</option>
                                    <option value='8'>People & Blogs</option>
                                    <option value='9'>Comedy</option>
                                    <option value='10'>Entertaiment</option>
                                    <option value='11'>News & Politics</option>
                                    <option value='12'>How-to & Style</option>
                                    <option value='13'>Educations</option>
                                    <option value='14'>Science & Technology</option>
                                    <option value='9'>Non-profits $ Activism</option>
                                </select>                               
                            </div>
                        </div>
                    </div>

                    <div id='conteinerMusicGenre'>
                    <div class="row ">
                        <div class="col-lg-12 u-category"> Music genre</div>
                    </div>

                    <div class="row">
                        <!-- checkbox 1col -->
                        <div class="col-lg-2">
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio"  name="musicGenre" value = '1'>
                                        <span class="arrow"></span>
                                    </label> Asian Pop (J-Pop, K-pop)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '2'/>
                                        <span class="arrow"></span>
                                    </label> Blues
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '3'/>
                                        <span class="arrow"></span>
                                    </label> Children’s Music
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '4'/>
                                        <span class="arrow"></span>
                                    </label> Classical Music
                                </label>
                            </div>
                            
                        </div>



                        <!-- checkbox 2col -->
                        <div class="col-lg-2">
                        	<div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '5'/>
                                        <span class="arrow"></span>
                                    </label> Country Music
                                </label>
                            </div>    
                             <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '6'/>
                                        <span class="arrow"></span>
                                    </label> Dance Music
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '7'/>
                                        <span class="arrow"></span>
                                    </label> European Music (Folk/Pop)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '8'/>
                                        <span class="arrow"></span>
                                    </label> Hip Hop/Rap
                                </label>
                            </div>
                            
                        </div>



                        <!-- checkbox 3col -->
                        <div class="col-lg-2">
                        	<div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '9'/>
                                        <span class="arrow"></span>
                                    </label> Indie Pop
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '10'/>
                                        <span class="arrow"></span>
                                    </label> Inspirational (incl. Gospel)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '11'/>
                                        <span class="arrow"></span>
                                    </label> Jazz
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '12'/>
                                        <span class="arrow"></span>
                                    </label> Latin Music
                                </label>
                            </div>
                            
                        </div>



                        <!-- checkbox 4col -->
                        <div class="col-lg-2">
                        	<div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '13'/>
                                        <span class="arrow"></span>
                                    </label> New Age
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '14'/>
                                        <span class="arrow"></span>
                                    </label> Opera
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '15'/>
                                        <span class="arrow"></span>
                                    </label> Pop (Popular music)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '16'/>
                                        <span class="arrow"></span>
                                    </label> R&B/Soul
                                </label>
                            </div>                            
                        </div>



                        <!-- checkbox 5col -->
                        <div class="col-lg-2">
                        	<div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '17'/>
                                        <span class="arrow"></span>
                                    </label> Reggae
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '18'/>
                                        <span class="arrow"></span>
                                    </label> Rock
                                </label>
                            </div>                            
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '19'/>
                                        <span class="arrow"></span>
                                    </label> Singer/Songw
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value ='20'/>
                                        <span class="arrow"></span>
                                    </label> Singer/Songwriter (inc. Folk)
                                </label>
                            </div>
                        </div>



                        <!-- checkbox 6col -->
                        <div class="col-lg-2">
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '21'/>
                                        <span class="arrow"></span>
                                    </label> Soundtrack
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value = '22'/>
                                        <span class="arrow"></span>
                                    </label> Vocal
                                </label>
                            </div>                            
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="radio" name="musicGenre" value ='23'/>
                                        <span class="arrow"></span>
                                    </label> World Music/Beats
                                </label>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>


                    <div>
            			<p id='errorUploded'></p>
            		</div>
                    <div class="u-area">
                        <a class="btn btn-primary u-btn" id='uploadVideo' onclick = 'uploded()' >Save</a>
                   	</div>
                </form>
                
                <div class="u-terms">
                    <p>By submitting your videos to circle, you acknowledge that you agree to circle's <a href="#">Terms of Service</a> and <a href="#">Community Guidelines</a>.</p>
                    <p>Please be sure not to violate others' copyright or privacy rights. Learn more</p>
                </div>
            </div>
            
            <div id='sucssesUploded'>
            	<div>
            		<p id='uploded'>Upload successfully!</p>
            	</div>
	            <div class="u-area">
	            	<a class="btn btn-primary u-btn" id='uploadVideo' >Open video</a>
	            	<a class="btn btn-primary u-btn" id='uploadVideo' >Go to home page</a>
	            </div>
	        </div>
        </div>
    </div>
</div>

<?php 
	require 'footer.php';
?>