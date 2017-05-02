<?php
include 'header.php';
?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 v-history">

                <!-- Watch More -->
                <div class="content-block" id="watchLaterContainer">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-8 col-xs-12 col-sm-6">
                                <ul class="list-inline">
                                    <li></li>
                                    <li></li>
                                    <li><h3>Watch Later Videos</h3></li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-xs-12 col-sm-6 h-clear">
                                <a href="#" onclick = "event.preventDefault(); deleteAllWatchMoreVideos()"><i class="cvicon-cv-cancel"></i> Clear all videos</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="cb-content" id="watchLater">

                    </div>
                </div>
                <!-- /Watch More videos -->

                <div class="loadmore">
                    <form action="#" method="post" onsubmit = "event.preventDefault()">
                        <button class="btn btn-default h-btn" id="moreWLVideos" >Load more Videos</button>
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
