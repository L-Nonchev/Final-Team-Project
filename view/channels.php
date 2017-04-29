<?php
session_start();
if (isset($_SESSION['user'])){

	include 'logInHeader.php';

}else {
	include 'notLoginheader.php';
}
?>

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 channels">

                <!-- Popular Channels -->
                <div class="content-block">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-8">
                                <ul class="list-inline">
                                    <li><a href="#" class="color-active">Browse All Channels</a></li>
                                    <li><a href="#">Most Popular</a></li>
                                    <li><a href="#">Most Recent</a></li>
                                    <li><a href="#">A - Z</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <div class="cb-search">
                                    <form action="#">
                                        <label>
                                            <input type="search" placeholder="Search Channels ..." />
                                            <i class="fa fa-search"></i>
                                        </label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="channels-content">
                        <h4>Most Popular</h4>
                        <a href="#" class="btn-view-more">View more</a>
                        <div class="clearfix"></div>
                        <div class="theme-section">
                            <div class="row">
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="cns-block">
                                        <a href="./ChannelController.php?@$^^%@@^@^$^@=2&page=Video" class="cns-image"  >
                                            <img src="cover.jpg" alt="image" >
                                        </a>
                                        <div class="cns-img-small">
                                            <a href="./ChannelController.php?@$^^%@@^@^$^@=2&page=Video" class="cns-img-small cns-small-wrapp">
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
                                        <a href="./ChannelController.php?@$^^%@@^@^$^@=3&page=Video" class="cns-image"  >
                                            <img src="cover.jpg" alt="image" >
                                        </a>
                                        <div class="cns-img-small">
                                            <a href="./ChannelController.php?@$^^%@@^@^$^@=3&page=Video" class="cns-img-small cns-small-wrapp">
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
                        
                        <h4>New Channels</h4>
                        <a href="#" class="btn-view-more">View more</a>
                        <div class="clearfix"></div>
                        <div class="theme-section">
                            <div class="row">
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="cns-block">
                                        <a href="#" class="cns-image">
                                            <img src="assets/images/video1-1.png" alt="image">
                                        </a>
                                        <div class="cns-img-small">
                                            <div class="cns-small-wrapp">
                                                <img src="assets/images/ava11.png" alt="small">
                                            </div>
                                        </div>
                                        <div class="cns-info">
                                            <h5>Develop<I class="arrow"></I></h5>
                                            <span>66,007 Subscribers</span>
                                            <span>34 Videos</span>
                                            <span>22 Million Views</span>
                                            <span class="cv-percent">
                                                <span class="cv-circle"></span> 
                                            85%</span>
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
                                                <img src="assets/images/ava12.png" alt="small">
                                            </div>
                                        </div>
                                        <div class="cns-info">
                                            <h5>Picture</h5>
                                            <span>80,495 Subscribers</span>
                                            <span>71 Videos</span>
                                            <span>36 Million Views</span>
                                            <span class="cv-percent">
                                                <span class="cv-circle"></span> 
                                            74%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="cns-block">
                                        <a href="#" class="cns-image">
                                            <img src="assets/images/sv-16.png" alt="image">
                                        </a>
                                        <div class="cns-img-small">
                                            <div class="cns-small-wrapp">
                                                <img src="assets/images/ava6.png" alt="small">
                                            </div>
                                        </div>
                                        <div class="cns-info">
                                            <h5>Weather</h5>
                                            <span>47,367 Subscribers</span>
                                            <span>381 Videos</span>
                                            <span>42 Million Views</span>
                                            <span class="cv-percent">
                                                <span class="cv-circle"></span> 
                                            89%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="cns-block">
                                        <a href="#" class="cns-image">
                                            <img src="assets/images/video1-4.png" alt="image">
                                        </a>
                                        <div class="cns-img-small">
                                            <div class="cns-small-wrapp">
                                                <img src="assets/images/ava8.png" alt="small">
                                            </div>
                                        </div>
                                        <div class="cns-info">
                                            <h5>Word</h5>
                                            <span>100,212 Subscribers</span>
                                            <span>496 Videos</span>
                                            <span>71 Million Views</span>
                                            <span class="cv-percent">
                                                <span class="cv-circle"></span> 
                                            93%</span>
                                        </div>
                                    </div>
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

<?php 
	require './footer.php';
?>
