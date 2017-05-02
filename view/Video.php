<?php 
	include 'header.php';
?>
<div class="content-wrapper" id="videoPlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12 col-sm-12">
                <div class="sv-video">
                    <video style="width:100%;height:100%;" controls="controls" width="100%" height="100%" autoplay id="video-autoplay">
                        <source src="videos/<?=(empty($video[0]['path'])?'':$video[0]['path'])?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'></source>
                    </video>
                    <!-- <span class="sv-psingle-videolay"><i class="cv cvicon-cv-play"></i></span> -->
                </div>
                <h1><a href="#"><?=(empty($video[0]['title'])?'':$video[0]['title'])?></a></h1>
                <div class="author">
                    <a href="ChannelController.php?@$^^%@@^@^$^@=<?=(empty($video[0]['user_id'])?'':$video[0]['user_id'])?>&page=Video"><img src="assets/images/user-pictures/<?=(empty($video[0]['picture'])?'':$video[0]['picture'])?>" alt="" class="sv-avatar"></a>
                    <div class="sv-name">
                        <div><a href="ChannelController.php?@$^^%@@^@^$^@=<?=(empty($video[0]['user_id'])?'':$video[0]['user_id'])?>&page=Video"><?=(empty($video[0]['username'])?'':$video[0]['username'])?></a>  <?=(empty($countOfVideo)?'':$countOfVideo)?> videos</div>
                        <div class="c-sub">
                        <input id = 'asd' type="hidden" value = "<?=(empty($video[0]['user_id'])?'':$video[0]['user_id'])?>" />
                        <a href=""></a>
                        	 <button class="c-f" id="subscribers" style="visibility: hidden;">  Subscribe  </button>
                            <div class="c-s" id="suscribers"  style="visibility: hidden;">   <?= $video[0]['subscribers'] ?> </div>
                            <input type="hidden" id="@gdsfdY42$" value="<?= $video[0]['user_id'] ?>"  />
                                <input type="hidden" id="EfdsJs@4" value="<?= $sessuionUserId ?>"  />
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="sv-views">
                        <div class="sv-views-count">
                            <?=(empty($countOfViews)?0:$countOfViews)?> views
                        </div>
                        <div class="sv-views-progress">
                            <div class="sv-views-progress-bar"></div>
                        </div>
                        <div class="sv-views-stats">
                            <span class="percent"> <?=(empty($percent)?'':$percent.' %')?> </span>
                            <span class="green"><span class="circle"></span>  <?=(empty($countOfLikes)?'':$countOfLikes)?></span>
                            <span class="grey"><span class="circle"></span>  <?=(empty($countOfDislikes)?'':$countOfDislikes)?></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="info">
                    <div class="custom-tabs">
                        <div class="tabs-panel">
                            <a href="#" class="active" data-tab="tab-1">
                                <i class="cv cvicon-cv-about" data-toggle="tooltip" data-placement="top" title="About"></i>
                                <span>About</span>
                            </a>
<!--                             <a href="#" data-tab="tab-2"> -->
<!--                                 <i class="cv cvicon-cv-share" data-toggle="tooltip" data-placement="top" title="Share"></i> -->
<!--                                 <span>Share</span> -->
<!--                             </a> -->
<!--                             <a href="#" data-tab="tab-5"> -->
<!--                                 <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to"></i> -->
<!--                                 <span>Add to</span> -->
<!--                             </a> -->
                            <div class="acide-panel">
                                 <a onclick = 'event.preventDefault(), watchLater()' href=""><i class="cv cvicon-cv-watch-later" data-toggle="tooltip" data-placement="top" title="Watch Later"></i></a>
                                 <a onclick = 'event.preventDefault(), likeVideo()'  id ='likeVideo' href=""><i class="cv cvicon-cv-liked" data-toggle="tooltip" data-placement="top" title="Liked"></i></a>
                                 <a onclick = 'event.preventDefault(), disLikeVideo()'  id = 'disLikeVideo' href=""><img src ='assets/images/dislike.png' class="cv cvicon-cv-liked" data-toggle="tooltip" data-placement="top" title="Disliked"></a>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <!-- BEGIN tabs-content -->
                        <div class="tabs-content">
                            <!-- BEGIN tab-1 -->
                            <div class="tab-1">
                                <div id = 'aboutVideo'>
                                    <h4>Category :</h4>
                                    <p ><?=(empty($video[0]['category_name'])?'':$video[0]['category_name'])?></p>
									<input type="hidden" id = 'category' value="<?=(empty($video[0]['category_id'])?'':$video[0]['category_id'])?>"/>
                                    
                                    <h4>About :</h4>
                                    <p><?=(empty($video[0]['text'])?'':$video[0]['text'])?></p>                

                                    <div class="row date-lic">
                                        <div class="col-lg-6">
                                            <h4>Release Date:</h4>
                                            <p><?=(empty($printDate)?'Today':$printDate)?></p>
                                        </div>
                                    </div>
                                </div>
                                <div></div>
                                <div id = 'showLess'>
	                                <div class="clearfix"></div>
	                                <div class="showless">
	                                    <a >Show Less</a>
	                                </div>
                                </div>
                                <div id = 'showMore'>
	                                <div class="clearfix"></div>
	                                <div class="showless">
	                                    <a >Show More</a>
	                                </div>
                                </div>
                            </div>
                            <!-- END tab-1 -->

                            <!-- BEGIN tab-2 -->
<!--                             <div class="tab-2"> -->
<!--                                 <h4>Share:</h4> -->
<!--                                 <div class="social"> -->
<!--                                     <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a> -->
<!--                                     <a href="#" class="twitter"><i class="fa fa fa-twitter" aria-hidden="true"></i></a> -->
<!--                                     <a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a> -->
<!--                                     <a href="#" class="pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a> -->
<!--                                 </div> -->
<!--                                 <div class="row"> -->
<!--                                     <div class="col-md-9"> -->
<!--                                         <h4>Link:</h4> -->
<!--                                         <label class="clipboard"> -->
<!--                                             <input type="text" name="#" class="share-link" value="http://youtu.be/DwGgdfe-C6c" readonly> -->
<!--                                             <div class="btn-copy" data-clipboard-target=".share-link">Copy</div> -->
<!--                                         </label> -->
<!--                                     </div> -->
<!--                                     <div class="col-md-3"> -->
<!--                                         <h4>Start at:</h4> -->
<!--                                         <label class="checkbox"> -->
<!--                                             <input type="checkbox" name="#"> -->
<!--                                             <span class="arrow"></span> -->
<!--                                         </label> -->
<!--                                         <input type="text" name="#" value="3:20" readonly> -->
<!--                                     </div> -->
<!--                                     <div class="col-md-12"> -->
<!--                                         <h4>Embed:</h4> -->
<!--                                         <textarea type="text" name="#" readonly><iframe width="560" height="315" src="https://www.circle.com/embed/ZocVTdsercgvsd3nA3JM?controls=0" frameborder="0" allowfullscreen></iframe></textarea> -->
<!--                                     </div> -->
<!--                                     <div class="col-md-12"> -->
<!--                                         <h4>Video Size:</h4> -->
<!--                                         <div class="tags-type1"> -->
<!--                                             <a href="#">360P</a> -->
<!--                                             <a href="#">480P</a> -->
<!--                                             <a href="#">720P</a> -->
<!--                                             <a href="#">1080P</a> -->
<!--                                             <a href="#">Custom</a> -->
<!--                                         </div> -->
<!--                                     </div> -->
<!--                                     <div class="col-md-12"> -->
<!--                                         <label class="checkbox-text"> -->
<!--                                             <label class="checkbox"> -->
<!--                                                 <input type="checkbox" name="#"> -->
<!--                                                 <span class="arrow"></span> -->
<!--                                             </label> -->
<!--                                             <p>Show suggested videos when the video finishes</p> -->
<!--                                         </label> -->
<!--                                         <label class="checkbox-text"> -->
<!--                                             <label class="checkbox"> -->
<!--                                                 <input type="checkbox" name="#"> -->
<!--                                                 <span class="arrow"></span> -->
<!--                                             </label> -->
<!--                                             <p>Show player controls</p> -->
<!--                                         </label> -->
<!--                                         <label class="checkbox-text"> -->
<!--                                             <label class="checkbox"> -->
<!--                                                 <input type="checkbox" name="#"> -->
<!--                                                 <span class="arrow"></span> -->
<!--                                             </label> -->
<!--                                             <p>Show video title and player actions</p> -->
<!--                                         </label> -->
<!--                                     </div> -->
<!--                                 </div> -->
<!--                             </div> -->
                            <!-- END tab-2 -->

                            <!-- BEGIN tab-5 -->
<!--                             <div class="tab-5"> -->
<!--                                 <h4>Add to Playlist:</h4> -->
<!--                                 <div class="block-list"> -->
<!--                                     <div> -->
<!--                                         <i class="cv cvicon-cv-watch-later" data-toggle="tooltip" data-placement="top" title="Watch Later"></i> -->
<!--                                         <span class="name">Watch Later</span> -->
<!--                                         <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i> -->
<!--                                     </div> -->
<!--                                     <div> -->
<!--                                         <i class="cv cvicon-cv-playlist" data-toggle="tooltip" data-placement="top" title="Playlist"></i> -->
<!--                                         <span class="name">Gameplay Playlist</span> -->
<!--                                         <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i> -->
<!--                                     </div> -->
<!--                                     <div class="active"> -->
<!--                                         <i class="cv cvicon-cv-playlist" data-toggle="tooltip" data-placement="top" title="Playlist"></i> -->
<!--                                         <span class="name">Review Videos</span> -->
<!--                                         <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i> -->
<!--                                     </div> -->
<!--                                     <div> -->
<!--                                         <i class="cv cvicon-cv-playlist" data-toggle="tooltip" data-placement="top" title="Playlist"></i> -->
<!--                                         <span class="name">Tech Updates</span> -->
<!--                                         <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i> -->
<!--                                     </div> -->
<!--                                     <div> -->
<!--                                         <i class="cv cvicon-cv-add-to-playlist" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i> -->
<!--                                         <span class="name">Create New Playlist</span> -->
<!--                                     </div> -->
<!--                                 </div> -->
<!--                             </div> -->
                            <!-- END tab-5 -->
                        </div>
                        <!-- END tabs-content -->
                    </div>

                    <!-- comments -->
                    <div class="comments" >
                        <div class="reply-comment">
                            <div class="rc-header"><i class="cv cvicon-cv-comment"></i> <span class="semibold" id='countOfComments'><?=(empty($countOfComments)?'':$countOfComments)?></span> Comments</div>
                            
                            <div class="rc-comment">
                            <p></p>
                                    <textarea rows="3" id = 'videoComent'>Share what you think?</textarea >
                                    <button type="submit" id='addVideoComent' >
                                        <i class="cv cvicon-cv-add-comment" onclick = 'event.preventDefault()'></i>
                                    </button>
                                    <input type='hidden' id='qsf' value ="<?=(empty($video[0]['video_id'])?'':$video[0]['video_id'])?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                         <div class="cl-header" id='newComents'>
                                <div class="c-nav">
                                    <ul class="list-inline">
                                        <li ><a href="#">Newest Comments</a></li>
                                    </ul>
                                </div>
                            </div>
                        <div class="comments-list" id ='commentsDiv'>                            
                        </div>
                        	<div class="row">
                                <div class="col-lg-12">
                                    <div class="loadmore-comments">
                                        <form action="#" method="post">
                                            <button class="btn btn-default h-btn" onclick = 'event.preventDefault(), getComment()'>Load more Comments</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- END comments -->
                </div>
            </div>

            <!-- right column -->
            <div class="col-lg-4 col-xs-12 col-sm-12">

                <!-- Recomended Videos -->
                <div class="caption">
                    <div class="left">
                        <a href="#">Recomended Videos</a>
                    </div>
                    <div class="right" >
                    <a href="#" id="autoPlayBtn" id="autoPlayBtn" onclick = "event.preventDefault(); changeAutoPlay();"></a>'
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="list" id='next-video'></div>
                    

                <!-- load more -->
                <div class="loadmore">
                    <a href="#">Show more videos</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
	include 'footer.php';
?>