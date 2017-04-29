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
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=Playlist">Playlist</a></li>
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=LikedChannels">Channels</a></li>
                                        <li><a href="./ChannelController.php?@$^^%@@^@^$^@=<?= $userId ?>&page=Discusion" id="discussion">Discussion</a></li>
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
                <!-- Featured Videos -->
                <div class="content-block">
                    <!-- comments -->
                    <div class="comments">
                        <div class="reply-comment">
                            <div class="rc-header"><i class="cv cvicon-cv-comment"></i> <span class="semibold">236</span> Comments</div>
                            <div class="rc-ava"><a href="#"><img id="qwe" src="./assets/images/user-pictures/<?= $userPic?>" alt="avatar" style="width: 70px; height: 70px;" /></a></div>
                            <div class="rc-comment">
                                <form action="#" method="post" onsubmit="event.preventDefault();">
                                    <textarea rows="3" id="textAreaComent" maxlength="500">Share what you think?</textarea >
                                    <button type="submit" id="btnAddCometn" >
                                        <i class="cv cvicon-cv-add-comment"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="comments-list" id="comments-list">
	                         <div class="cl-header">
	                              <div class="c-nav"></div>
	                        </div>
                            <!-- comments -->
    
                            <!-- END comments -->
                        </div>
                    </div>
                    <!-- END comments -->
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="loadmore-comments">
                                  <form action="#" method="post" onsubmit="event.preventDefault();">
                                  <button class="btn btn-default h-btn" id="load-more-coments">Load more Comments</button>
                                   <input type="hidden" name="o23fdsdf$54et" id="o23fdsdf$54et" value= " 0 "/>
                                    </form>
                              </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
	require 'view/footer.php';
?>
