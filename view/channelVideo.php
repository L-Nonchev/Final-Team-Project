<?php 
	include 'header.php';
?>
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
                                <input type="hidden" id="@gdsfdY42$" value="<?= $userId ?>"  />
                                <input type="hidden" id="EfdsJs@4" value="<?= $sessuionUserId ?>"  />
                                <div class="c-nav">
                                    <ul class="list-inline">
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=Video" id="videos">Videos</a></li>
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=Playlist">Playlist</a></li>
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=LikedChannels">Channels</a></li>
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=Discusion">Discussion</a></li>
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=About">About</a></li>
                                    </ul>
                                </div>
                                <div class="c-sub pull-right">
                                    <div class="c-sub-wrap">
                                     	<button class="c-f" id="subscribers"> Subscribe </button>
                                        <div class="c-s" id="suscribers"><?= $subscribers ?></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- User Videos -->
                <div class="content-block">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-8 col-xs-12 col-sm-6">
									
                            </div>
                            <div class="col-lg-3 col-xs-15col-sm-6" >
								<div class="btn-group pull-right bg-clean" style="opacity: 0.0" id="privacy">
                                    <button type="button" class="btn btn-default dropdown-toggle" id="bnt-order2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Videos <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" onclick="event.preventDefault(); showVideo('6789');"> <i class="cv cvicon-cv-video-file"></i>Public</a></li>
                                        <li><a href="#" onclick="event.preventDefault(); showVideo('7890'); " ><i class="cv cvicon-cv-purchased"></i> Privascy</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-lg-1 col-xs-12 col-sm-6">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort By <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" onclick="event.preventDefault(); orderedBy('2345');"><i class="cv cvicon-cv-relevant"></i> Date Added</a></li>
                                        <li><a href="#" onclick="event.preventDefault(); orderedBy('1234'); " ><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                        <li><a href="#" onclick="event.preventDefault(); orderedBy('3456');" ><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                        <li><a href="#" onclick="event.preventDefault(); orderedBy('4567');"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                        <li><a href="#" onclick="event.preventDefault(); orderedBy('5678');"><i class="cv cvicon-cv-watch-later"></i> Logestc</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!--  Ajax added videos -->
                    <div class="cb-content videolist">
                        <div class="row"  id="row-video-container">
                        
                        </div>
                    </div>
                    <!--  /Ajax added videos -->
                </div>
                <!-- /User Videos -->

				<!-- Show More Videos -->
             	<div class="loadmore">
                    <form action="#" method="post" onsubmit="event.preventDefault();" >
                        <button class="btn btn-default h-btn" id="bnt-more-videos" style="display: none;">Load more Videos</button>
                        <input type="hidden" id="132Ascasd@gadsa"  value="0" />
                        <input type="hidden" id="53453Asd!sdgad"  value="1234" />
                        <input type="hidden" id="fsd^3S2fsafas"  value="6789" />
                    </form>
                </div>
				<!-- /Show More Videos -->
            </div>
        </div>
    </div>
</div>

<?php 
	require 'view/footer.php';
?>
