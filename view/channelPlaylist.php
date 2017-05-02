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
            <div class="col-lg-12">

                <div class="channel-details">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-2 col-xs-12">
                            <div class="c-details">
                                <div class="c-name" id="channel-name"> <?= $channelName ?></div>
                                <input type="hidden" id="@gdsfdY42$" value="<?= $userId ?>"  />
                                <input type="hidden" id="EfdsJs@4" value="<?= $sessuionUserId ?>"  />
                                <div class="c-nav">
                                  	   <ul class="list-inline">
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=Video">Videos</a></li>
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=Playlist" id="p-list">Playlist</a></li>
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
                <!-- Playlists Videos -->
                <div class="content-block">
                <div class="chanal">
				    <div class="row2">
				        <div class="img">
				            <img src="assets/images/comingsoon.png" alt="" class="c-banner" >
				        </div>
				    </div>
				</div>
<!--                     <div class="cb-header"> -->
<!--                         <div class="row"> -->
<!--                             <div class="col-lg-8 col-xs-12 col-sm-6"> -->
<!--                                 <div class="btn-group bg-clean"> -->
<!--                                     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
<!--                                         Uploads <span class="caret"></span> -->
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
<!--                             <div class="col-lg-4 col-xs-12 col-sm-6"> -->
<!--                                 <div class="btn-group pull-right bg-clean"> -->
<!--                                     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
<!--                                         Date Added ( Newest ) <span class="caret"></span> -->
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
<!-- 					<div class="cb-content"> -->
<!--                         <div class="row"> -->
<!--                             <div class="col-lg-3 col-sm-6 col-xs-12"> -->
<!--                                 <div class="b-playlist"> -->
<!--                                     <div class="v-img"> -->
<!--                                         <img src="maxresdefault.jpg" alt="" class="l-1" /> -->
<!--                                         <img src="maxresdefault.jpg" alt="" class="l-2" /> -->
<!--                                         <a href="singleVideo.php"><img src="maxresdefault.jpg" alt="" class="l-3" /></a> -->
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
<!--                             </div>                                                                                   -->

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
<!--                             </div>    -->
<!--                         </div> -->
<!--                     </div> -->
                </div>
                <!-- /Playlists Videos -->

                <!-- pagination -->
<!--                 <div class="v-pagination"> -->
<!--                     <ul class="list-inline"> -->
<!--                         <li><a href="#"> -->
<!--                             <div class="pages"><i class="cv cvicon-cv-previous"></i></div> -->
<!--                         </a></li> -->
<!--                         <li><a href="#"> -->
<!--                             <div class="pages">1</div> -->
<!--                         </a></li> -->
<!--                         <li><a href="#"> -->
<!--                             <div class="pages">2</div> -->
<!--                         </a></li> -->
<!--                         <li><a href="#"> -->
<!--                             <div class="pages active">3</div> -->
<!--                         </a></li> -->
<!--                         <li><a href="#"> -->
<!--                             <div class="pages">4</div> -->
<!--                         </a></li> -->
<!--                         <li><a href="#"> -->
<!--                             <div class="pages">5</div> -->
<!--                         </a></li> -->
<!--                         <li><a href="#"> -->
<!--                             <div class="pages">...</div> -->
<!--                         </a></li> -->
<!--                         <li><a href="#"> -->
<!--                             <div class="pages">10</div> -->
<!--                         </a></li> -->
<!--                         <li><a href="#"> -->
<!--                             <div class="pages"><i class="cv cvicon-cv-next"></i></div> -->
<!--                         </a></li> -->
<!--                     </ul> -->
<!--                 </div> -->
                <!-- /pagination -->

            </div>
        </div>
    </div>
</div>
<?php 
	require 'view/footer.php';
?>
