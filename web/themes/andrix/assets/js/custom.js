$(function() {
	'use strict'; 
	
	/*
	Navbar
	=========================== */
	$(window).scroll(function(){
		var scrollTop = $(window).scrollTop();
		if(scrollTop != 0){
			$(".navbar").addClass("top-nav-collapse");
			return false;
		} else {
			$(".navbar").removeClass("top-nav-collapse");
			return false;
		}
	});

    /*
	Dropdown
	=========================== */
    function filterMenu(){
        // Window Width
        var windowWidth = $(window).width();
        // Mouseenter dropdown
        var hoverEffect = function(){
            $('ul.navbar-nav li.dropdown').on("mouseenter", function() {
                $(this).addClass('selected');
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
            });

            // Mouseleave dropdown
            $('ul.navbar-nav li.dropdown').on("mouseleave", function() {
                $(this).removeClass('selected');
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
            });
        }
        
        // Click Dropdown Effect
        var clickEffect = function(x){
            if( x == false ){
                $('ul.navbar-nav li.dropdown').off("mouseenter");
                $('ul.navbar-nav li.dropdown').off("mouseleave");
            }

        }
        
        // Execute on resolution
        if( windowWidth > 767){
            hoverEffect();
        }else if( windowWidth < 767){
            clickEffect(false);
        }
    }
    
    filterMenu();
    $(window).on("resize", filterMenu);
	
	/*
	Megamenu
	=========================== */
     window.prettyPrint && prettyPrint()
     $(document).on('hover', '.yamm .dropdown-menu', function(e) {
        e.stopPropagation();
		return false;
     })

	/*
	Form
	=========================== */	 
    jcf.replaceAll();

    /*
	Features
	=========================== */
    $("ul.feature").each(function(){
        var $this = $(this),
            $window_w = $(window).width(),
            $gHeight = $this.height();

        $this.append("<span class='line'></span>");
        $("li", this).last().css("margin-bottom","-19px");
    });
	
    /*
	Process column
	=========================== */
    $(".precess-column").each(function(){
        $(this).on("mouseenter", function() {
            $(".precess-icons", this).stop().animate({
                'width' : '25px', 'height' : '25px', 'top' : '100%', 'left' : '50%','padding-top' : '0', 'margin-top' : '-25px', 'margin-left' : '25px', 'font-size' : '12px', 'line-height' : '24px',
            },{queue:false});
            $(".count", this).stop().animate({
                'width' : '80px', 'height' : '80px', 'top' : '50%', 'left' : '50%', 'padding-top' : '20px', 'margin-top' : '-40px', 'margin-left' : '-40px', 'font-size' : '42px', 'line-height' : '34px',
            },{queue:false});
            $(".icons-primary .fa", this).stop().animate({
                'font-size' : '56px','line-height' : '56px',
            },{queue:false});
            $(".icons-primary h6", this).stop().animate({
                'opacity' : '0',
            },{queue:false});
            $(this).addClass('hover');
            return false;
        });
        $(this).on("mouseleave", function() {
            $(".count", this).stop().animate({
                'width' : '25px', 'height' : '25px', 'top' : '100%', 'left' : '50%','padding-top' : '0', 'margin-top' : '-25px', 'margin-left' : '25px', 'font-size' : '14px', 'line-height' : '23px',
            },{queue:false});
            $(".precess-icons", this).stop().animate({
                'width' : '80px', 'height' : '80px', 'top' : '50%', 'left' : '50%', 'padding-top' : '20px', 'margin-top' : '-40px', 'margin-left' : '-40px', 'font-size' : '28px', 'line-height' : '42px',
            },{queue:false});
            $(".icons-primary .fa", this).stop().animate({
                'font-size' : '32px','line-height' : '34px',
            },{queue:false});
            $(".icons-primary h6", this).stop().animate({
                'opacity' : '1',
            },{queue:false});
            $(this).removeClass('hover');
            return false;
        });
    });
	
    /*
	Searh Form Header
	=========================== */
    $(".show-form").on("click", function(){
        $(".search-wrapper").css("display","block");
        $(".search-wrapper").removeClass('slideOutUp');
        $(".search-wrapper").addClass('slideInDown');
        $(this).css("display","none");
        $(".close-form").fadeIn();
        $("ul.nav").fadeOut();
        return false;
    });
    
    $(".close-form").on("click", function(){
        $(".search-wrapper").removeClass('slideInDown');
        $(".search-wrapper").addClass('slideOutUp');
        $(this).css("display","none");
        $(".show-form").fadeIn();
        $("ul.nav").delay(900).fadeIn();
        return false;
    });
	
     /*
	Team Effect
	=========================== */
    $(".team-wrapp").each(function(){
        var getCaption = $(".team-caption", this),
            showIcon = $(".show-caption", this).find(".fa");
        
        getCaption.addClass("animated");
        getCaption.addClass("zoomOut");
        $(".show-caption", this).on("click", function(){
            var state = showIcon.hasClass("fa-minus");
            if( state ){
                getCaption.addClass("zoomOut");
                getCaption.removeClass("zoomIn");
            }else{
                getCaption.addClass("zoomIn");
                getCaption.removeClass("zoomOut");
            }
            showIcon.toggleClass("fa-minus");
            getCaption.toggleClass("on"); // active for IE
        });   
    });

    /*
	Image hover
	=========================== */	
    $(".img-wrapper").each(function(){
		var capZoomIn = $(".capZoomIn", this),
			capZoomInDown = $(".capZoomInDown", this),
			capRollIn = $(".capRollIn", this),
			capRotateIn = $(".capRotateIn", this),
			capBounceOut = $(".capBounceOut", this);
			
			$(".img-caption").addClass("animated");
			capZoomIn.addClass("zoomOut");
			capZoomInDown.addClass("zoomOutDown");
			capRollIn.addClass("rollOut");
			capRotateIn.addClass("rotateOut");
			capBounceOut.addClass("bounceOut");
        $(this).on("mouseenter", function() {
			capZoomIn.addClass("zoomIn");
			capZoomIn.removeClass("zoomOut");
			capZoomInDown.addClass("zoomInDown");
			capZoomInDown.removeClass("zoomOutDown");
			capRollIn.addClass("rollIn");
			capRollIn.removeClass("rollOut");
			capRotateIn.addClass("rotateIn");
			capRotateIn.removeClass("rotateOut");
			capBounceOut.addClass("bounceIn");
			capBounceOut.removeClass("bounceOut");
			return false;
        });
        $(this).on("mouseleave", function() {
			capZoomIn.addClass("zoomOut");
			capZoomIn.removeClass("zoomIn");
			capZoomInDown.addClass("zoomOutDown");
			capZoomInDown.removeClass("zoomInDown");
			capRollIn.addClass("rollOut");
			capRollIn.removeClass("rollIn");
			capRotateIn.addClass("rotateOut");
			capRotateIn.removeClass("rotateIn");
			capBounceOut.addClass("bounceOut");
			capBounceOut.removeClass("bounceIn");
			return false;
        });
    });	

	/*
	Image hover
	=========================== */	
	$('.post').on("mouseenter", function() {
		$(".post-share", this).stop().animate({bottom:'0'},{queue:false,duration:600});
		return false;
	})
	$('.post').on("mouseleave", function() {
		$(".post-share", this).stop().animate({bottom:'-80px'},{queue:false,duration:600});
		return false;
	});	
	
    /*
	Counter
	=========================== */
	if ( $( ".count" ).length ) {
        $(window).on("scroll.myCount", function(){	
            var h_window_1 = $(window).height() * 0.70,
                p_scroll = $('.count').offset().top,
                get_scroll = p_scroll - h_window_1;

            if( $(document).scrollTop() > get_scroll ){
                $(window).off("scroll.myCount");
                $('.count-value').each(function () {
                    $(".start-count", this).text('0');
                    var data_count = $(this).data("count");
                    $(this).prop('Counter1',0).animate({
                        Counter1: data_count
                    }, {
                        duration: 5000,
                        easing: 'swing',
                        step: function (now1) {
                            $(".start-count", this).text(Math.ceil(now1));
                        }
                    });
                });
            }
        });
    }
	
    /*
	Progress bar
	=========================== */
    $(window).on("scroll.myProgress", function(){
        var p_progress = $( "#progress-bar" ).offset().top, 
            h_window = $(window).height() * 0.9, 
            get_scroll_progress = p_progress - h_window;

        if( $(document).scrollTop() > get_scroll_progress ){
            $(window).off("scroll.myProgress");
            $("div.progress").each(function(){

                // Animation progress
                var progress_bar = $(this).find(".progress-bar");
                var val_progress = progress_bar.data("value-progress");
                progress_bar.animate({
                    "width"  : val_progress + '%'
                }, {
                    duration: 2000
                });

                // Counter progress					
                $(this).find(".value-progress").each(function () {
                    $(this).append(" <strong class='countertext'></strong>%");
                    $(this).prop("Counter",0).animate({
                        Counter: val_progress
                    }, {
                        duration: 3000,
                        step: function (now2) {
                            $(this).find(".countertext").text(Math.ceil(now2));
                        }
                    });
                });
                
            });
        }	
    });	
	
    
    /*
	Progress circle
	=========================== */
    var circle_progress = function(get_ID,scroll_ID){
        
        var runProgressCircle = function(){
            $(get_ID).find('.circle-progress').each(function(){
                var getValue = $(this).data("percentage"),
                    getSpeed = $(this).data("speed"),
                    getFontColor = $(this).data("font-color"),
                    getFontSize = $(this).data("font-size"),
                    getDiameter = $(this).data("diameter"),
                    getRounded = $(this).data("rounded"),
                    getLineWidth = $(this).data("line-width"),
                    getRemainingColor = $(this).data("remaining-color");

                if( $(this).hasClass("blue") ){
                    var lineColor = "#35bfd4";
                }else if( $(this).hasClass("purple") ){
                    var lineColor = "#8f64a2";
                }else if( $(this).hasClass("pink") ){
                    var lineColor = "#d96ba1";
                }else if( $(this).hasClass("yellow") ){
                    var lineColor = "#e3b041";
                }else if( $(this).hasClass("green") ){
                    var lineColor = "#5bc43e";
                }else if( $(this).hasClass("red") ){
                    var lineColor = "#e24040";
                }else if( $(this).hasClass("primary") ){ 
                    $(this).append("<span></span>");
                    var getColor = $(".circle-progress.primary span").css("backgroundColor"); 
                    var rgb2hex = function(rgb){
                     rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
                     return (rgb && rgb.length === 4) ? "#" +
                      ("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
                      ("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
                      ("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
                    }
                    var lineColor = rgb2hex( getColor );
                }else{
                    var lineColor = "#464646";
                }

                $(this).ClassyLoader({
                    animate: true,
                    percentage: getValue,
                    speed: getSpeed,
                    diameter: getDiameter,
                    fontSize: getFontSize,
                    roundedLine: getRounded,
                    fontFamily: 'raleway',
                    start : 'top',
                    fontColor: getFontColor,
                    lineColor: lineColor,
                    remainingLineColor: getRemainingColor,
                    lineWidth: getLineWidth
                });

            });
        }
        
        
        var scroll_n = "scroll." + scroll_ID,
            p_progress_circle =  "p_progress_circle" + scroll_ID,
            h_window_circle =  "h_window_circle" + scroll_ID,
            get_circle_progress =  "get_circle_progress" + scroll_ID;
        
        $(window).on(scroll_n, function(){
            var p_progress_circle = $( get_ID ).offset().top, 
                h_window_circle = $(window).height() * 0.9, 
                get_circle_progress = p_progress_circle - h_window_circle;

            if( $(document).scrollTop() > get_circle_progress ){
                $(window).off(scroll_n);
                runProgressCircle(); 
            }
        });
    }
   // circle_progress("#scroll-circle1","scroll1");
   // circle_progress("#scroll-circle2","scroll2");
    //circle_progress("#scroll-circle3","scroll3");
    //circle_progress("#scroll-circle4","scroll4");


});



