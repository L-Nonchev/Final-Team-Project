<?php
include 'header.php';
?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 v-history">

                <!-- Liked Videos -->
                <div class="content-block" id="likedVideosContainre">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-8 col-xs-12 col-sm-6">
                                <ul class="list-inline">
                                    <li></li>
                                    <li></li>
                                    <li><h3>Liked videos</h3></li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-xs-12 col-sm-6 h-clear">
                                <a href="#" onclick = "event.preventDefault(); deleteAllLikedVideos()"><i class="cvicon-cv-cancel"></i> Clear all videos</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="cb-content" id="likedVideos">


                    </div>
                </div>
                <!-- /Liked videos -->

                <div class="loadmore">
                    <form action="#" method="post" onsubmit = "event.preventDefault()">
                        <button class="btn btn-default h-btn" id="moreLikedVideos" >Load more Videos</button>
                        <input type="hidden" id="132Ascasd@gadsa"  value="0" />
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php 
	require 'view/footer.php';
?>
