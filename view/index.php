<?php 
	include 'header.php';
?>
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
                                        <li><a href="#popular-video"><i class="cv cvicon-cv-watch-later"></i> Most Liked</a></li>                                        
<!--                                         <li><a href="#popular-playlists"><i class="cv cvicon-cv-star"></i> Popular Playlists</a></li> -->
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
                                    <div class="v-img" id=<?=(empty($newVideos[0]['video_id'])?'': $newVideos[0]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[0]['video_id'])?'':$newVideos[0]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($newVideos[0]['poster_path'])?'':$newVideos[0]['poster_path']);?>" alt="<?=(empty($newVideos[0]['title'])?'':$newVideos[0]['title']);?>" ></a>
                                        <div class="time"><?=(empty($newVideos[0]['duration'])?'':$newVideos[0]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[0]['video_id'])?'': $newVideos[0]['video_id']);?>"><?=(empty($newVideos[0]['title'])?'':$newVideos[0]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                     	<?=(empty($newVideos[0]['views'])?0:$newVideos[0]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span><?=(empty($newVideos[0]['percent'])?0:$newVideos[0]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=(empty($newVideos[1]['video_id'])?'': $newVideos[1]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[1]['video_id'])?'':$newVideos[1]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($newVideos[1]['poster_path'])?'':$newVideos[1]['poster_path']);?>" alt="<?=(empty($newVideos[1]['title'])?'':$newVideos[1]['title']);?>" ></a>
                                        <div class="time"><?=(empty($newVideos[1]['duration'])?'':$newVideos[1]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[1]['video_id'])?'': $newVideos[1]['video_id']);?>"><?=(empty($newVideos[1]['title'])?'':$newVideos[1]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                     <?=(empty($newVideos[1]['views'])?0:$newVideos[1]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($newVideos[1]['percent'])?0:$newVideos[1]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                            	<div class="b-video">
                                     <div class="v-img" id=<?=(empty($newVideos[2]['video_id'])?'': $newVideos[2]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[2]['video_id'])?'':$newVideos[2]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($newVideos[2]['poster_path'])?'':$newVideos[2]['poster_path']);?>" alt="<?=(empty($newVideos[2]['title'])?'':$newVideos[2]['title']);?>" ></a>
                                        <div class="time"><?=(empty($newVideos[2]['duration'])?'':$newVideos[2]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[2]['video_id'])?'': $newVideos[2]['video_id']);?>"><?=(empty($newVideos[2]['title'])?'':$newVideos[2]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($newVideos[2]['views'])?0:$newVideos[2]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($newVideos[2]['percent'])?0:$newVideos[2]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=(empty($newVideos[3]['video_id'])?'': $newVideos[3]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[3]['video_id'])?'':$newVideos[3]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($newVideos[3]['poster_path'])?'':$newVideos[3]['poster_path']);?>" alt="<?=(empty($newVideos[3]['title'])?'':$newVideos[3]['title']);?>" ></a>
                                        <div class="time"><?=(empty($newVideos[3]['duration'])?'':$newVideos[3]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[3]['video_id'])?'': $newVideos[3]['video_id']);?>"><?=(empty($newVideos[3]['title'])?'':$newVideos[3]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($newVideos[3]['views'])?0:$newVideos[3]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($newVideos[3]['percent'])?0:$newVideos[3]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=(empty($newVideos[4]['video_id'])?'': $newVideos[4]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[4]['video_id'])?'':$newVideos[4]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($newVideos[4]['poster_path'])?'':$newVideos[4]['poster_path']);?>" alt="<?=(empty($newVideos[4]['title'])?'':$newVideos[4]['title']);?>" ></a>
                                        <div class="time"><?=(empty($newVideos[4]['duration'])?'':$newVideos[4]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[4]['video_id'])?'': $newVideos[4]['video_id']);?>"><?=(empty($newVideos[4]['title'])?'':$newVideos[4]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($newVideos[4]['views'])?0:$newVideos[4]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($newVideos[4]['percent'])?0:$newVideos[4]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=(empty($newVideos[5]['video_id'])?'': $newVideos[5]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[5]['video_id'])?'':$newVideos[5]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($newVideos[5]['poster_path'])?'':$newVideos[5]['poster_path']);?>" alt="<?=(empty($newVideos[5]['title'])?'':$newVideos[5]['title']);?>" ></a>
                                        <div class="time"><?=(empty($newVideos[5]['duration'])?'':$newVideos[5]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[5]['video_id'])?'': $newVideos[5]['video_id']);?>"><?=(empty($newVideos[5]['title'])?'':$newVideos[5]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($newVideos[5]['views'])?0:$newVideos[5]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($newVideos[5]['percent'])?0:$newVideos[5]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                            	<div class="b-video">
                                    <div class="v-img" id=<?=(empty($newVideos[6]['video_id'])?'': $newVideos[6]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[6]['video_id'])?'':$newVideos[6]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($newVideos[6]['poster_path'])?'':$newVideos[6]['poster_path']);?>" alt="<?=(empty($newVideos[6]['title'])?'':$newVideos[6]['title']);?>" ></a>
                                        <div class="time"><?=(empty($newVideos[6]['duration'])?'':$newVideos[6]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[6]['video_id'])?'': $newVideos[6]['video_id']);?>"><?=(empty($newVideos[6]['title'])?'':$newVideos[6]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($newVideos[6]['views'])?0:$newVideos[6]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($newVideos[6]['percent'])?0:$newVideos[6]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=(empty($newVideos[7]['video_id'])?'': $newVideos[7]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[7]['video_id'])?'':$newVideos[7]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($newVideos[7]['poster_path'])?'':$newVideos[7]['poster_path']);?>" alt="<?=(empty($newVideos[7]['title'])?'':$newVideos[7]['title']);?>" ></a>
                                        <div class="time"><?=(empty($newVideos[7]['duration'])?'':$newVideos[7]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[7]['video_id'])?'': $newVideos[7]['video_id']);?>"><?=(empty($newVideos[7]['title'])?'':$newVideos[7]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                     <?=(empty($newVideos[7]['views'])?0:$newVideos[7]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($newVideos[7]['percent'])?0:$newVideos[7]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=(empty($newVideos[8]['video_id'])?'': $newVideos[8]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[8]['video_id'])?'':$newVideos[8]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($newVideos[8]['poster_path'])?'':$newVideos[8]['poster_path']);?>" alt="<?=(empty($newVideos[8]['title'])?'':$newVideos[8]['title']);?>" ></a>
                                        <div class="time"><?=(empty($newVideos[8]['duration'])?'':$newVideos[8]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[8]['video_id'])?'': $newVideos[8]['video_id']);?>"><?=(empty($newVideos[8]['title'])?'':$newVideos[8]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                     <?=(empty($newVideos[8]['views'])?0:$newVideos[8]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($newVideos[8]['percent'])?0:$newVideos[8]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                     <div class="v-img" id=<?=(empty($newVideos[9]['video_id'])?'': $newVideos[9]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[9]['video_id'])?'':$newVideos[9]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($newVideos[9]['poster_path'])?'':$newVideos[9]['poster_path']);?>" alt="<?=(empty($newVideos[9]['title'])?'':$newVideos[9]['title']);?>" ></a>
                                        <div class="time"><?=(empty($newVideos[9]['duration'])?'':$newVideos[9]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[9]['video_id'])?'': $newVideos[9]['video_id']);?>"><?=(empty($newVideos[9]['title'])?'':$newVideos[9]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($newVideos[9]['views'])?0:$newVideos[9]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($newVideos[9]['percent'])?0:$newVideos[9]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=(empty($newVideos[10]['video_id'])?'': $newVideos[10]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[10]['video_id'])?'':$newVideos[10]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($newVideos[10]['poster_path'])?'':$newVideos[10]['poster_path']);?>" alt="<?=(empty($newVideos[10]['title'])?'':$newVideos[10]['title']);?>" ></a>
                                        <div class="time"><?=(empty($newVideos[10]['duration'])?'':$newVideos[10]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[10]['video_id'])?'': $newVideos[10]['video_id']);?>"><?=(empty($newVideos[10]['title'])?'':$newVideos[10]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($newVideos[10]['views'])?0:$newVideos[10]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($newVideos[10]['percent'])?0:$newVideos[10]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                   <div class="v-img" id=<?=(empty($newVideos[11]['video_id'])?'': $newVideos[11]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[11]['video_id'])?'':$newVideos[11]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($newVideos[11]['poster_path'])?'':$newVideos[11]['poster_path']);?>" alt="<?=(empty($newVideos[11]['title'])?'':$newVideos[11]['title']);?>" ></a>
                                        <div class="time"><?=(empty($newVideos[11]['duration'])?'':$newVideos[11]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($newVideos[11]['video_id'])?'': $newVideos[11]['video_id']);?>"><?=(empty($newVideos[11]['title'])?'':$newVideos[11]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($newVideos[11]['views'])?0:$newVideos[11]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($newVideos[11]['percent'])?0:$newVideos[11]['percent']);?> %</span>
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
                                        <li><a href="#popular-video"><i class="cv cvicon-cv-watch-later"></i> Most Liked</a></li>                                        
<!--                                         <li><a href="#popular-playlists"><i class="cv cvicon-cv-star"></i> Popular Playlists</a></li> -->
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
                                    <div class="v-img" id=<?=(empty($mostViewed[0]['video_id'])?'':$mostViewed[0]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[0]['video_id'])?'':$mostViewed[0]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($mostViewed[0]['poster_path'])?'':$mostViewed[0]['poster_path']);?>" alt="<?=(empty($mostViewed[0]['title'])?'':$mostViewed[0]['title']);?>" ></a>
                                        <div class="time"><?=(empty($mostViewed[0]['duration'])?'':$mostViewed[0]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[0]['video_id'])?'':$mostViewed[0]['video_id']);?>"><?=(empty($mostViewed[0]['title'])?'':$mostViewed[0]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($mostViewed[0]['views'])?0:$mostViewed[0]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($mostViewed[0]['percent'])?0:$mostViewed[0]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=(empty($mostViewed[1]['video_id'])?'':$mostViewed[1]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[1]['video_id'])?'':$mostViewed[1]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($mostViewed[1]['poster_path'])?'':$mostViewed[1]['poster_path']);?>" alt="<?=(empty($mostViewed[1]['title'])?'':$mostViewed[1]['title']);?>" ></a>
                                        <div class="time"><?=(empty($mostViewed[1]['duration'])?'':$mostViewed[1]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[1]['video_id'])?'':$mostViewed[1]['video_id']);?>"><?=(empty($mostViewed[1]['title'])?'':$mostViewed[1]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                     <?=(empty($mostViewed[1]['views'])?0:$mostViewed[1]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($mostViewed[1]['percent'])?0:$mostViewed[1]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                            	<div class="b-video">
                                    <div class="v-img" id=<?=(empty($mostViewed[2]['video_id'])?'':$mostViewed[2]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[2]['video_id'])?'':$mostViewed[2]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($mostViewed[2]['poster_path'])?'':$mostViewed[2]['poster_path']);?>" alt="<?=(empty($mostViewed[2]['title'])?'':$mostViewed[2]['title']);?>" ></a>
                                        <div class="time"><?=(empty($mostViewed[2]['duration'])?'':$mostViewed[2]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[2]['video_id'])?'':$mostViewed[2]['video_id']);?>"><?=(empty($mostViewed[2]['title'])?'':$mostViewed[2]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                     <?=(empty($mostViewed[2]['views'])?0:$mostViewed[2]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($mostViewed[2]['percent'])?0:$mostViewed[2]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=(empty($mostViewed[3]['video_id'])?'':$mostViewed[3]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[3]['video_id'])?'':$mostViewed[3]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($mostViewed[3]['poster_path'])?'':$mostViewed[3]['poster_path']);?>" alt="<?=(empty($mostViewed[3]['title'])?'':$mostViewed[3]['title']);?>" ></a>
                                        <div class="time"><?=(empty($mostViewed[3]['duration'])?'':$mostViewed[3]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[3]['video_id'])?'':$mostViewed[3]['video_id']);?>"><?=(empty($mostViewed[3]['title'])?'':$mostViewed[3]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($mostViewed[3]['views'])?0:$mostViewed[3]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($mostViewed[3]['percent'])?0:$mostViewed[3]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=(empty($mostViewed[4]['video_id'])?'':$mostViewed[4]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[4]['video_id'])?'':$mostViewed[4]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($mostViewed[4]['poster_path'])?'':$mostViewed[4]['poster_path']);?>" alt="<?=(empty($mostViewed[4]['title'])?'':$mostViewed[4]['title']);?>" ></a>
                                        <div class="time"><?=(empty($mostViewed[4]['duration'])?'':$mostViewed[4]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[4]['video_id'])?'':$mostViewed[4]['video_id']);?>"><?=(empty($mostViewed[4]['title'])?'':$mostViewed[4]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($mostViewed[4]['views'])?0:$mostViewed[4]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($mostViewed[4]['percent'])?0:$mostViewed[4]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=(empty($mostViewed[5]['video_id'])?'':$mostViewed[5]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[5]['video_id'])?'':$mostViewed[5]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($mostViewed[5]['poster_path'])?'':$mostViewed[5]['poster_path']);?>" alt="<?=(empty($mostViewed[5]['title'])?'':$mostViewed[5]['title']);?>" ></a>
                                        <div class="time"><?=(empty($mostViewed[5]['duration'])?'':$mostViewed[5]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[5]['video_id'])?'':$mostViewed[5]['video_id']);?>"><?=(empty($mostViewed[5]['title'])?'':$mostViewed[5]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($mostViewed[5]['views'])?0:$mostViewed[5]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($mostViewed[5]['percent'])?0:$mostViewed[5]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                            	<div class="b-video">
                                    <div class="v-img" id=<?=(empty($mostViewed[6]['video_id'])?'':$mostViewed[6]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[6]['video_id'])?'':$mostViewed[6]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($mostViewed[6]['poster_path'])?'':$mostViewed[6]['poster_path']);?>" alt="<?=(empty($mostViewed[6]['title'])?'':$mostViewed[6]['title']);?>" ></a>
                                        <div class="time"><?=(empty($mostViewed[6]['duration'])?'':$mostViewed[6]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[6]['video_id'])?'':$mostViewed[6]['video_id']);?>"><?=(empty($mostViewed[6]['title'])?'':$mostViewed[6]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($mostViewed[6]['views'])?0:$mostViewed[6]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($mostViewed[6]['percent'])?0:$mostViewed[6]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=(empty($mostViewed[7]['video_id'])?'':$mostViewed[7]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[7]['video_id'])?'':$mostViewed[7]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($mostViewed[7]['poster_path'])?'':$mostViewed[7]['poster_path']);?>" alt="<?=(empty($mostViewed[7]['title'])?'':$mostViewed[7]['title']);?>" ></a>
                                        <div class="time"><?=(empty($mostViewed[7]['duration'])?'':$mostViewed[7]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[7]['video_id'])?'':$mostViewed[7]['video_id']);?>"><?=(empty($mostViewed[7]['title'])?'':$mostViewed[7]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($mostViewed[7]['views'])?0:$mostViewed[7]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($mostViewed[7]['percent'])?0:$mostViewed[7]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=(empty($mostViewed[8]['video_id'])?'':$mostViewed[8]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[8]['video_id'])?'':$mostViewed[8]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($mostViewed[8]['poster_path'])?'':$mostViewed[8]['poster_path']);?>" alt="<?=(empty($mostViewed[8]['title'])?'':$mostViewed[8]['title']);?>" ></a>
                                        <div class="time"><?=(empty($mostViewed[8]['duration'])?'':$mostViewed[8]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[8]['video_id'])?'':$mostViewed[8]['video_id']);?>"><?=(empty($mostViewed[8]['title'])?'':$mostViewed[8]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($mostViewed[8]['views'])?0:$mostViewed[8]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($mostViewed[8]['percent'])?0:$mostViewed[8]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=(empty($mostViewed[9]['video_id'])?'':$mostViewed[9]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[9]['video_id'])?'':$mostViewed[9]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($mostViewed[9]['poster_path'])?'':$mostViewed[9]['poster_path']);?>" alt="<?=(empty($mostViewed[9]['title'])?'':$mostViewed[9]['title']);?>" ></a>
                                        <div class="time"><?=(empty($mostViewed[9]['duration'])?'':$mostViewed[9]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[9]['video_id'])?'':$mostViewed[9]['video_id']);?>"><?=(empty($mostViewed[9]['title'])?'':$mostViewed[9]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($mostViewed[9]['views'])?0:$mostViewed[9]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($mostViewed[9]['percent'])?0:$mostViewed[9]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                     <div class="v-img" id=<?=(empty($mostViewed[10]['video_id'])?'':$mostViewed[10]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[10]['video_id'])?'':$mostViewed[10]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($mostViewed[10]['poster_path'])?'':$mostViewed[10]['poster_path']);?>" alt="<?=(empty($mostViewed[10]['title'])?'':$mostViewed[10]['title']);?>" ></a>
                                        <div class="time"><?=(empty($mostViewed[10]['duration'])?'':$mostViewed[10]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[10]['video_id'])?'':$mostViewed[10]['video_id']);?>"><?=(empty($mostViewed[10]['title'])?'':$mostViewed[10]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                     <?=(empty($mostViewed[10]['views'])?0:$mostViewed[10]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($mostViewed[10]['percent'])?0:$mostViewed[10]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=(empty($mostViewed[11]['video_id'])?'':$mostViewed[11]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[11]['video_id'])?'':$mostViewed[11]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($mostViewed[11]['poster_path'])?'':$mostViewed[11]['poster_path']);?>" alt="<?=(empty($mostViewed[11]['title'])?'':$mostViewed[11]['title']);?>" ></a>
                                        <div class="time"><?=(empty($mostViewed[11]['duration'])?'':$mostViewed[11]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($mostViewed[11]['video_id'])?'':$mostViewed[11]['video_id']);?>"><?=(empty($mostViewed[11]['title'])?'':$mostViewed[11]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($mostViewed[11]['views'])?0:$mostViewed[11]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($mostViewed[11]['percent'])?0:$mostViewed[11]['percent']);?> %</span>
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
                                    <li><a href="popular-video" id='popular-video' class="color-active">Most Liked</a></li>
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
<!--                                         <li><a href="#popular-playlists"><i class="cv cvicon-cv-star"></i> Popular Playlists</a></li> -->
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
                                    <div class="v-img" id=<?=(empty($popularVideo[0]['video_id'])?'':$popularVideo[0]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[0]['video_id'])?'':$popularVideo[0]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($popularVideo[0]['poster_path'])?'':$popularVideo[0]['poster_path']);?>" alt="<?=(empty($popularVideo[0]['title'])?'':$popularVideo[0]['title']);?>" ></a>
                                        <div class="time"><?=(empty($popularVideo[0]['duration'])?'':$popularVideo[0]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[0]['video_id'])?'':$popularVideo[0]['video_id']);?>"><?=(empty($popularVideo[0]['title'])?'':$popularVideo[0]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($popularVideo[0]['views'])?0:$popularVideo[0]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($popularVideo[0]['percent'])?0:$popularVideo[0]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=(empty($popularVideo[1]['video_id'])?'':$popularVideo[1]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[1]['video_id'])?'':$popularVideo[1]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($popularVideo[1]['poster_path'])?'':$popularVideo[1]['poster_path']);?>" alt="<?=(empty($popularVideo[1]['title'])?'':$popularVideo[1]['title']);?>" ></a>
                                        <div class="time"><?=(empty($popularVideo[1]['duration'])?'':$popularVideo[1]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[1]['video_id'])?'':$popularVideo[1]['video_id']);?>"><?=(empty($popularVideo[1]['title'])?'':$popularVideo[1]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($popularVideo[1]['percent'])?0:$popularVideo[1]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                            	<div class="b-video">
                                   <div class="v-img" id=<?=(empty($popularVideo[2]['video_id'])?'':$popularVideo[2]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[2]['video_id'])?'':$popularVideo[2]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($popularVideo[2]['poster_path'])?'':$popularVideo[2]['poster_path']);?>" alt="<?=(empty($popularVideo[2]['title'])?'':$popularVideo[2]['title']);?>" ></a>
                                        <div class="time"><?=(empty($popularVideo[2]['duration'])?'':$popularVideo[2]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[2]['video_id'])?'':$popularVideo[2]['video_id']);?>"><?=(empty($popularVideo[2]['title'])?'':$popularVideo[2]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($popularVideo[2]['views'])?0:$popularVideo[2]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($popularVideo[2]['percent'])?0:$popularVideo[2]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=(empty($popularVideo[3]['video_id'])?'':$popularVideo[3]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[3]['video_id'])?'':$popularVideo[3]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($popularVideo[3]['poster_path'])?'':$popularVideo[3]['poster_path']);?>" alt="<?=(empty($popularVideo[3]['title'])?'':$popularVideo[3]['title']);?>" ></a>
                                        <div class="time"><?=(empty($popularVideo[3]['duration'])?'':$popularVideo[3]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[3]['video_id'])?'':$popularVideo[3]['video_id']);?>"><?=(empty($popularVideo[3]['title'])?'':$popularVideo[3]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                     <?=(empty($popularVideo[3]['views'])?0:$popularVideo[3]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($popularVideo[3]['percent'])?0:$popularVideo[3]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=(empty($popularVideo[4]['video_id'])?'':$popularVideo[4]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[4]['video_id'])?'':$popularVideo[4]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($popularVideo[4]['poster_path'])?'':$popularVideo[4]['poster_path']);?>" alt="<?=(empty($popularVideo[4]['title'])?'':$popularVideo[4]['title']);?>" ></a>
                                        <div class="time"><?=(empty($popularVideo[4]['duration'])?'':$popularVideo[4]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[4]['video_id'])?'':$popularVideo[4]['video_id']);?>"><?=(empty($popularVideo[4]['title'])?'':$popularVideo[4]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($popularVideo[4]['views'])?0:$popularVideo[4]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($popularVideo[4]['percent'])?0:$popularVideo[4]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=(empty($popularVideo[5]['video_id'])?'':$popularVideo[5]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[5]['video_id'])?'':$popularVideo[5]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($popularVideo[5]['poster_path'])?'':$popularVideo[5]['poster_path']);?>" alt="<?=(empty($popularVideo[5]['title'])?'':$popularVideo[5]['title']);?>" ></a>
                                        <div class="time"><?=(empty($popularVideo[5]['duration'])?'':$popularVideo[5]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[5]['video_id'])?'':$popularVideo[5]['video_id']);?>"><?=(empty($popularVideo[5]['title'])?'':$popularVideo[5]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($popularVideo[5]['views'])?0:$popularVideo[5]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($popularVideo[5]['percent'])?0:$popularVideo[5]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                            	<div class="b-video">
                                    <div class="v-img" id=<?=(empty($popularVideo[6]['video_id'])?'':$popularVideo[6]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[6]['video_id'])?'':$popularVideo[6]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($popularVideo[6]['poster_path'])?'':$popularVideo[6]['poster_path']);?>" alt="<?=(empty($popularVideo[6]['title'])?'':$popularVideo[6]['title']);?>" ></a>
                                        <div class="time"><?=(empty($popularVideo[6]['duration'])?'':$popularVideo[6]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[6]['video_id'])?'':$popularVideo[6]['video_id']);?>"><?=(empty($popularVideo[6]['title'])?'':$popularVideo[6]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($popularVideo[6]['views'])?0:$popularVideo[6]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($popularVideo[6]['percent'])?0:$popularVideo[6]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img" id=<?=(empty($popularVideo[7]['video_id'])?'':$popularVideo[7]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[7]['video_id'])?'':$popularVideo[7]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($popularVideo[7]['poster_path'])?'':$popularVideo[7]['poster_path']);?>" alt="<?=(empty($popularVideo[7]['title'])?'':$popularVideo[7]['title']);?>" ></a>
                                        <div class="time"><?=(empty($popularVideo[7]['duration'])?'':$popularVideo[7]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[7]['video_id'])?'':$popularVideo[7]['video_id']);?>"><?=(empty($popularVideo[7]['title'])?'':$popularVideo[7]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($popularVideo[7]['views'])?0:$popularVideo[7]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($popularVideo[7]['percent'])?0:$popularVideo[7]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=(empty($popularVideo[8]['video_id'])?'':$popularVideo[8]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[8]['video_id'])?'':$popularVideo[8]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($popularVideo[8]['poster_path'])?'':$popularVideo[8]['poster_path']);?>" alt="<?=(empty($popularVideo[8]['title'])?'':$popularVideo[8]['title']);?>" ></a>
                                        <div class="time"><?=(empty($popularVideo[8]['duration'])?'':$popularVideo[8]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[8]['video_id'])?'':$popularVideo[8]['video_id']);?>"><?=(empty($popularVideo[8]['title'])?'':$popularVideo[8]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($popularVideo[8]['views'])?0:$popularVideo[8]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($popularVideo[8]['percent'])?0:$popularVideo[8]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=(empty($popularVideo[9]['video_id'])?'':$popularVideo[9]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[9]['video_id'])?'':$popularVideo[9]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($popularVideo[9]['poster_path'])?'':$popularVideo[9]['poster_path']);?>" alt="<?=(empty($popularVideo[9]['title'])?'':$popularVideo[9]['title']);?>" ></a>
                                        <div class="time"><?=(empty($popularVideo[9]['duration'])?'':$popularVideo[9]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[9]['video_id'])?'':$popularVideo[9]['video_id']);?>"><?=(empty($popularVideo[9]['title'])?'':$popularVideo[9]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($popularVideo[9]['views'])?0:$popularVideo[9]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($popularVideo[9]['percent'])?0:$popularVideo[9]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=(empty($popularVideo[10]['video_id'])?'':$popularVideo[10]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[10]['video_id'])?'':$popularVideo[10]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($popularVideo[10]['poster_path'])?'':$popularVideo[10]['poster_path']);?>" alt="<?=(empty($popularVideo[10]['title'])?'':$popularVideo[10]['title']);?>" ></a>
                                        <div class="time"><?=(empty($popularVideo[10]['duration'])?'':$popularVideo[10]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[10]['video_id'])?'':$popularVideo[10]['video_id']);?>"><?=(empty($popularVideo[10]['title'])?'':$popularVideo[10]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($popularVideo[10]['views'])?0:$popularVideo[10]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($popularVideo[10]['percent'])?0:$popularVideo[10]['percent']);?> %.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img" id=<?=(empty($popularVideo[11]['video_id'])?'':$popularVideo[11]['video_id']);?>>
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[11]['video_id'])?'':$popularVideo[11]['video_id']);?>"><img src="assets/images/video-poster/<?=(empty($popularVideo[11]['poster_path'])?'':$popularVideo[11]['poster_path']);?>" alt="<?=(empty($popularVideo[11]['title'])?'':$popularVideo[11]['title']);?>" ></a>
                                        <div class="time"><?=(empty($popularVideo[11]['duration'])?'':$popularVideo[11]['duration']);?></div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="VideoController.php?físeán%=<?=(empty($popularVideo[11]['video_id'])?'':$popularVideo[11]['video_id']);?>"><?=(empty($popularVideo[11]['title'])?'':$popularVideo[11]['title']);?></a>
                                    </div>
                                    <div class="v-views">
                                    <?=(empty($popularVideo[11]['views'])?0:$popularVideo[11]['views']);?> views.
                                         <span class="v-percent"><span class="v-circle"></span> <?=(empty($popularVideo[11]['percent'])?0:$popularVideo[11]['percent']);?> %</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Polular videos -->
                
                
                <!-- Popular Playlists -->
<!--                 <div class="content-block head-div"> -->
<!--                     <div class="cb-header"> -->
<!--                         <div class="row"> -->
<!--                             <div class="col-lg-10 col-sm-10 col-xs-8"> -->
<!--                                 <ul class="list-inline"> -->
<!--                                     <li><a href="#" class="color-active">Popular Playlists</a></li> -->
<!--                                 </ul> -->
<!--                             </div> -->
<!--                             <div class="col-lg-2 col-sm-2 col-xs-4"> -->
<!--                                 <div class="btn-group pull-right bg-clean"> -->
<!--                                     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
<!--                                         Sort by  <span class="caret"></span> -->
<!--                                     </button> -->
<!--                                     <ul class="dropdown-menu"> -->
<!--                                         <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li> -->
<!--                                         <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li> -->
<!--                                         <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li> -->
<!--                                         <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li> -->
<!--                                         <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li> -->
<!--                                     </ul> -->
<!--                                 </div> -->
<!--                                 <div class="clearfix"></div> -->
<!--                             </div> -->
<!--                         </div> -->
<!--                     </div> -->
<!--                     <div class="cb-content"> -->
<!--                         <div class="row"> -->

<!--                             <div class="col-lg-3 col-sm-6 col-xs-12"> -->
<!--                                 <div class="b-playlist"> -->
<!--                                     <div class="v-img"> -->
<!--                                         <img src="assets/images/video1-1.png" alt="" class="l-1" /> -->
<!--                                         <img src="assets/images/video1-2.png" alt="" class="l-2" /> -->
<!--                                         <a href="singleVideo.php"><img src="assets/images/playlist-1.png" alt="" class="l-3" /></a> -->
<!--                                         <div class="items">20</div> -->
<!--                                     </div> -->
<!--                                     <div class="v-desc"> -->
<!--                                         <a href="#">There Can Only Be One! Introducing Tanc & Hercules</a> -->
<!--                                     </div> -->
<!--                                     <div class="v-views"> -->
<!--                                         127,548 views. <span class="v-percent"><span class="v-circle"></span> 78%</span> -->
<!--                                     </div> -->
<!--                                 </div> -->
<!--                             </div> -->

<!--                             <div class="col-lg-3 col-sm-6 col-xs-12"> -->
<!--                                 <div class="b-playlist"> -->
<!--                                     <div class="v-img"> -->
<!--                                         <img src="assets/images/video2-1.png" alt="" class="l-1" /> -->
<!--                                         <img src="assets/images/video2-2.png" alt="" class="l-2" /> -->
<!--                                         <a href="singleVideo.php"><img src="assets/images/playlist-2.png" alt="" class="l-3"></a> -->
<!--                                         <div class="items">15</div> -->
<!--                                     </div> -->
<!--                                     <div class="v-desc"> -->
<!--                                         <a href="#">Pokémon 3: The Movie - Spell Of The Unown: Entei HD...</a> -->
<!--                                     </div> -->
<!--                                     <div class="v-views"> -->
<!--                                         18,241,542 views. <span class="v-percent"><span class="v-circle"></span> 93%</span> -->
<!--                                     </div> -->
<!--                                 </div> -->
<!--                             </div> -->

<!--                             <div class="col-lg-3 col-sm-6 col-xs-12"> -->
<!--                                 <div class="b-playlist"> -->
<!--                                     <div class="v-img"> -->
<!--                                         <img src="assets/images/video2-6.png" alt="" class="l-1" /> -->
<!--                                         <img src="assets/images/video2-4.png" alt="" class="l-2" /> -->
<!--                                         <a href="singleVideo.php"><img src="assets/images/playlist-3.png" alt="" class="l-3" ></a> -->
<!--                                         <div class="items">7</div> -->
<!--                                     </div> -->
<!--                                     <div class="v-desc"> -->
<!--                                         <a href="#">Bullet Trains and Octopus Balls in South Korea</a> -->
<!--                                     </div> -->
<!--                                     <div class="v-views"> -->
<!--                                         729,347 views . <span class="v-percent"><span class="v-circle"></span> 95%</span> -->
<!--                                     </div> -->
<!--                                 </div> -->
<!--                             </div> -->

<!--                             <div class="col-lg-3 col-sm-6 col-xs-12"> -->
<!--                                 <div class="b-playlist"> -->
<!--                                     <div class="v-img"> -->
<!--                                         <img src="assets/images/video1-6.png" alt="" class="l-1" /> -->
<!--                                         <img src="assets/images/video1-4.png" alt="" class="l-2" /> -->
<!--                                         <a href="singleVideo.php"><img src="assets/images/playlist-4.png" alt="" class="l-3"></a> -->
<!--                                         <div class="items">27</div> -->
<!--                                     </div> -->
<!--                                     <div class="v-desc"> -->
<!--                                         <a href="#">Top 10 NEW 3DS Games Of 2016 that blew our mind</a> -->
<!--                                     </div> -->
<!--                                     <div class="v-views"> -->
<!--                                         79,239,852 views. <span class="v-percent"><span class="v-circle"></span> 84%</span> -->
<!--                                     </div> -->
<!--                                 </div> -->
<!--                             </div> -->

<!--                         </div> -->
<!--                     </div> -->
<!--                 </div> -->
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
                                        <li><a href="#popular-video"><i class="cv cvicon-cv-watch-later"></i> Most Liked</a></li>                                        
<!--                                         <li><a href="#popular-playlists"><i class="cv cvicon-cv-star"></i> Popular Playlists</a></li> -->
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
                                    <a href="ChannelController.php?@$^^%@@^@^$^@=<?=(empty($popularChannels[0]['user_id'])?'':$popularChannels[0]['user_id'])?>&page=Video">
                                        <img src="assets/images/user-pictures/<?=(empty($popularChannels[0]['picture'])?'':$popularChannels[0]['picture'])?>" alt="">
                                        <div class="hover"><?=(empty($popularChannels[0]['username'])?'':$popularChannels[0]['username'])?><br><i class="cv cvicon-cv-liked"></i> <?=(empty($popularChannels[0]['subscribers'])?0:$popularChannels[0]['subscribers'])?></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2  col-sm-4 col-xs-6">
                                <div class="b-chanel">
                                    <a href="ChannelController.php?@$^^%@@^@^$^@=<?=(empty($popularChannels[1]['user_id'])?'':$popularChannels[1]['user_id'])?>&page=Video">
                                        <img src="assets/images/user-pictures/<?=(empty($popularChannels[1]['picture'])?'':$popularChannels[1]['picture'])?>" alt="">
                                        <div class="hover"><?=(empty($popularChannels[1]['username'])?'':$popularChannels[1]['username'])?><br><i class="cv cvicon-cv-liked"></i> <?=(empty($popularChannels[1]['subscribers'])?0:$popularChannels[1]['subscribers'])?></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2  col-sm-4 col-xs-6">
                                <div class="b-chanel">
                                   <a href="ChannelController.php?@$^^%@@^@^$^@=<?=(empty($popularChannels[2]['user_id'])?'':$popularChannels[2]['user_id'])?>&page=Video">
                                        <img src="assets/images/user-pictures/<?=(empty($popularChannels[2]['picture'])?'':$popularChannels[2]['picture'])?>" alt="">
                                        <div class="hover"><?=(empty($popularChannels[2]['username'])?'':$popularChannels[2]['username'])?><br><i class="cv cvicon-cv-liked"></i> <?=(empty($popularChannels[2]['subscribers'])?0:$popularChannels[2]['subscribers'])?></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 col-xs-6">
                                <div class="b-chanel">
                                    <a href="ChannelController.php?@$^^%@@^@^$^@=<?=(empty($popularChannels[3]['user_id'])?'':$popularChannels[3]['user_id'])?>&page=Video">
                                        <img src="assets/images/user-pictures/<?=(empty($popularChannels[3]['picture'])?'':$popularChannels[3]['picture'])?>" alt="">
                                        <div class="hover"><?=(empty($popularChannels[3]['username'])?'':$popularChannels[3]['username'])?><br><i class="cv cvicon-cv-liked"></i> <?=(empty($popularChannels[3]['subscribers'])?0:$popularChannels[3]['subscribers'])?></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 col-xs-6">
                                <div class="b-chanel">
                                     <a href="ChannelController.php?@$^^%@@^@^$^@=<?=(empty($popularChannels[4]['user_id'])?'':$popularChannels[4]['user_id'])?>&page=Video">
                                        <img src="assets/images/user-pictures/<?=(empty($popularChannels[4]['picture'])?'':$popularChannels[4]['picture'])?>" alt="">
                                        <div class="hover"><?=(empty($popularChannels[4]['username'])?'':$popularChannels[4]['username'])?><br><i class="cv cvicon-cv-liked"></i> <?=(empty($popularChannels[4]['subscribers'])?0:$popularChannels[4]['subscribers'])?></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 col-xs-6">
                                <div class="b-chanel">
                                    <a href="ChannelController.php?@$^^%@@^@^$^@=<?=(empty($popularChannels[5]['user_id'])?'':$popularChannels[5]['user_id'])?>&page=Video">
                                        <img src="assets/images/user-pictures/<?=(empty($popularChannels[5]['picture'])?'':$popularChannels[5]['picture'])?>" alt="">
                                        <div class="hover"><?=(empty($popularChannels[5]['username'])?'':$popularChannels[5]['username'])?><br><i class="cv cvicon-cv-liked"></i> <?=(empty($popularChannels[5]['subscribers'])?0:$popularChannels[5]['subscribers'])?></div>
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
