<!-- =-=-=-=-=-=-= HEADER  =-=-=-=-=-=-= -->
<?php 
// 	session_start();	
// 	if (isset($_SESSION['user'])){
		
// 		include 'logInHeader.php';
		
// 	}else {
// 		include 'header.php';
// 	}
?>
<!-- =-=-=-=-=-=-= HEADER END =-=-=-=-=-=-= -->

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- New Videos -->
                <div class="content-block head-div">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li><a href="new-videos" id='new-videos' class="color-active">New Videos</a></li>
                                </ul>
                            </div>
							<div class="col-lg-2 col-sm-2 col-xs-4">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Go to  <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                    	<li><a href="#new-videos"><i class="cv cvicon-cv-calender"></i> New Videos</a></li>
                                        <li><a href="#most-viewed"><i class="cv cvicon-cv-view-stats"></i> Most Viewed</a></li>
                                        <li><a href="#popular-video"><i class="cv cvicon-cv-watch-later"></i> Popular videos</a></li>                                        
                                        <li><a href="#popular-playlists"><i class="cv cvicon-cv-star"></i> Popular Playlists</a></li>
                                        <li><a href="#popular-channels"><i class="cv cvicon-cv-relevant"></i> Popular Channels</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content videolist">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$newVideos[0]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$newVideos[0]['video_id']??'';?>"><img src="assets/images/video-poster/<?=($newVideos[0]['poster_path'])??'';?>" alt="<?=($newVideos[0]['title'])??'';?>" ></a>
                                        <div class="time"><?=($newVideos[0]['duration'])??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="singleVideo.php?físeán%=<?=($newVideos[0]['video_id'])??''?>"><?=($newVideos[0]['title'])??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span> <?=($newVideos[0]['views'])??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$newVideos[1]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$newVideos[1]['video_id']??''?>"><img src="assets/images/video-poster/<?=$newVideos[1]['poster_path']??''?>" alt="<?=$newVideos[1]['title']??''?>" ></a>
                                        <div class="time"><?=$newVideos[1]['duration']??''?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="singleVideo.php?físeán%=<?=$newVideos[1]['video_id']??''?>"><?=$newVideos[1]['title']??''?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$newVideos[1]['views']??''?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                            	<div class="b-video">
                                    <div class="v-img" id=<?=$newVideos[2]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$newVideos[2]['video_id']??''?>"><img src="assets/images/video-poster/<?=$newVideos[2]['poster_path']??''?>" alt="<?=$newVideos[2]['title']??''?>" ></a>
                                        <div class="time"><?=$newVideos[2]['duration']??''?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="singleVideo.php?físeán%=<?=$newVideos[2]['video_id']??''?>"><?=$newVideos[2]['title']??''?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$newVideos[2]['views']??''?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$newVideos[3]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$newVideos[3]['video_id']??''?>"><img src="assets/images/video-poster/<?=$newVideos[3]['poster_path']??''?>" alt="<?=$newVideos[3]['title']??''?>" ></a>
                                        <div class="time"><?=$newVideos[3]['duration']??''?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$newVideos[3]['video_id']??''?>"><?=$newVideos[3]['title']??''?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$newVideos[3]['views']??''?> views.</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$newVideos[4]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$newVideos[4]['video_id']??''?>"><img src="assets/images/video-poster/<?=$newVideos[4]['poster_path']??'';?>" alt="<?=$newVideos[4]['title']??'';?>" ></a>
                                        <div class="time"><?=$newVideos[4]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$newVideos[4]['video_id']??'';?>"><?=$newVideos[4]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span> <?=$newVideos[4]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$newVideos[5]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$newVideos[5]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$newVideos[5]['poster_path']??'';?>" alt="<?=$newVideos[5]['title']??'';?>" ></a>
                                        <div class="time"><?=$newVideos[5]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$newVideos[5]['video_id']??'';?>"><?=$newVideos[5]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$newVideos[5]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                            	<div class="b-video">
                                    <div class="v-img" id=<?=$newVideos[6]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$newVideos[6]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$newVideos[6]['poster_path']??'';?>" alt="<?=$newVideos[6]['title']??'';?>" ></a>
                                        <div class="time"><?=$newVideos[6]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$newVideos[6]['video_id']??'';?>"><?=$newVideos[6]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$newVideos[6]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$newVideos[7]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$newVideos[7]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$newVideos[7]['poster_path']??'';?>" alt="<?=$newVideos[7]['title']??'';?>" ></a>
                                        <div class="time"><?=$newVideos[7]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$newVideos[7]['video_id']??'';?>"><?=$newVideos[7]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$newVideos[7]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=$newVideos[8]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$newVideos[8]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$newVideos[8]['poster_path']??'';?>" alt="<?=$newVideos[8]['title']??'';?>" ></a>
                                        <div class="time"><?=$newVideos[8]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$newVideos[8]['video_id']??'';?>"><?=$newVideos[8]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$newVideos[8]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=$newVideos[9]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$newVideos[9]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$newVideos[9]['poster_path']??'';?>" alt="<?=$newVideos[9]['title']??'';?>" ></a>
                                        <div class="time"><?=$newVideos[9]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$newVideos[9]['video_id']??'';?>"><?=$newVideos[9]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$newVideos[9]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=$newVideos[10]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$newVideos[10]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$newVideos[10]['poster_path']??'';?>" alt="<?=$newVideos[10]['title']??'';?>" ></a>
                                        <div class="time"><?=$newVideos[10]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$newVideos[10]['video_id']??'';?>"><?=$newVideos[10]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$newVideos[10]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=$newVideos[11]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$newVideos[11]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$newVideos[11]['poster_path']??'';?>" alt="<?=$newVideos[11]['title']??'';?>" ></a>
                                        <div class="time"><?=$newVideos[11]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$newVideos[11]['video_id']??'';?>"><?=$newVideos[11]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$newVideos[11]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /New Videos -->

                
                 <!-- Most Viewed -->
                <div class="content-block head-div">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li><a href="most-viewed" id='most-viewed' class="color-active">Most Viewed</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-xs-4">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Go to  <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                    	<li><a href="#new-videos"><i class="cv cvicon-cv-calender"></i> New Videos</a></li>
                                        <li><a href="#most-viewed"><i class="cv cvicon-cv-view-stats"></i> Most Viewed</a></li>
                                        <li><a href="#popular-video"><i class="cv cvicon-cv-watch-later"></i> Popular videos</a></li>                                        
                                        <li><a href="#popular-playlists"><i class="cv cvicon-cv-star"></i> Popular Playlists</a></li>
                                        <li><a href="#popular-channels"><i class="cv cvicon-cv-relevant"></i> Popular Channels</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content videolist">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$mostViewed[0]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[0]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$mostViewed[0]['poster_path']??'';?>" alt="<?=$mostViewed[0]['title']??'';?>" ></a>
                                        <div class="time"><?=$mostViewed[0]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="singleVideo.php?físeán%=<?=$mostViewed[0]['video_id']??'';?>"><?=$mostViewed[0]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span> <?=$mostViewed[0]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$mostViewed[1]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[1]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$mostViewed[1]['poster_path']??'';?>" alt="<?=$mostViewed[1]['title']??'';?>" ></a>
                                        <div class="time"><?=$mostViewed[1]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="singleVideo.php?físeán%=<?=$mostViewed[1]['video_id']??'';?>"><?=$mostViewed[1]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$mostViewed[1]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                            	<div class="b-video">
                                    <div class="v-img" id=<?=$mostViewed[2]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[2]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$mostViewed[2]['poster_path']??'';?>" alt="<?=$mostViewed[2]['title']??'';?>" ></a>
                                        <div class="time"><?=$mostViewed[2]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[2]['video_id']??'';?>"><?=$mostViewed[2]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$mostViewed[2]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$mostViewed[3]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[3]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$mostViewed[3]['poster_path']??'';?>" alt="<?=$mostViewed[3]['title']??'';?>" ></a>
                                        <div class="time"><?=$mostViewed[3]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[3]['video_id']??'';?>"><?=$mostViewed[3]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$mostViewed[3]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$mostViewed[4]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[4]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$mostViewed[4]['poster_path']??'';?>" alt="<?=$mostViewed[4]['title']??'';?>" ></a>
                                        <div class="time"><?=$mostViewed[4]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="singleVideo.php?físeán%=<?=$mostViewed[4]['video_id']??'';?>"><?=$mostViewed[4]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span> <?=$mostViewed[4]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$mostViewed[5]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[5]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$mostViewed[5]['poster_path']??'';?>" alt="<?=$mostViewed[5]['title']??'';?>" ></a>
                                        <div class="time"><?=$mostViewed[5]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[5]['video_id']??'';?>"><?=$mostViewed[5]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$mostViewed[5]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                            	<div class="b-video">
                                    <div class="v-img" id=<?=$mostViewed[6]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[6]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$mostViewed[6]['poster_path']??'';?>" alt="<?=$mostViewed[6]['title']??'';?>" ></a>
                                        <div class="time"><?=$mostViewed[6]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[6]['video_id']??'';?>"><?=$mostViewed[6]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$mostViewed[6]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$mostViewed[7]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[7]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$mostViewed[7]['poster_path']??'';?>" alt="<?=$mostViewed[7]['title']??'';?>" ></a>
                                        <div class="time"><?=$mostViewed[7]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[7]['video_id']??'';?>"><?=$mostViewed[7]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$mostViewed[7]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=$mostViewed[8]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[8]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$mostViewed[8]['poster_path']??'';?>" alt="<?=$mostViewed[8]['title']??'';?>" ></a>
                                        <div class="time"><?=$mostViewed[8]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[8]['video_id']??'';?>"><?=$mostViewed[8]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$mostViewed[8]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=$mostViewed[9]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[9]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$mostViewed[9]['poster_path']??'';?>" alt="<?=$mostViewed[9]['title']??'';?>" ></a>
                                        <div class="time"><?=$mostViewed[9]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[9]['video_id']??'';?>"><?=$mostViewed[9]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$mostViewed[9]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=$mostViewed[10]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[10]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$mostViewed[10]['poster_path']??'';?>" alt="<?=$mostViewed[10]['title']??'';?>" ></a>
                                        <div class="time"><?=$mostViewed[10]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[10]['video_id']??'';?>"><?=$mostViewed[10]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$mostViewed[10]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=$mostViewed[11]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[11]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$mostViewed[11]['poster_path']??'';?>" alt="<?=$mostViewed[11]['title']??'';?>" ></a>
                                        <div class="time"><?=$mostViewed[11]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$mostViewed[11]['video_id']??'';?>"><?=$mostViewed[11]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$mostViewed[11]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Most Viewed -->
                
                
                <!-- Popular videos-->
                <div class="content-block head-div">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li><a href="popular-video" id='popular-video' class="color-active">Popular videos</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-xs-4">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Go to  <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                    	<li><a href="#new-videos"><i class="cv cvicon-cv-calender"></i> New Videos</a></li>
                                        <li><a href="#most-viewed"><i class="cv cvicon-cv-view-stats"></i> Most Viewed</a></li>
                                        <li><a href="#popular-video"><i class="cv cvicon-cv-watch-later"></i> Popular videos</a></li>                                        
                                        <li><a href="#popular-playlists"><i class="cv cvicon-cv-star"></i> Popular Playlists</a></li>
                                        <li><a href="#popular-channels"><i class="cv cvicon-cv-relevant"></i> Popular Channels</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content videolist">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$popularVideo[0]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[0]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$popularVideo[0]['poster_path']??'';?>" alt="<?=$popularVideo[0]['title']??'';?>" ></a>
                                        <div class="time"><?=$popularVideo[0]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[0]['video_id']??'';?>"><?=$popularVideo[0]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span> <?=$popularVideo[0]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$popularVideo[1]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[1]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$popularVideo[1]['poster_path']??'';?>" alt="<?=$popularVideo[1]['title']??'';?>" ></a>
                                        <div class="time"><?=$popularVideo[1]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[1]['video_id']??'';?>"><?=$popularVideo[1]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$popularVideo[1]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                            	<div class="b-video">
                                    <div class="v-img" id=<?=$popularVideo[2]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[2]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$popularVideo[2]['poster_path']??'';?>" alt="<?=$mostViewed[2]['title']??'';?>" ></a>
                                        <div class="time"><?=$popularVideo[2]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[2]['video_id']??'';?>"><?=$popularVideo[2]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$popularVideo[2]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$popularVideo[3]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[3]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$popularVideo[3]['poster_path']??'';?>" alt="<?=$popularVideo[3]['title']??'';?>" ></a>
                                        <div class="time"><?=$popularVideo[3]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[3]['video_id']??'';?>"><?=$popularVideo[3]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$popularVideo[3]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$popularVideo[4]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[4]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$popularVideo[4]['poster_path']??'';?>" alt="<?=$popularVideo[4]['title']??'';?>" ></a>
                                        <div class="time"><?=$popularVideo[4]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[4]['video_id']??'';?>"><?=$popularVideo[4]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span> <?=$popularVideo[4]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$popularVideo[5]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[5]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$popularVideo[5]['poster_path']??'';?>" alt="<?=$popularVideo[5]['title']??'';?>" ></a>
                                        <div class="time"><?=$popularVideo[5]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[5]['video_id']??'';?>"><?=$popularVideo[5]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$popularVideo[5]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                            	<div class="b-video">
                                    <div class="v-img" id=<?=$popularVideo[6]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[6]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$popularVideo[6]['poster_path']??'';?>" alt="<?=$popularVideo[6]['title']??'';?>" ></a>
                                        <div class="time"><?=$popularVideo[6]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[6]['video_id']??'';?>"><?=$popularVideo[6]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$popularVideo[6]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=$popularVideo[7]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[7]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$popularVideo[7]['poster_path']??'';?>" alt="<?=$popularVideo[7]['title']??'';?>" ></a>
                                        <div class="time"><?=$popularVideo[7]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[7]['video_id']??'';?>"><?=$popularVideo[7]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$popularVideo[7]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=$popularVideo[8]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[8]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$popularVideo[8]['poster_path']??'';?>" alt="<?=$popularVideo[8]['title']??'';?>" ></a>
                                        <div class="time"><?=$popularVideo[8]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[8]['video_id']??'';?>"><?=$popularVideo[8]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$popularVideo[8]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=$popularVideo[9]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[9]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$popularVideo[9]['poster_path']??'';?>" alt="<?=$popularVideo[9]['title']??'';?>" ></a>
                                        <div class="time"><?=$popularVideo[9]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[9]['video_id']??'';?>"><?=$popularVideo[9]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$popularVideo[9]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=$popularVideo[10]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[10]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$popularVideo[10]['poster_path']??'';?>" alt="<?=$popularVideo[10]['title']??'';?>" ></a>
                                        <div class="time"><?=$popularVideo[10]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[10]['video_id']??'';?>"><?=$popularVideo[10]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$popularVideo[10]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=$popularVideo[11]['video_id']??'';?>>
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[11]['video_id']??'';?>"><img src="assets/images/video-poster/<?=$popularVideo[11]['poster_path']??'';?>" alt="<?=$popularVideo[11]['title']??'';?>" ></a>
                                        <div class="time"><?=$popularVideo[11]['duration']??'';?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=$popularVideo[11]['video_id']??'';?>"><?=$popularVideo[11]['title']??'';?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span><?=$popularVideo[11]['views']??'';?> views.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Polular videos -->
                
                
                <!-- Popular Playlists -->
                <div class="content-block head-div">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li><a href="#" class="color-active">Popular Playlists</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-xs-4">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by  <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content">
                        <div class="row">

                            <div class="col-lg-3 col-sm-6 col-xs-12">
                                <div class="b-playlist">
                                    <div class="v-img">
                                        <img src="assets/images/video1-1.png" alt="" class="l-1" />
                                        <img src="assets/images/video1-2.png" alt="" class="l-2" />
                                        <a href="singleVideo.php"><img src="assets/images/playlist-1.png" alt="" class="l-3" /></a>
                                        <div class="items">20</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="#">There Can Only Be One! Introducing Tanc & Hercules</a>
                                    </div>
                                    <div class="v-views">
                                        127,548 views. <span class="v-percent"><span class="v-circle"></span> 78%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-xs-12">
                                <div class="b-playlist">
                                    <div class="v-img">
                                        <img src="assets/images/video2-1.png" alt="" class="l-1" />
                                        <img src="assets/images/video2-2.png" alt="" class="l-2" />
                                        <a href="singleVideo.php"><img src="assets/images/playlist-2.png" alt="" class="l-3"></a>
                                        <div class="items">15</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="#">Pokémon 3: The Movie - Spell Of The Unown: Entei HD...</a>
                                    </div>
                                    <div class="v-views">
                                        18,241,542 views. <span class="v-percent"><span class="v-circle"></span> 93%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-xs-12">
                                <div class="b-playlist">
                                    <div class="v-img">
                                        <img src="assets/images/video2-6.png" alt="" class="l-1" />
                                        <img src="assets/images/video2-4.png" alt="" class="l-2" />
                                        <a href="singleVideo.php"><img src="assets/images/playlist-3.png" alt="" class="l-3" ></a>
                                        <div class="items">7</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="#">Bullet Trains and Octopus Balls in South Korea</a>
                                    </div>
                                    <div class="v-views">
                                        729,347 views . <span class="v-percent"><span class="v-circle"></span> 95%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-xs-12">
                                <div class="b-playlist">
                                    <div class="v-img">
                                        <img src="assets/images/video1-6.png" alt="" class="l-1" />
                                        <img src="assets/images/video1-4.png" alt="" class="l-2" />
                                        <a href="singleVideo.php"><img src="assets/images/playlist-4.png" alt="" class="l-3"></a>
                                        <div class="items">27</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="#">Top 10 NEW 3DS Games Of 2016 that blew our mind</a>
                                    </div>
                                    <div class="v-views">
                                        79,239,852 views. <span class="v-percent"><span class="v-circle"></span> 84%</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /Popular Playlists -->

                <!-- Popular Channels -->
                <div class="content-block head-div">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li><a href="#" id='popular-channels'>Popular Channels</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-xs-4">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Go to  <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                    	<li><a href="#new-videos"><i class="cv cvicon-cv-calender"></i> New Videos</a></li>
                                        <li><a href="#most-viewed"><i class="cv cvicon-cv-view-stats"></i> Most Viewed</a></li>
                                        <li><a href="#popular-video"><i class="cv cvicon-cv-watch-later"></i> Popular videos</a></li>                                        
                                        <li><a href="#popular-playlists"><i class="cv cvicon-cv-star"></i> Popular Playlists</a></li>
                                        <li><a href="#popular-channels"><i class="cv cvicon-cv-relevant"></i> Popular Channels</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content">
                        <div class="row">
                            <div class="col-lg-2 col-sm-4 col-xs-6">
                                <div class="b-chanel">
                                    <a href="ChannelController.php?@$^^%@@^@^$^@=<?=$popularChannels[0]['user_id']??''?>&page=Video">
                                        <img src="assets/images/user-pictures/<?=$popularChannels[0]['picture']??''?>" alt="">
                                        <div class="hover"><?=$popularChannels[0]['username']??''?><br><i class="cv cvicon-cv-liked"></i> <?=$popularChannels[0]['subscribers']??''?>K</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2  col-sm-4 col-xs-6">
                                <div class="b-chanel">
                                    <a href="ChannelController.php?@$^^%@@^@^$^@=<?=$popularChannels[1]['user_id']??''?>&page=Video">
                                        <img src="assets/images/user-pictures/<?=$popularChannels[1]['picture']??''?>" alt="">
                                        <div class="hover"><?=$popularChannels[1]['username']??''?><br><i class="cv cvicon-cv-liked"></i> <?=$popularChannels[1]['subscribers']??''?>K</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2  col-sm-4 col-xs-6">
                                <div class="b-chanel">
                                    <a href="ChannelController.php?@$^^%@@^@^$^@=<?=$popularChannels[2]['user_id']??''?>&page=Video">
                                        <img src="assets/images/user-pictures/<?=$popularChannels[2]['picture']??''?>" alt="">
                                        <div class="hover"><?=$popularChannels[2]['username']??''?><br><i class="cv cvicon-cv-liked"></i> <?=$popularChannels[2]['subscribers']??''?>K</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 col-xs-6">
                                <div class="b-chanel">
                                    <a href="ChannelController.php?@$^^%@@^@^$^@=<?=$popularChannels[3]['user_id']??''?>&page=Video">
                                        <img src="assets/images/user-pictures/<?=$popularChannels[3]['picture']??''?>" alt="">
                                        <div class="hover"><?=$popularChannels[3]['username']??''?><br><i class="cv cvicon-cv-liked"></i> <?=$popularChannels[3]['subscribers']??''?>K</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 col-xs-6">
                                <div class="b-chanel">
                                    <a href="ChannelController.php?@$^^%@@^@^$^@=<?=$popularChannels[4]['user_id']??''?>&page=Video">
                                        <img src="assets/images/user-pictures/<?=$popularChannels[4]['picture']??''?>" alt="">
                                        <div class="hover"><?=$popularChannels[4]['username']??''?><br><i class="cv cvicon-cv-liked"></i> <?=$popularChannels[4]['subscribers']??''?>K</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 col-xs-6">
                                <div class="b-chanel">
                                    <a href="ChannelController.php?@$^^%@@^@^$^@=<?=$popularChannels[5]['user_id']??''?>&page=Video">
                                        <img src="assets/images/user-pictures/<?=$popularChannels[5]['picture']??''?>" alt="">
                                        <div class="hover"><?=$popularChannels[5]['username']??''?><br><i class="cv cvicon-cv-liked"></i> <?=$popularChannels[5]['subscribers']??''?>K</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Popular Channels -->

            </div>
        </div>
    </div>
</div>

<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
<?php 
	require 'view/footer.php';
?>
