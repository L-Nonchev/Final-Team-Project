<?php
session_start();
if (isset($_SESSION['user'])){

	include 'logInHeader.php';

}else {
	header('Location : index.php', true, 302);
}
?>

<!-- channel -->
<div class="chanal">
    <div class="row2">
        <div class="img">
            <img src="assets/images/user-banners/<?= $userBanner ?>" alt="" class="c-banner" >
            <div class="c-avatar">
                <a href="#"><img src="./assets/images/user-pictures/<?= $userPic?>" alt="" ></a>
            </div>
        </div>
    </div>
</div>
<!-- ///channel -->

<div class="content-wrapper">
    <div class="container " >
        <div class="row">
            <div class="col-lg-12 channels">

                <div class="channel-details">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-2 col-xs-12">
                            <div class="c-details">
                                <div class="c-name">
                                    <?= $userName ?>
                                </div>
                                <div class="c-nav">
                                    <ul class="list-inline">
                                        <li><a href="channel.php">Videos</a></li>
                                        <li><a href="channelPlaylist.php">Playlist</a></li>
                                        <li><a href="channelLikedChannels.php">Channels</a></li>
                                        <li><a href="channelDiscusion.php">Discussion</a></li>
                                        <li><a href="#">About</a></li>
                                    </ul>
                                </div>
                                <div class="c-sub pull-right">
                                    <div class="c-sub-wrap">
                                    	<div class="c-f"> Subscribers</div>
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
                <!-- You Liked Chennels -->
                <div class="content-block">
                    <div class="channels-content">
                        <h4>Liked Channels </h4>
                        <div class="clearfix"></div>
                        <div class="theme-section">
                            <div class="row">
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="cns-block">
                                        <a href="./channel.php" class="cns-image"  >
                                            <img src="cover.jpg" alt="image" >
                                        </a>
                                        <div class="cns-img-small">
                                            <a href="./channel.php" class="cns-img-small cns-small-wrapp">
                                            	  <img src="slaves1.jpg" alt="small">
                                            </a>
                                        </div>
                                        <div class="cns-info">
                                        	<a href="./channel.php">
                                            	<h5>Grainz<I class="arrow"></I></h5>
                                            </a>
                                            <span>27,548 Subscribers</span>
                                            <span>615 Videos</span>
                                            <span>10 Million Views</span>
                                            <span class="cv-percent">
                                                <span class="cv-circle"></span> 
                                            78%</span>
                                        </div>
                                    </div>
                                </div>
                       			<div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="cns-block">
                                        <a href="./channel.php" class="cns-image"  >
                                            <img src="cover.jpg" alt="image" >
                                        </a>
                                        <div class="cns-img-small">
                                            <a href="./channel.php" class="cns-img-small cns-small-wrapp">
                                            	  <img src="slaves1.jpg" alt="small">
                                            </a>
                                        </div>
                                        <div class="cns-info">
                                        	<a href="./channel.php">
                                            	<h5>Grainz<I class="arrow"></I></h5>
                                            </a>
                                            <span>27,548 Subscribers</span>
                                            <span>615 Videos</span>
                                            <span>10 Million Views</span>
                                            <span class="cv-percent">
                                                <span class="cv-circle"></span> 
                                            78%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="cns-block">
                                        <a href="#" class="cns-image">
                                            <img src="assets/images/video2-5.png" alt="image">
                                        </a>
                                        <div class="cns-img-small">
                                            <div class="cns-small-wrapp">
                                                <img src="assets/images/ava3.png" alt="small">
                                            </div>
                                        </div>
                                        <div class="cns-info">
                                            <h5>Immense</h5>
                                            <span>66,007 Subscribers</span>
                                            <span>34 Videos</span>
                                            <span>20 Million Views</span>
                                            <span class="cv-percent">
                                                <span class="cv-circle"></span> 
                                            73%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="cns-block">
                                        <a href="#" class="cns-image">
                                            <img src="assets/images/video2-2.png" alt="image">
                                        </a>
                                        <div class="cns-img-small">
                                            <div class="cns-small-wrapp">
                                                <img src="assets/images/ava4.png" alt="small">
                                            </div>
                                        </div>
                                        <div class="cns-info">
                                            <h5>Kittens<I class="arrow"></I></h5>
                                            <span>136,601 Subscribers</span>
                                            <span>880 Videos</span>
                                            <span>64 Million Views</span>
                                            <span class="cv-percent">
                                                <span class="cv-circle"></span> 
                                            94%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="cns-block">
                                        <a href="#" class="cns-image">
                                            <img src="assets/images/video1-8.png" alt="image">
                                        </a>
                                        <div class="cns-img-small">
                                            <div class="cns-small-wrapp">
                                                <img src="assets/images/ava6.png" alt="small">
                                            </div>
                                        </div>
                                        <div class="cns-info">
                                            <h5>Shoe</h5>
                                            <span>72,870 Subscribers</span>
                                            <span>147 Videos</span>
                                            <span>9 Million Views</span>
                                            <span class="cv-percent">
                                                <span class="cv-circle"></span> 
                                            92%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="cns-block">
                                        <a href="#" class="cns-image">
                                            <img src="assets/images/video1-7.png" alt="image">
                                        </a>
                                        <div class="cns-img-small">
                                            <div class="cns-small-wrapp">
                                                <img src="assets/images/ava7.png" alt="small">
                                            </div>
                                        </div>
                                        <div class="cns-info">
                                            <h5>Pink</h5>
                                            <span>49,462 Subscribers</span>
                                            <span>260 Videos</span>
                                            <span>25 Million Views</span>
                                            <span class="cv-percent">
                                                <span class="cv-circle"></span> 
                                            79%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="cns-block">
                                        <a href="#" class="cns-image">
                                            <img src="assets/images/video1-6.png" alt="image">
                                        </a>
                                        <div class="cns-img-small">
                                            <div class="cns-small-wrapp">
                                                <img src="assets/images/ava8.png" alt="small">
                                            </div>
                                        </div>
                                        <div class="cns-info">
                                            <h5>teeny-tiny</h5>
                                            <span>98,599 Subscribers</span>
                                            <span>45 Videos</span>
                                            <span>6 Million Views</span>
                                            <span class="cv-percent">
                                                <span class="cv-circle"></span> 
                                            87%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="cns-block">
                                        <a href="#" class="cns-image">
                                            <img src="assets/images/video1-2.png" alt="image">
                                        </a>
                                        <div class="cns-img-small">
                                            <div class="cns-small-wrapp">
                                                <img src="assets/images/ava9.png" alt="small">
                                            </div>
                                        </div>
                                        <div class="cns-info">
                                            <h5>Intelligent</h5>
                                            <span>74,548 Subscribers</span>
                                            <span>49 Videos</span>
                                            <span>3 Million Views</span>
                                            <span class="cv-percent">
                                                <span class="cv-circle"></span> 
                                            68%</span>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
               <!-- /You Liked Chennals -->

                <!-- pagination -->
                <div class="v-pagination">
                    <ul class="list-inline">
                        <li><a href="#">
                            <div class="pages"><i class="cv cvicon-cv-previous"></i></div>
                        </a></li>
                        <li><a href="#">
                            <div class="pages">1</div>
                        </a></li>
                        <li><a href="#">
                            <div class="pages">2</div>
                        </a></li>
                        <li><a href="#">
                            <div class="pages active">3</div>
                        </a></li>
                        <li><a href="#">
                            <div class="pages">4</div>
                        </a></li>
                        <li><a href="#">
                            <div class="pages">5</div>
                        </a></li>
                        <li><a href="#">
                            <div class="pages">...</div>
                        </a></li>
                        <li><a href="#">
                            <div class="pages">10</div>
                        </a></li>
                        <li><a href="#">
                            <div class="pages"><i class="cv cvicon-cv-next"></i></div>
                        </a></li>
                    </ul>
                </div>
                <!-- /pagination -->

            </div>
        </div>
    </div>
</div>

<?php 
	require 'footer.php';
?>
