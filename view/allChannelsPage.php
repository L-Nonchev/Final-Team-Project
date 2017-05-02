<?php
include 'header.php';
?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 channels v-history">

                <!-- Popular Channels -->
                <div class="content-block">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-8">
                                <ul class="list-inline">
                                    <li><a href="#" onclick="event.preventDefault(); orderedByChannels('1'); ">Most Popular</a></li>
                                    <li><a href="#" onclick="event.preventDefault(); orderedByChannels('2'); ">Most Recent</a></li>
                                    <li><a href="#" onclick="event.preventDefault(); orderedByChannels('3'); ">A - Z</a></li>
                                    <li><a href="#" onclick="event.preventDefault(); orderedByChannels('4'); ">Z - A</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <div class="cb-search">
                                    <form action="#" onsubmit = "event.preventDefault();" id="serchForm">
                                        <label>
                                            <input type="search" placeholder="Search Channels ..." id="serchInput" />
                                            <i class="fa fa-search"></i>
                                        </label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="channels-content">
                        <h4>Channels :</h4>
                        <div class="clearfix"></div>
                        <div class="theme-section">
                            <div class="row" id="all-channels-container">

	                        </div>
	                    </div>
	                </div>
                <!-- /Popular Channels -->
                
            </div>
                 <div class="loadmore">
                    <form action="#" method="post" onsubmit="event.preventDefault();" >
                        <button class="btn btn-default h-btn" id="bnt-more-channels" style="display: none;">Load more Videos</button>
                        <input type="hidden" id="assaeac2"  value="0" />
                         <input type="hidden" id="or123by"  value="1" />
                    </form>
                </div>
        </div>
    </div>
</div>

<?php 
	require 'view/footer.php';
?>
