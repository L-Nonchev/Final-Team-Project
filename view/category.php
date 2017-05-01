<?php
include 'header.php';
?>

<div class="content-wrapper head-div" id = 'category-page'>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <!-- Featured Videos -->
                <div class="content-block">
                    <div class="cb-header" id='search-filter'>
                        <div class="row">
                            <div class="col-lg-10 col-xs-10">
                            </div>
                            <div class="col-lg-2 col-xs-2">

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content videolist">
                    <p id='not-found'></p> 
                        <div class="row" id= 'all-video-category'>
                         
                        </div>
                    </div>
                </div>
                <!-- /Featured Videos -->
            </div>
        </div>
    </div>
</div>
<?php 
	require 'view/footer.php';
?>

