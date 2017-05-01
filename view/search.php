<?php 
	include 'header.php';
?>
<!-- search -->
<div class="container-fluid" id = 'Search-page'>
    <div class="row">
        <div class="v-search">
            <div class="container">
                <div class="row s-title">
                    <div class="col-lg-10 col-sm-9 col-xs-12">Filter Search Results&nbsp;&nbsp;<i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                    <div class="col-lg-2 col-sm-3  col-xs-12 pull-right"><span id ='findResults'></span> results</div>
                </div>
                <form method="get">
	                <div class="row">
	                    <div class="col-lg-2 col-sm-4 search-group  col-xs-12">
	                        <div class="s-s-title"><i class="cv cvicon-cv-calender"></i> Upload Date:</div>
	                       	<div class = 'filter'>
		                        <div class='searchFilter'>
									<label class = 'updateDate'>
			                            <input type="radio" name="updateDate-fileter" value = 'week'/>
			                            <span class="arrow"></span> This week
			                        </label>
		                        </div>   
		                        <div class='searchFilter'>
									<label class = 'updateDate'>
			                            <input type="radio" name="updateDate-fileter" value = 'month'/>
			                            <span class="arrow"></span> This month
			                        </label>
		                        </div>
		                        <div class='searchFilter'>
									<label class = 'updateDate'>
			                            <input type="radio" name="updateDate-fileter" value = 'year'/>
			                            <span class="arrow"></span> This year
			                        </label>
		                        </div>  
		                    </div>
	                    </div>
	                    <div class="col-lg-2 col-sm-4 search-group col-xs-12">
	                        <div class="s-s-title"><i class="cv cvicon-cv-watch-later"></i>Duration:</div>
	                        
	                        <div class = 'filter'>
	                       		<div class='searchFilter'>
									<label class = 'timeFilter'>
			                            <input type="radio" name="time-fileter" value = 'Short'/>
			                            <span class="arrow"></span> Short (&lt; 3 min)
			                        </label>
		                        </div>
	                       		<div class='searchFilter'>
									<label class = 'timeFilter'>
			                            <input type="radio" name="time-fileter" value = 'Medium'/>
			                            <span class="arrow"></span> Medium (&lt; 15 min)
			                        </label>
		                        </div>

	                       		<div class='searchFilter'>
									<label class = 'timeFilter'>
			                            <input type="radio" name="time-fileter" value = 'Long'/>
			                            <span class="arrow"></span> Long (&lt; 30 min)
			                        </label>
		                    	</div>
		                    </div>
	
	                    </div>
	                    <div class="col-lg-2 col-sm-4 search-group col-xs-12">
	                        <div class="s-s-title"><i class="cv cvicon-cv-relevant"></i> Sort by:</div>
	                        
	                         <div class = 'filter'>
	                       		<div class='searchFilter'>
									<label class = 'sorted'>
			                            <input type="radio" name="sort-fileter" value = 'Recent'/>
			                            <span class="arrow"></span> Recent
			                        </label>
		                        </div>
		                        <div class='searchFilter'>
									<label class = 'sorted'>
			                            <input type="radio" name="sort-fileter" value = 'Viewed'/>
			                            <span class="arrow"></span> Viewed
			                        </label>
		                        </div>
		                        <div class='searchFilter'>
									<label class = 'sorted'>
			                            <input type="radio" name="sort-fileter" value = 'Longest'/>
			                            <span class="arrow"></span> Longest
			                        </label>
		                        </div>
		                   	</div>
	                    </div>
	                </div>
                </form>
                <div class="row">
                    <div class="col-lg-12  col-sm-12 ta-r clearsearch">
                        <a href="#" id = 'filter-search'> Filter</a>
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
                    <div class="cb-header" id='search-filter'>
                        <div class="row">
                            <div class="col-lg-10 col-xs-10">
                            </div>
                            <div class="col-lg-2 col-xs-2">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by <span class="caret"></span>
                                    </button>
                                    
                                    <ul class="dropdown-menu" id='dropdownMenu'>
                                    	<li onclick = 'sortVideoBy("Recent")'><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                        <li onclick = 'sortVideoBy("Viewed")'><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                        <li onclick = 'sortVideoBy("Longest")'><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content videolist">
                    <p id='not-found'></p> 
                        <div class="row" id= 'row-search-container'>
                         
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
