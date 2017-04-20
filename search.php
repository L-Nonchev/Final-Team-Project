<!-- =-=-=-=-=-=-= HEADER  =-=-=-=-=-=-= -->
<?php
session_start();
if (isset($_SESSION['user'])){

	include 'logInHeader.php';

}else {
	include 'header.php';
}
?>
<!-- =-=-=-=-=-=-= HEADER END =-=-=-=-=-=-= -->
<!-- search -->
<div class="container-fluid">
    <div class="row">
        <div class="v-search">
            <div class="container">
                <div class="row s-title">
                    <div class="col-lg-10 col-sm-9 col-xs-12">Filter Search Results&nbsp;&nbsp;<i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                    <div class="col-lg-2 col-sm-3  col-xs-12 pull-right">About 60,254 results</div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-sm-4 search-group  col-xs-12">
                        <div class="s-s-title"><i class="cv cvicon-cv-calender"></i> Upload Date:</div>
                        <ul>
                            <li><a href="#">Last hour</a></li>
                            <li><a href="#">Today</a></li>
                            <li><a href="#" class="active">This week</a></li>
                            <li><a href="#">This month</a></li>
                            <li><a href="#">This year</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-sm-4 search-group col-xs-12">
                        <div class="s-s-title"><i class="cv cvicon-cv-play-circle"></i> Type:</div>
                        <ul>
                            <li><a href="#" class="active">Video</a></li>
                            <li><a href="#">Channel</a></li>
                            <li><a href="#">Playlist</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-sm-4 search-group col-xs-12">
                        <div class="s-s-title"><i class="cv cvicon-cv-watch-later"></i>Duration:</div>
                        <ul>
                            <li><a href="#">Short (&lt; 5 min)</a></li>
                            <li><a href="#" class="active">Medium (&lt; 10 min)</a></li>
                            <li><a href="#">Long (&gt; 20 min)</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-sm-4 search-group col-xs-12">
                        <div class="s-s-title"><i class="cv cvicon-cv-relevant"></i> Sort by:</div>
                        <ul>
                            <li><a href="#">Relevance</a></li>
                            <li><a href="#">Upload Date</a></li>
                            <li><a href="#" class="active">View Count</a></li>
                            <li><a href="#">Rating</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12  col-sm-12 ta-r clearsearch">
                        <a href="#"><i class="cv cvicon-cv-cancel"></i> Clear all filters</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /search -->

<div class="content-wrapper head-div">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <!-- Featured Videos -->
                <div class="content-block">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-xs-10">
                                <ul class="list-inline">
                                    <li>Search Results <a href="#">"Uncharted 4"</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-xs-2">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by <span class="caret"></span>
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
                    <div class="cb-content videolist">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/video1-1.png" alt=""></a>
                                        <div class="time">3:50</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">Man's Sky: 21 Minutes of New Gameplay - IGN First</a>
                                    </div>
                                    <div class="v-views">
                                        27,548 views. <span class="v-percent"><span class="v-circle"></span> 78%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/video1-2.png" alt=""></a>
                                        <div class="time">15:19</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">GTA 5: Michael, Franklin, and Trevor in the Flesh</a>
                                    </div>
                                    <div class="v-views">
                                        8,241,542 views. <span class="v-percent"><span class="v-circle"></span> 93%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/video1-3.png" alt=""></a>
                                        <div class="time">4:23</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">Battlefield 3: Official Fault Line Gameplay Trailer</a>
                                    </div>
                                    <div class="v-views">
                                        2,729,347 views . <span class="v-percent"><span class="v-circle"></span> 95%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/video1-4.png" alt=""></a>
                                        <div class="time">7:18</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">Batman Arkham City: Hugo Strange Trailer</a>
                                    </div>
                                    <div class="v-views">
                                        7,239,852 views. <span class="v-percent"><span class="v-circle"></span> 84%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/video1-5.png" alt=""></a>
                                        <div class="time">23:57</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">BATTALION 1944: TAKING ON BATTLEFIELD 5</a>
                                    </div>
                                    <div class="v-views">
                                        19,130 views. <span class="v-percent"><span class="v-circle"></span> 78%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html">
                                            <img src="assets/images/video1-6.png" alt="">
                                            <div class="watched-mask"></div>
                                            <div class="watched">WATCHED</div>
                                            <div class="time">7:27</div>
                                        </a>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">Amazon Blocking VIDEO GAMES for Non-Prime...</a>
                                    </div>
                                    <div class="v-views">
                                        185,525 views. <span class="v-percent"><span class="v-circle"></span> 93%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/video1-7.png" alt=""></a>
                                        <div class="time">12:58</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">Amazing Facts About Nebulas Inside Deep Universe</a>
                                    </div>
                                    <div class="v-views">
                                        203,741 views. <span class="v-percent"><span class="v-circle"></span> 95%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/video1-8.png" alt=""></a>
                                        <div class="time">9:47</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">Cornfield Chase - Outlast II Official Gameplay</a>
                                    </div>
                                    <div class="v-views">
                                        202,513 views. <span class="v-percent"><span class="v-circle"></span> 84%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/video2-1.png" alt=""></a>
                                        <div class="time">54:23</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">There Can Only Be One! Introducing Tanc & Hercules</a>
                                    </div>
                                    <div class="v-views">
                                        127,548 views. <span class="v-percent"><span class="v-circle"></span> 78%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/video2-2.png" alt=""></a>
                                        <div class="time">47:12</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">Pokémon 3: The Movie - Spell Of The Unown: Entei HD...</a>
                                    </div>
                                    <div class="v-views">
                                        18,241,542 views. <span class="v-percent"><span class="v-circle"></span> 93%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/video2-3.png" alt=""></a>
                                        <div class="watched-mask"></div>
                                        <div class="watched">WATCHED</div>
                                        <div class="time">19:23</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">Bullet Trains and Octopus Balls in South Korea</a>
                                    </div>
                                    <div class="v-views">
                                        729,347 views . <span class="v-percent"><span class="v-circle"></span> 95%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/video2-4.png" alt=""></a>
                                        <div class="time">21:18</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">Top 10 NEW 3DS Games Of 2016 that blew our mind</a>
                                    </div>
                                    <div class="v-views">
                                        79,239,852 views. <span class="v-percent"><span class="v-circle"></span> 84%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/video2-5.png" alt=""></a>
                                        <div class="time">1:23:57</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">Mirror's Edge Catalyst Beta: PS4 vs Xbox One Frame-Rate... </a>
                                    </div>
                                    <div class="v-views">
                                        519,130 views. <span class="v-percent"><span class="v-circle"></span> 78%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/video2-6.png" alt=""></a>
                                        <div class="time">8:27</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">THE MAGNIFICENT SEVEN - Teaser Trailer (HD)</a>
                                    </div>
                                    <div class="v-views">
                                        15,525 views. <span class="v-percent"><span class="v-circle"></span> 93%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/video2-7.png" alt=""></a>
                                        <div class="time">6:58</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">Game of Thrones Season 6: Event Promo (HBO)</a>
                                    </div>
                                    <div class="v-views">
                                        43,741 views. <span class="v-percent"><span class="v-circle"></span> 95%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/video2-8.png" alt=""></a>
                                        <div class="time">5:47</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">CHAPPIE Movie – Die Antwoord Featurette...</a>
                                    </div>
                                    <div class="v-views">
                                        3,202,513 views. <span class="v-percent"><span class="v-circle"></span> 84%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/playlist-1.png" alt=""></a>
                                        <div class="time">23:57</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">BATTALION 1944: TAKING ON BATTLEFIELD 5</a>
                                    </div>
                                    <div class="v-views">
                                        19,130 views. <span class="v-percent"><span class="v-circle"></span> 78%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html">
                                            <img src="assets/images/playlist-2.png" alt="">
                                            <div class="watched-mask"></div>
                                            <div class="watched">WATCHED</div>
                                            <div class="time">7:27</div>
                                        </a>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">Amazon Blocking VIDEO GAMES for Non-Prime...</a>
                                    </div>
                                    <div class="v-views">
                                        185,525 views. <span class="v-percent"><span class="v-circle"></span> 93%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/playlist-3.png" alt=""></a>
                                        <div class="time">12:58</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">Amazing Facts About Nebulas Inside Deep Universe</a>
                                    </div>
                                    <div class="v-views">
                                        203,741 views. <span class="v-percent"><span class="v-circle"></span> 95%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6  videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img">
                                        <a href="single-video-tabs.html"><img src="assets/images/playlist-4.png" alt=""></a>
                                        <div class="time">9:47</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="single-video-tabs.html">Cornfield Chase - Outlast II Official Gameplay</a>
                                    </div>
                                    <div class="v-views">
                                        202,513 views. <span class="v-percent"><span class="v-circle"></span> 84%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Featured Videos -->

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
