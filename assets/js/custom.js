function watchLater(){
		var videoId = ($(this).parent().parent().parent().attr('id'));
		if (!videoId){
			var videoId = $('#qsf').val();
		}
		$.post('http://localhost/Final-Team-Project/ajax/checkVideoDataController.php',{ videoId: videoId }, 
				function(data){
			console.log(videoId);
			var response = JSON.parse(data);
			if(response['success']){
				alert('The video successful add to whatch later!');
			}else {
				if (confirm('Please, login to watched video later!')) {
					 location.href = './LoginController.php';
				}
			}
		});
	}
	
"use strict";

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add to ajax create video elements options to add Watch later and add to Playlist.
function addAjaxVideoOptions() {
    // Video block hover
    var $plus = $( '<div class="plus"><i class="cvicon-cv-plus" aria-hidden="true"></i></div>' );
    var $plusDetails = $( '<div class="plus-details">\
                                        <ul >\
                                            <li><a href="LoginController.php"><i class="cvicon-cv-watch-later" aria-hidden="true"></i> Login to watch video later</a></li>\
                                        </ul>\
                                    </div>' );

    $(".videolist .v-img").hover( function() {
    	$.post('http://localhost/Final-Team-Project/ajax/checkVideoDataController.php',{ checkLoginUser: 1 }, 
    			function(data){
    		if(data==true){
        		$plusDetails = $( '<div class="plus-details">\
                        <ul >\
                            <li><a href="#"><i class="cvicon-cv-watch-later" aria-hidden="true" onclick ="watchLater(); event.preventDefault();"></i> Watch Later</a></li>\
                            \
                        </ul>\
                    </div>' );
    		}
//    		<li><a href="#"><i class="cvicon-cv-playlist" aria-hidden="true"></i> Add to Playlist</a></li>
    	});
        $(this).append($plus);
        $(".plus").hover( function() {
        	
            $(this).parent().append($plusDetails);    
            $('div.plus-details>ul>li:first-of-type').on('click', watchLater);
            } , function(){

            }
        );

    } , function(){
        $(this).find(".plus").remove();
        $(this).find(".plus-details").remove();
    }
);
}

$( document ).ready(function() {



    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Home page
    // Updates from Subscriptions Hover
    $(".avatars .col-lg-1").hover( function() {
            $(this).find(".note").show();
        }, function(){
            $(this).find(".note").hide();
        }
    );

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Home page
    // Popular Channels Hover
    $(".b-chanel").hover( function() {
            $(this).find(".hover").show();
        }, function(){
            $(this).find(".hover").hide();
        }
    );


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Home page
    // Video block hover
    var $plus = $( '<div class="plus"><i class="cvicon-cv-plus" aria-hidden="true"></i></div>' );
    var $plusDetails = $( '<div class="plus-details">\
                                        <ul >\
                                            <li><a href="#"><i class="cvicon-cv-watch-later" aria-hidden="true"></i> Login to watch video later</a></li>\
                                        </ul>\
                                    </div>' );

    $(".videolist .v-img").hover( function() {
    	$.post('http://localhost/Final-Team-Project/ajax/checkVideoDataController.php',{ checkLoginUser: 1 }, 
    			function(data){
    		if(data==true){
        		$plusDetails = $( '<div class="plus-details">\
                        <ul>\
                            <li ><a href="#"><i class="cvicon-cv-watch-later" aria-hidden="true"></i> Watch Later</a></li>\
                          \
                        </ul>\
                    </div>' );
    		}
//    		  <li><a href="#"><i class="cvicon-cv-playlist" aria-hidden="true"></i> Add to Playlist</a></li>
    	});
            $(this).append($plus);
            $(".plus").hover( function() {
            	
                $(this).parent().append($plusDetails);    
                $('div.plus-details>ul>li:first-of-type').on('click', watchLater);
                } , function(){

                }
            );

        } , function(){
            $(this).find(".plus").remove();
            $(this).find(".plus-details").remove();
        }
    );

    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Header
    // Goto section
    $('[data-toggle="tooltip"]').tooltip();


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Header
    // Dropdown for "Pages" element on hover instead click.
    $('.pages').hover(function(){
        //$('.dropdown-toggle', this).trigger('click');
		//$('.dropdown-toggle', this).show();
	});


	$('.pages').hover(function() { $(this).addClass('open'); }, function() { $(this).removeClass('open'); });



    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Video Edit page
    // add color to checked checkboxes
    $('.edit-page input:checked').parent().css( "color", "#ea2c5a" );
    $('.edit-page input[type=checkbox]').on("click", function () {
       if ($(this).is(':checked')) {
        $(this).parent().css( "color", "#ea2c5a" );
       } else {
           $(this).parent().css( "color", "black" );
       }
    });


    var MYAPP = {
        initialize: function() {
            MYAPP.setUpListeners();
            MYAPP.ready();
        },

        setUpListeners: function() {
            var $document = $(document),
                $window = $(window),
                $tabs = $('.custom-tabs'),
                $activeTab = $tabs.find('.tabs-panel > .active'),
                vCategor_Right = $('.v-categories.side-menu .content-block .cb-content > .row > div:last-child'),
                vCategor_Left = $('.v-categories.side-menu .content-block .cb-content > .row > div:first-child');

            $tabs.on('click', '.tabs-panel > a', function(e) {
                MYAPP.singlVideo.changeTab.call(this);
                e.preventDefault();
                e.stopPropagation();
                return false;
            });
            $activeTab.trigger('click');

            //Clipboard
            if($('.btn-copy').length)
                new Clipboard('.btn-copy');

            $('.btn-color-toggle').on('click', function() {
                if($('body').hasClass('light')) {
                    $('body').removeClass('light').addClass('dark');
                    $(this).find('img').attr('src', 'images/icon_bulb_dark.png');
                } else { if($('body').hasClass('dark'))
                    $('body').removeClass('dark').addClass('light');
                    $(this).find('img').attr('src', 'images/icon_bulb_light.png');
                }
            });

            function align_categor_col() {
                vCategor_Left.removeAttr('style');
                if(vCategor_Left.innerHeight() <= vCategor_Right.innerHeight()) {
                    vCategor_Left.css({'height': vCategor_Right.innerHeight()});
                }
            };

            function add_categor_bg() {
                var bg_add = $('.v-categories.side-menu .bg-add'),
                    vCategor_Left_posL = vCategor_Left.get(0).getBoundingClientRect().left;

                bg_add.css({
                    height: vCategor_Left.innerHeight(),
                    width: vCategor_Left_posL + 'px',
                    left: '-' + vCategor_Left_posL + 'px'
                });
            };

            if($('.v-categories.side-menu').length) {
                align_categor_col();
                add_categor_bg();
            }

            $(window).resize(function() {
                if($('.v-categories.side-menu').length) {
                    align_categor_col();
                    add_categor_bg();
                }
            });

            $('.u-form input[type="checkbox"]').on('change', function() {
                var $this = $(this),
                    checkboxDiv = $(this).parents('div.checkbox');

                if($this.next().css('display') == 'block'){
                    checkboxDiv.addClass('checked');
                }else{
                    checkboxDiv.removeClass('checked');
                }

            });


        },

        singlVideo: {
            changeTab: function() {
                var $this = $(this),
                    $dataTab = $this.attr('data-tab'),
                    $tabs = $this.parents('.custom-tabs').find('.tabs-content').children(),
                    i = 0;

                for(; i < $tabs.length; i++) {
                    if($tabs.eq(i).hasClass($dataTab)) {
                        $tabs.removeClass('active');
                        $tabs.eq(i).addClass('active');
                        $this.parent().children().removeClass('active');
                        $this.addClass('active');
                        return;
                    }
                }
            }
        },

        ready: function() {
            if($('video').length) {
                $('video').mediaelementplayer({
                    alwaysShowControls: false,
                    videoVolume: 'horizontal',
                    features: ['playpause','progress','current','duration','tracks','volume','fullscreen'],
                    enableKeyboard: true,
                    pauseOtherPlayers: true,
                    enableAutosize: true
                });
            }
        }
    };

    MYAPP.initialize();
   
});