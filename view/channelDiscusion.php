
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
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=Playlist">Playlist</a></li>
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=LikedChannels">Channels</a></li>
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=Discusion" id="discussion">Discussion</a></li>
                                        <li><a href="#">About</a></li>
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
                <!-- Featured Videos -->
                <div class="content-block">
                    <!-- comments -->
                    <div class="comments">
                        <div class="reply-comment">
                            <div class="rc-header"><i class="cv cvicon-cv-comment"></i> <span class="semibold">236</span> Comments</div>
                            <div class="rc-ava"><a href="#"><img src="assets/images/avatar.png" alt=""></a></div>
                            <div class="rc-comment">
                                <form action="#" method="post">
                                    <textarea rows="3">Share what you think?</textarea >
                                    <button type="submit">
                                        <i class="cv cvicon-cv-add-comment"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="comments-list">

                            <div class="cl-header">
                                <div class="c-nav">
                                    <ul class="list-inline">
                                        <li><a href="#" class="active">Popular Comments</a></li>
                                        <li><a href="#">Newest Comments</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- comment -->
                            <div class="cl-comment">
                                <div class="cl-avatar"><a href="#"><img src="assets/images/avatar.png" alt=""></a></div>
                                <div class="cl-comment-text">
                                    <div class="cl-name-date"><a href="#">BOWTZ pros</a> . 1 week ago</div>
                                    <div class="cl-text">Really great story. You're doing a great job. Keep it up pal.</div>
                                    <div class="cl-meta"><span class="green"><span class="circle"></span> 121</span> <span class="grey"><span class="circle"></span> 2</span> . <a href="#">Reply</a></div>
                                    <div class="cl-replies"><a href="#">View all 5 replies <i class="fa fa-chevron-down" aria-hidden="true"></i></a></div>
                                    <div class="cl-flag"><a href="#"><i class="cv cvicon-cv-flag"></i></a></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- END comment -->

                            <!-- reply comment -->
                            <div class="cl-comment-reply">
                                <div class="cl-avatar"><a href="#"><img src="assets/images/avatar.png" alt=""></a></div>
                                <div class="cl-comment-text">
                                    <div class="cl-name-date"><a href="#">kingPIN</a> . 6 days ago</div>
                                    <div class="cl-text"> I was stuck too. then I started to shoot everything in Doom.</div>
                                    <div class="cl-meta"><span class="green"><span class="circle"></span> 70</span> <span class="grey"><span class="circle"></span> 9</span> . <a href="#">Reply</a></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- END reply comment -->

                            <!-- comment -->
                            <div class="cl-comment">
                                <div class="cl-avatar"><a href="#"><img src="assets/images/avatar.png" alt=""></a></div>
                                <div class="cl-comment-text">
                                    <div class="cl-name-date"><a href="#">Isleifna</a> . 1 week ago</div>
                                    <div class="cl-text">Omg thank you so much, idk how I couldn't figure out that master trap</div>
                                    <div class="cl-meta"><span class="green"><span class="circle"></span> 245</span> <span class="grey"><span class="circle"></span> 19</span> . <a href="#">Reply</a></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- END comment -->

                            <!-- comment -->
                            <div class="cl-comment">
                                <div class="cl-avatar"><a href="#"><img src="assets/images/avatar.png" alt=""></a></div>
                                <div class="cl-comment-text">
                                    <div class="cl-name-date"><a href="#">Mark</a> . 2 days ago</div>
                                    <div class="cl-text">you welcome could you watch my video plz dude you are awsome</div>
                                    <div class="cl-meta"><span class="green"><span class="circle"></span> 516</span> <span class="grey"><span class="circle"></span> 64</span> . <a href="#">Reply</a></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- END comment -->

                            <!-- comment -->
                            <div class="cl-comment">
                                <div class="cl-avatar"><a href="#"><img src="assets/images/avatar.png" alt=""></a></div>
                                <div class="cl-comment-text">
                                    <div class="cl-name-date"><a href="#">High_on_meme</a> . 4 days ago</div>
                                    <div class="cl-text">People allover the world took his music to heart and that music coming from his soul</div>
                                    <div class="cl-meta"><span class="green"><span class="circle"></span> 95</span> <span class="grey"><span class="circle"></span> 0</span> . <a href="#">Reply</a></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- END comment -->

                            <!-- reply comment -->
                            <div class="cl-comment-reply">
                                <div class="cl-avatar"><a href="#"><img src="assets/images/avatar.png" alt=""></a></div>
                                <div class="cl-comment-text">
                                    <div class="cl-name-date"><a href="#">Battlefeelz</a> . 19 hours ago</div>
                                    <div class="cl-text">He looks like Rhett with the most glorious wig ever</div>
                                    <div class="cl-meta"><span class="green"><span class="circle"></span> 871</span> <span class="grey"><span class="circle"></span> 32</span> . <a href="#">Reply</a></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- END reply comment -->



                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="loadmore-comments">
                                        <form action="#" method="post">
                                            <button class="btn btn-default h-btn">Load more Comments</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END comments -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
	require 'view/footer.php';
?>
