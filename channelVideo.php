
<!-- channel -->
<div class="chanal">
    <div class="row2">
        <div class="img">
            <img src="assets/images/user-banners/<?= $channelBanner ?>" alt="" class="c-banner" >
            <div class="c-avatar">
                <a href="#"><img src="./assets/images/user-pictures/<?= $channelPic?>" alt="" ></a>
            </div>
        </div>
    </div>
</div>
<!-- ///channel -->


<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 v-history">

                <div class="channel-details">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-2 col-xs-12">
                            <div class="c-details">
                                <div class="c-name" id="channel-name"> <?= $channelName ?></div>
                                <input type="hidden" id="user-id" value="<?= $userId ?>"  />
                                <input type="hidden" id="logged-user-id" value="<?= $sessuionUserId ?>"  />
                                <div class="c-nav">
                                    <ul class="list-inline">
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=Video">Videos</a></li>
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=Playlist">Playlist</a></li>
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=LikedChannels">Channels</a></li>
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=Discusion">Discussion</a></li>
                                        <li><a href="#">About</a></li>
                                    </ul>
                                </div>
                                <div class="c-sub pull-right">
                                    <div class="c-sub-wrap">
                                     	<button class="c-f" id="subscribers">  </button>
                                        <div class="c-s">
                                            <?= $subscribers ?>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Featured Videos -->
                <div class="content-block">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-8 col-xs-12 col-sm-6">

                            </div>
                            <div class="col-lg-4 col-xs-12 col-sm-6">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" id="bnt-order" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort By <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" onclick="event.preventDefault(); orderedBy('video_id');"><i class="cv cvicon-cv-relevant"></i> Date Added</a></li>
                                        <li><a href="#" onclick="event.preventDefault(); orderedBy('video_id DESC'); " ><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                        <li><a href="#" onclick="event.preventDefault(); orderedBy('views DESC');" ><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                        <li><a href="#" onclick="event.preventDefault(); orderedBy('likes DESC');"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                        <li><a href="#" onclick="event.preventDefault(); orderedBy('duration');"><i class="cv cvicon-cv-watch-later"></i> Logestc</a></li>
                                    </ul>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content videolist">
                        <div class="row"  id="row-video-container">
                                                
                        


                        </div>
                    </div>
                </div>
                <!-- /Featured Videos -->

             	<div class="loadmore">
                    <form action="#" method="post" onsubmit="event.preventDefault();" >
                        <button class="btn btn-default h-btn" id="bnt-more-videos">Load more Videos</button>
                        <input type="hidden" id="offset"  value="0" />
                        <input type="hidden" id="orderBy"  value="video_id DESC" />
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php 
	require 'footer.php';
?>
